<table class="table table-condensed table-striped form-custom-hack">
    <tr>
        <td class="hack-col-label hack-label-width">Company Name</td>
        <td class="hack-input-width">
            <?php
            echo $this->Form->input('CLI_NM_COMPANY', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-label-width">&nbsp;</td>
        <td class="hack-input-width">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    
    <tr>
        <td class="hack-col-label hack-label-width">Company Short Name</td>
        <td class="hack-input-width">
            <?php
            echo $this->Form->input('CLI_NM_COMPANY_SHORT', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-label-width">&nbsp;</td>
        <td class="hack-input-width">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    
    <tr>
        <td class="hack-col-label hack-label-width">Corporate BIC Code</td>
        <td class="hack-input-width">
            <?php
            echo $this->Form->input('CORP_BIC_CODE', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-label-width">&nbsp;</td>
        <td class="hack-input-width">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    
    <tr>
        <td class="hack-col-label">ZIP Code</td>
        <td>
            <?php
            echo $this->Form->input('ZIP_CODE_COMPANY', array(
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
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    
</table>
