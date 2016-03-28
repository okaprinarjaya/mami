<table class="table table-condensed table-striped form-custom-hack">
    <tr>
        <td class="hack-col-label hack-label-width">Address</td>
        <td class="hack-input-width">
            <?php
            echo $this->Form->input('ADDR_1', array(
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
        <td class="hack-col-label hack-label-width">&nbsp;</td>
        <td class="hack-input-width">
            <?php
            echo $this->Form->input('ADDR_2', array(
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
            echo $this->Form->input('ADDR_3', array(
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
            echo $this->Form->input('ZIP_CODE', array(
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
