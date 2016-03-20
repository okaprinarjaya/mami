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
    );

    public function beforeRender()
    {
        $this->set('__module_title__', 'Customers');
    }

    public function index()
    {
        $conditions = array();
        if (isset($this->request->query['kwd']) && !empty($this->request->query['kwd'])) {
            if(isset($this->request->query['filter_field']) && !empty($this->request->query['filter_field']))
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
            $save = $this->Customer->saveDataCustomer($this->request->data);
            if ($save) {
                $this->Session->setFlash('New Customer Successfuly Added!', 'Flash/success');
                return $this->redirect(array('controller' => 'tickets', 'action' => 'add', $save));
            } else {
                $this->Session->setFlash('There is an error', 'Flash/error');
            }
        }

        $this->getTabDataForm();
    }
    
    public function edit($cid)
    {
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Customer->editDataCustomer($this->request->data)) {
                $this->Session->setFlash('Customer Data Successfuly Updated!', 'Flash/success');
                return $this->redirect(array('controller' => 'customers', 'action' => 'index'));
            } else {
                $this->Session->setFlash('There is an error', 'Flash/error');
            }
        }

        $customer = $this->Customer->find('first', array(
            'conditions' => array('Customer.CUSTOMER_ID' => $cid)
        ));
        
        $this->getTabDataForm();
        $this->request->data = $customer;
        
    }
    
    public function getTabDataForm()
    {
        //tab base
        $agt_codes_fetch = $this->TamsAgent->getAGTCodes();
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
        
        $status = array(
            'A' => 'Active' , 
            'N' => 'Not Active' , 
        );
         
        $sex = array(
            'M' => 'Male' ,
            'F' => 'Female' ,
        );
        
        $nationality = array(
            '1' => 'WNI' ,
            '2' => 'WNA' ,
        );
        
        $id_type = array(
            '1' => 'ID Type 1' ,
            '2' => 'ID Type 2' ,
            '3' => 'ID Type 3' ,
        );
        
        $country = $this->Country->getCountry();
        $country = Hash::combine(
            $country,
            '{n}.Country.COUNTRY_CD',
            '{n}.Country.COUNTRY_NM'
        );
        
        $home_country = array(
            '1' => 'home Type 1' ,
            '2' => 'home Type 2' ,
            '3' => 'home Type 3' ,
        );
        
        $mobile_country = array(
            '1' => 'mobile Type 1' ,
            '2' => 'mobile Type 2' ,
            '3' => 'mobile Type 3' ,
        );
        
        $mobile2_country = array(
            '1' => 'mobile2 Type 1' ,
            '2' => 'mobile2 Type 2' ,
            '3' => 'mobile2 Type 3' ,
        );
        
        $fax_country = array(
            '1' => 'fax Type 1' ,
            '2' => 'fax Type 2' ,
            '3' => 'fax Type 3' ,
        );
        
        $office_country = array(
            '1' => 'office Type 1' ,
            '2' => 'office Type 2' ,
            '3' => 'office Type 3' ,
        );
        
        $marital_status = array(
            'S' => 'Single' ,
            'M' => 'Married' ,
            'D' => 'Divorce' ,
        );
        
        $religion = $this->TtaFieldValues->getReligion();
        $religion = Hash::combine(
            $religion,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        $client_types = array(
            '1' => 'Client Type 1',
            '2' => 'Client Type 2',
            '3' => 'Client Type 3'
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
        
        //tab income information
        $occupation_type = array(
            '1' => 'Occupation Type 1',
            '2' => 'Occupation Type 2',
            '3' => 'Occupation Type 3'
        );
        
        $owner_occupation = array(
            '1' => 'Owner Occupation Type 1',
            '2' => 'Owner Occupation Type 2',
            '3' => 'Owner Occupation Type 3'
        );
        
        $annual_income = array(
            '1' => 'Annual Income Type 1',
            '2' => 'Annual Income Type 2',
            '3' => 'Annual Income Type 3'
        );
        
        $this->set(compact(
            'occupation_type',
            'owner_occupation',
            'annual_income'
        ));
        
        
        //tab spouse information
        $spouse_type = array(
            '1' => 'Spouse Type 1',
            '2' => 'Spouse Type 2',
            '3' => 'Spouse Type 3'
        );
        
        $spouse_occupation = array(
            '1' => 'Spouse Occupation Type 1',
            '2' => 'Spouse Occupation Type 2',
            '3' => 'Spouse Occupation Type 3'
        );
        $this->set(compact(
            'spouse_type',
            'spouse_occupation'
        ));
        
        //tab invesment information
        $source_of_fund = array(
            '1' => 'Source Type 1',
            '2' => 'Source Type 2',
            '3' => 'Source Type 3'
        );
        
        $red_flag = array(
            '1' => 'Red Flag Type 1',
            '2' => 'Red Flag Type 2',
            '3' => 'Red Flag Type 3'
        );
        $this->set(compact(
            'source_of_fund',
            'red_flag'
        ));
        
        //tab Bank
        $bank = $this->Bank->getBankMapp();
        $bank = Hash::combine(
            $bank,
            '{n}.Bank.BANK_CD_MAPP',
            '{n}.Bank.BANK_CD_MAPP'
        );
        $this->set(compact(
            'bank'
        ));
        
        //tabFATCA
        $owner_facta_status = array(
            '1' => 'facta Type 1',
            '2' => 'facta Type 2',
            '3' => 'facta Type 3'
        );
        
        $privacy_waifer = array(
            '1' => 'waifer Type 1',
            '2' => 'waifer Type 2',
            '3' => 'waifer Type 3'
        );
        
        $self_certification = array(
            '1' => 'self Type 1',
            '2' => 'self Type 2',
            '3' => 'self Type 3'
        );
        
        $w8 = $this->TtaFieldValues->getW8();
        $w8 = Hash::combine(
            $w8,
            '{n}.TtaFieldValues.FLD_VALU',
            '{n}.TtaFieldValues.FLD_VALU_DESC'
        );
        
        $w9 = array(
            '1' => 'w9 Type 1',
            '2' => 'w9 Type 2',
            '3' => 'w9 Type 3'
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
