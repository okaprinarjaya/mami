<table class="table table-condensed table-striped form-custom-hack">
    <tr>
        <td class="hack-col-label hack-label-width">Default Mail Address</td>
        <td class="hack-input-width">
            <?php
            echo $this->Form->input('ADDR_1_DEFAULT', array(
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
        <td class="hack-col-label">&nbsp;</td>
        <td>
            <?php
            echo $this->Form->input('ADDR_2_DEFAULT', array(
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
        <td class="hack-col-label">&nbsp;</td>
        <td>
            <?php
            echo $this->Form->input('ADDR_3_DEFAULT', array(
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
        <td class="hack-col-label">Mailing City Code</td>
        <td>
            <?php
            echo $this->Form->input('CITY_CODE_DEFAULT', array(
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
        <td class="hack-col-label">Mailing Province Code</td>
        <td>
            <?php
            echo $this->Form->input('PROV_CODE_DEFAULT', array(
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
        <td class="hack-col-label">ZIP Code</td>
        <td>
            <?php
            echo $this->Form->input('ZIP_CODE_DEFAULT', array(
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
        <td class="hack-col-label">Mailing Country Code</td>
        <td>
            <?php
            echo $this->Form->input('ADDR_CODE_DEFAULT', array(
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
