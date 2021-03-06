<table class="table table-condensed table-striped form-custom-hack">
    <tr>
        <td class="hack-col-label hack-label-width">Spouse Name</td>
        <td class="hack-input-width">
            <?php
            echo $this->Form->input('SPOUSE_NM', array(
                'type' => 'text',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label hack-label-width">Spouse Occupation</td>
        <td class="hack-input-width">
            <?php
            echo $this->Form->input('SPOUSE_OCCP_CODE', array(
                'options' => $spouse_occupation ,
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
        <td class="hack-col-label">Spouse ID Type</td>
        <td>
            <?php
            echo $this->Form->input('SPOUSE_ID_TYP', array(
                'options' => $spouse_type ,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">Spouse ID Number</td>
        <td>
            <?php
            echo $this->Form->input('SPOUSE_ID_NO', array(
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
