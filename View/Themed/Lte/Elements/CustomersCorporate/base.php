<table class="table table-condensed table-striped form-custom-hack">

    <tr>
        <td class="hack-col-label hack-label-width">CIF</td>
        <td class="hack-input-width">
            <?php
            echo $this->Form->input('CIF_NUM', array(
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

        <td class="hack-col-label">Client Type <span class"required-input" style="color: red;">*</span></td>
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

        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="hack-col-label">SID</td>
        <td>
            <?php
            echo $this->Form->input('SID', array(
                'type' => 'text',
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
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

</table>