<table class="table table-condensed table-striped form-custom-hack">
    <tr>
        
        <td class="hack-col-label hack-label-width">Office</td>
        <td class="hack-input-width">
            <?php
            echo $this->Form->input('OFFICE_PHON_NUM', array(
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
        
        <td class="hack-col-label">Mobile</td>
        <td>
        <?php
        echo $this->Form->input('MOBILE_NUM', array(
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
        
        <td class="hack-col-label">Website</td>
        <td>
        <?php
        echo $this->Form->input('WEBSITE', array(
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
        
        <td class="hack-col-label">Email</td>
        <td>
        <?php
        echo $this->Form->input('EMAIL_ADD', array(
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
        
        <td class="hack-col-label">Fax</td>
        <td>
        <?php
        echo $this->Form->input('FAX_NUM', array(
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