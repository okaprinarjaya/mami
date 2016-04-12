<?php
App::uses('AppController', 'Controller');

class CustomersController extends AppController {

	public $components = array('Paginator');

    public $uses = array(
        'TamsAgent', 
        'TtaFieldValues' ,
        'Country' ,
        'Bank' ,
        'Customer' ,
        'OwnerOccupation'
    );

    public function beforeRender()
    {
        $this->set('__module_title__', 'Customers');
    }

    public function index()
    {
        $conditions = array();
        if (isset($this->request->query['kwd']) && !empty($this->request->query['kwd'])) {
            if (isset($this->request->query['filter_field']) && !empty($this->request->query['filter_field']))
            {
                $conditions[$this->request->query['filter_field'] . ' LIKE'] = '%'.$this->request->query['kwd'].'%';
            }
        }
        
        $this->Paginator->settings = array(
            'conditions' => $conditions,
            'limit' => isset($this->request->query['rpp']) ? $this->request->query['rpp'] : 50,
        );

        $cust = array();
        try {
            $cust = $this->Paginator->paginate($this->Customer);
        } catch (NotFoundException $e) {
            $this->redirect('/customers');
        }

        $this->set(compact('cust'));
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $save = $this->Customer->createCustomer(
                $this->request->data,
                $this->Auth->user('id')
            );

            if ($save) {
                $this->Session->setFlash('New Customer Successfuly Added!', 'Flash/success');
                return $this->redirect(array('controller' => 'tickets', 'action' => 'add', $save));
            } else {
                $this->Session->setFlash('There is an error', 'Flash/error');
            }
        }  

        $this->set('bank_code', array());
        $this->set('bank_cd_mapp', null);
        $this->getTabDataForm();
    }
    
    public function edit($cid)
    {
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Customer->updateCustomer($this->request->data)) {
                $this->Session->setFlash('Customer Data Successfuly Updated!', 'Flash/success');
                return $this->redirect(array('controller' => 'customers', 'action' => 'index'));
            } else {
                $this->Session->setFlash('There is an error', 'Flash/error');
            }
        }

        $customer = $this->Customer->find('first', array(
            'conditions' => array('Customer.CUSTOMER_ID' => $cid)
        ));
        
        $bank = $this->Bank->find('first', array(
            'conditions' => array('Bank.BANK_ID' => $customer['Customer']['BANK_CD'])
        ));
        
        $bank_code = array();
        $bank_cd_mapp = null;

        if (!empty($bank))
        {
            $customer['Customer']['BANK_CD'] = $bank['Bank']['BANK_ID'];
            $bank_cd_mapp = $bank['Bank']['BANK_CD_MAPP'];

            $listCodeBank =  $this->Bank->getBankCode($bank['Bank']['BANK_CD_MAPP']);
            $bank_code = Hash::combine(
                $listCodeBank,
                '{n}.Bank.BANK_ID',
                '{n}.Bank.BANK_BRANCH_NM'
            );
        }
       
        $this->set(compact(
            'bank_code',
            'bank_cd_mapp'
        ));
        
        $this->getTabDataForm();
        $this->request->data = $customer;
        
        $this->autoRender = false;
        if ($customer['Customer']['CLI_TYP'] == 1) {
            $this->render('edit');
        } else if ($customer['Customer']['CLI_TYP'] == 2) {
            $this->render('edit-corporate');
        }
    }
    
    public function getTabDataForm()
    {
        // Tab base
        $agt_codes_fetch = $this->TamsAgent->getAGTCodes();
        array_walk($agt_codes_fetch, function (&$item, $key) {
            $item['TamsAgent']['AGT_NM'] = str_replace("+", " ", $item['TamsAgent']['AGT_NM']);
        });

        $agt_codes = Hash::combine(
            $agt_codes_fetch, 
            '{n}.TamsAgent.AGT_CODE', 
            '{n}.TamsAgent.AGT_NM'
        );

        $sub_client_types_fetch = $this->TtaFieldValues->getSubClientTypes();
        $sub_client_types = Hash::combine(
            $sub_client_types_fetch,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        $status_fetch = $this->TtaFieldValues->getStatus();
        $status = Hash::combine(
            $status_fetch,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        $sex_fetch = $this->TtaFieldValues->getGender();
        $sex = Hash::combine(
            $sex_fetch,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        $nationality_fetch = $this->TtaFieldValues->getNation();
        $nationality = Hash::combine(
            $nationality_fetch,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        
        $id_type_fetch = $this->TtaFieldValues->getIdType();
        $id_type = Hash::combine(
            $id_type_fetch,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        $country = $this->Country->getCountry();
        $country = Hash::combine(
            $country,
            '{n}.Country.COUNTRY_CD',
            '{n}.Country.COUNTRY_NM'
        );
        
        $marital_status_fetch = $this->TtaFieldValues->getMaritalStatus();
        $marital_status = Hash::combine(
            $marital_status_fetch,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        $religion = $this->TtaFieldValues->getReligion();
        $religion = Hash::combine(
            $religion,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        $client_types = array(
            '1' => 'Personal',
            '2' => 'Corporate'
        );
        
        $this->set(compact(
            'agt_codes',
            'sub_client_types',
            'status' ,
            'sex' ,
            'nationality' ,
            'religion' ,
            'country' ,
            'marital_status' ,
            'id_type' ,
            'home_country' ,
            'mobile2_country' ,
            'mobile_country' ,
            'fax_country' ,
            'office_country' ,
            'client_types'
        ));
        
        // Tab income information
        $occupation_type_fetch = $this->TtaFieldValues->getOccupation();
        $occupation_type = Hash::combine(
            $occupation_type_fetch,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        $owner_occupation_type_fetch = $this->OwnerOccupation->getOwnerOccupation();
        $owner_occupation = Hash::combine(
            $owner_occupation_type_fetch,
            '{n}.OwnerOccupation.id',
            '{n}.OwnerOccupation.OCCP_NM'
        );
        
        $annual_income_fetch = $this->TtaFieldValues->getAnnualIncome();
        $annual_income = Hash::combine(
            $annual_income_fetch,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        $this->set(compact(
            'occupation_type',
            'owner_occupation',
            'annual_income'
        ));
        
        
        // Tab spouse information
        $spouse_type_fetch = $this->TtaFieldValues->getSpouseType();
        $spouse_type = Hash::combine(
            $spouse_type_fetch,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        
        $spouse_occupation = Hash::combine(
            $occupation_type_fetch,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        $this->set(compact(
            'spouse_type',
            'spouse_occupation'
        ));
        
        // Tab invesment information
        $source_of_fund_fetch = $this->TtaFieldValues->getSourceFund();
        $source_of_fund = Hash::combine(
            $source_of_fund_fetch,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        $red_flag_fetch = $this->TtaFieldValues->getRedFlag();
        $red_flag = Hash::combine(
            $red_flag_fetch,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        $this->set(compact(
            'source_of_fund',
            'red_flag'
        ));
        
        // Tab Bank
        $bank = $this->Bank->getBankMapp();
        $bank = Hash::combine(
            $bank,
            '{n}.Bank.BANK_CD_MAPP',
            '{n}.Bank.BANK_CD_MAPP'
        );
        $this->set(compact(
            'bank'
        ));
        
        // Tab FATCA
        $owner_facta_status_fetch = $this->TtaFieldValues->getFactaStatus();
        $owner_facta_status = Hash::combine(
            $owner_facta_status_fetch,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        
        $privacy_waifer_fetch = $this->TtaFieldValues->getWaifer();
        $privacy_waifer = Hash::combine(
            $privacy_waifer_fetch,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        
        $self_certification_fetch = $this->TtaFieldValues->getSelfCert();
        $self_certification = Hash::combine(
            $self_certification_fetch,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        $w8 = $this->TtaFieldValues->getW8();
        $w8 = Hash::combine(
            $w8,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        $w9 = $this->TtaFieldValues->getW8();
        $w9 = Hash::combine(
            $w9,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        $entity = $this->TtaFieldValues->getEntity();
        $entity = Hash::combine(
            $entity,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        $this->set(compact(
            'owner_facta_status',
            'privacy_waifer',
            'self_certification' ,
            'w8' ,
            'w9' ,
            'entity'
        ));
    }
    
    public function get_bank_code()
    {
        $this->autoRender = false;
        $name = $this->request->query['name'];
        $bank_code = $this->Bank->getBankCode($name);
        
        $bank_code = Hash::combine(
            $bank_code,
            '{n}.Bank.BANK_ID',
            '{n}.Bank.BANK_BRANCH_NM'
        );
        
        foreach($bank_code as $key => $val)
        {
            $code[] = array(
                'code' => $key ,
                'name' => $val
            ); 
        }
        
        return json_encode($code);
    }
    
    public function get_bank_name()
    {
        $this->autoRender = false;
        $code = $this->request->query['code'];
        $bank_name = $this->Bank->getBankName($code);
        
        $bank_name = array(
            'name' => $bank_name[0]['Bank']['BANK_BRANCH_NM']
        );
        
        return json_encode($bank_name);
    }
    
}
