<table class="table table-condensed table-striped form-custom-hack">
    <tr>
        <td class="hack-col-label hack-label-width">Owner FATCA Status</td>
        <td class="hack-input-width">
            <?php
            echo $this->Form->input('CLI_FATCA_STAT', array(
                'options' => $owner_facta_status ,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label hack-label-width">Override</td>
        <td class="hack-input-width">
            <?php
            echo $this->Form->input('CLI_FATCA_STAT_OVR', array(
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
        <td class="hack-col-label">Privacy Waiver</td>
        <td>
            <?php
            echo $this->Form->input('PRI_WAIVER', array(
                'options' => $privacy_waifer ,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">SSN</td>
        <td>
            <?php
            echo $this->Form->input('SSN', array(
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
        <td class="hack-col-label">Self Certification</td>
        <td>
            <?php
            echo $this->Form->input('FATCA_SELF_CERT', array(
                'options' => $self_certification ,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">TIN</td>
        <td>
            <?php
            echo $this->Form->input('TIN', array(
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
        <td class="hack-col-label">W8 Form Collected</td>
        <td>
            <?php
            echo $this->Form->input('W8_FORM', array(
                'options' => $w8 ,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">W8 Additional Documentary Evidence Collected</td>
        <td>
            <?php
            echo $this->Form->input('W8_ADDL_DOC', array(
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
        <td class="hack-col-label">W9 Form Collected</td>
        <td>
            <?php
            echo $this->Form->input('W9_FORM', array(
                'options' => $w9 ,
                'empty' => '--CHOOSE--',
                'div' => false,
                'label' => false,
                'class' => 'form-control input-sm'
            ));
            ?>
        </td>

        <td class="hack-col-label">Entity Type</td>
        <td>
            <?php
            echo $this->Form->input('ENTITY_TYP', array(
                'options' => $entity ,
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