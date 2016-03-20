<table class="table table-condensed table-striped form-custom-hack">
    <input type="hidden" name="data[Customer][CUSTOMER_ID]" value="<?php echo isset($this->request->data['Customer']['CUSTOMER_ID']) ? $this->request->data['Customer']['CUSTOMER_ID'] : '';?>">
    <tr>
        <td class="hack-col-label">CIF</td>
        <td>
            <?php
            echo $this->Form->input('CIF_NUM', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">RM</td>
        <td>
            <?php
            echo $this->Form->input('AGT_CD', array(
                'options' => $agt_codes,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">Client Type</td>
        <td>
            <?php
            echo $this->Form->input('CLI_TYP', array(
                'options' => $client_types,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm' ,
                'required' => true
            ));
            ?>
        </td>

        <td class="hack-col-label">Client Sub Type</td>
        <td>
            <?php
            echo $this->Form->input('CLI_SUB_TYP', array(
                'options' => $sub_client_types,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">Status</td>
        <td>
            <?php
            echo $this->Form->input('STATUS', array(
                'options' => $status,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">Remarks</td>
        <td>
            <?php
            echo $this->Form->input('REMARKS', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">First Name</td>
        <td>
            <?php
            echo $this->Form->input('CLI_NM', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm' ,
                'required' => true
            ));
            ?>
        </td>

        <td class="hack-col-label">Middle Name</td>
        <td>
            <?php
            echo $this->Form->input('MID_NM', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm' ,
                'required' => true
            ));
            ?>
        </td>

        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">Sex</td>
        <td>
            <?php
            echo $this->Form->input('SEX_CODE', array(
                'options' => $sex,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm' ,
                'required' => true
            ));
            ?>
        </td>

        <td class="hack-col-label">Staff Number</td>
        <td>
            <?php
            echo $this->Form->input('EMPLOYEE_NUM', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">Nationality</td>
        <td>
            <?php
            echo $this->Form->input('NATION', array(
                'options' => $nationality,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">Country</td>
        <td>
            <?php
            echo $this->Form->input('COUNTRY_CD', array(
                'options' => $country,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">ID Type</td>
        <td>
            <?php
            echo $this->Form->input('ID_TYP', array(
                'options' => $id_type,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">ID Number</td>
        <td>
            <?php
            echo $this->Form->input('ID_NUM', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">ID Expire Date</td>
        <td>
            <?php
            echo $this->Form->input('ID_EXPIRY_DT', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'id' => 'expire' ,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">Birth Date</td>
        <td>
            <?php
            echo $this->Form->input('BIRTH_DT', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'id' => 'birth' ,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">Country of Place Birth</td>
        <td>
            <?php
            echo $this->Form->input('BIRTH_COUNTRY_CD', array(
                'options' => $country,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">Place of Birth</td>
        <td>
            <?php
            echo $this->Form->input('BIRTH_PLACE', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">Home Country</td>
        <td>
            <?php
            echo $this->Form->input('PRIM_PHON_COUNTRY_CD', array(
                'options' => $home_country,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">Home Phone Number</td>
        <td>
            <?php
            echo $this->Form->input('PRIM_PHON_NUM', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm' ,
                'required' => true ,
                'data-parsley-type' => 'number'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">Mobile Country</td>
        <td>
            <?php
            echo $this->Form->input('MOBILE_COUNTRY_CD', array(
                'options' => $mobile_country,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm' ,
                'data-parsley-type' => 'number'
            ));
            ?>
        </td>

        <td class="hack-col-label">Mobile Phone Number</td>
        <td>
            <?php
            echo $this->Form->input('MOBILE_NUM', array(
                'type' => 'text' ,
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm' ,
                'required' => true ,
                'data-parsley-type' => 'number'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">Mobile2 Country</td>
        <td>
            <?php
            echo $this->Form->input('OTHR_PHON_COUNTRY_CD', array(
                'options' => $mobile2_country,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm' ,
                'data-parsley-type' => 'number'
            ));
            ?>
        </td>

        <td class="hack-col-label">Mobile Phone Number 2</td>
        <td>
            <?php
            echo $this->Form->input('OTHER_PHON_NUM', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm' ,
                'required' => true ,
                'data-parsley-type' => 'number'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">Fax Country</td>
        <td>
            <?php
            echo $this->Form->input('FAX_COUNTRY_CD', array(
                'options' => $fax_country,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm' ,
                'data-parsley-type' => 'number'
            ));
            ?>
        </td>

        <td class="hack-col-label">Fax Number</td>
        <td>
            <?php
            echo $this->Form->input('FAX_NUM', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm' ,
                'data-parsley-type' => 'number'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">Office Country</td>
        <td>
            <?php
            echo $this->Form->input('OFFICE_PHON_COUNTRY_CD', array(
                'options' => $fax_country,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm' ,
                'data-parsley-type' => 'number'
            ));
            ?>
        </td>

        <td class="hack-col-label">Office Number</td>
        <td>
            <?php
            echo $this->Form->input('OFFICE_PHON_NUM', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm' ,
                'required' => true ,
                'data-parsley-type' => 'number'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">Email</td>
        <td>
            <?php
            echo $this->Form->input('EMAIL_ADD', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm' ,
                'required' => true ,
                'data-parsley-type' => 'email'
            ));
            ?>
        </td>

        <td class="hack-col-label">Religion</td>
        <td>
            <?php
            echo $this->Form->input('RELIGION', array(
                'options' => $religion,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">Marital Status</td>
        <td>
            <?php
            echo $this->Form->input('MARITAL_STATUS', array(
                'options' => $marital_status,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">Risk Profile</td>
        <td>
            <?php
            echo $this->Form->input('RISK_SCORE', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
    </tr>

</table>