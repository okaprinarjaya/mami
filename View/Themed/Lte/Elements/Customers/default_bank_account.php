<table class="table table-condensed table-striped form-custom-hack">
    <tr>
        <td class="hack-col-label">Bank Name</td>
        <td>
        <?php
                echo $this->Form->input('BANK_CD_MAPP', array(
                    'options' => $bank ,
                    'empty' => '--CHOOSE--',
                    'div' => false,
                    'label' => false,
                    'class' => 'form-control input-sm' ,
                    'id' => 'bank_type'
                ));
                ?>
        <td/>
        <td class="hack-col-label">Account Number</td>
        <td>
            <?php
            echo $this->Form->input('BANK_ACCT_NUM', array(
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
        <td class="hack-col-label">Bank Code</td>
        <td>
        <?php
                echo $this->Form->input('BANK_CD', array(
                    'options' => isset($bank_code) && !empty($bank_code) ? $bank_code : array() ,
                    'div' => false,
                    'label' => false,
                    'class' => 'form-control input-sm',
                    'id' => 'bank_code'
                ));
                ?>
        <td/>
        <td class="hack-col-label">Account Name</td>
        <td>
            <?php
            echo $this->Form->input('BANK_ACCT_NM', array(
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
        <td class="hack-col-label">Branch</td>
        <td id="branch_name">
        <?php
            echo $this->Form->input('BRANCH_NAME', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm' ,
                'readonly' => true
            ));
        ?>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>


</table>