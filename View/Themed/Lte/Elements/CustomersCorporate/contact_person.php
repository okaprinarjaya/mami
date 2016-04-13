<table class="table table-condensed table-striped form-custom-hack">
    <tr>
        
        <td class="hack-col-label hack-label-width">Name</td>
        <td class="hack-input-width">
            <?php
            echo $this->Form->input('CLI_NM_PERSON', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    
    <tr>
        
        <td class="hack-col-label">Office</td>
        <td>
        <?php
        echo $this->Form->input('OFFICE_PHON_NUM_PERSON', array(
            'type' => 'text',
            'div' => false,
            'label' => false,
            'class' => 'form-control input-sm'
        ));
        ?>
        </td>
        
        <td class="hack-col-label">EXT</td>
        <td>
        <?php
        echo $this->Form->input('EXT_PERSON', array(
            'type' => 'text',
            'div' => false,
            'label' => false,
            'class' => 'form-control input-sm',
            'style' => 'width: 100px;'
        ));
        ?>
        </td>
    </tr>
   
    <tr>
        
        <td class="hack-col-label">Mobile</td>
        <td>
        <?php
        echo $this->Form->input('MOBILE_NUM_PERSON', array(
            'type' => 'text',
            'div' => false,
            'label' => false,
            'class' => 'form-control input-sm'
        ));
        ?>
        </td>
        
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    
    <tr>
        
        <td class="hack-col-label">Email</td>
        <td>
        <?php
        echo $this->Form->input('EMAIL_ADD_PERSON', array(
            'type' => 'text',
            'div' => false,
            'label' => false,
            'class' => 'form-control input-sm'
        ));
        ?>
        </td>
        
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    
    <tr>
        
        <td class="hack-col-label">Fax</td>
        <td>
        <?php
        echo $this->Form->input('FAX_NUM_PERSON', array(
            'type' => 'text',
            'div' => false,
            'label' => false,
            'class' => 'form-control input-sm'
        ));
        ?>
        </td>
        
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    
</table>