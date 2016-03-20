<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Ticket Detail</h4>
</div>

<?php
echo $this->Form->create('Ticket', array(
    'role' => 'form',
    'class' => 'form-horizontal',
    'novalidate' => true
));
?>

<div class="modal-body">
    <?php
    echo $this->Form->input('Foo.cif', array(
        'type' => 'text',
        'default' => $ticket['Ticket']['cif'],
        'readonly' => 'readonly',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'CIF'
        ),
        'between' => '<div class="col-sm-3">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('interaction_code1', array(
        'type' => 'text',
        'default' => $ticket['InteractionLevel1']['interaction_title1'],
        'readonly' => 'readonly',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Interaction'
        ),
        'between' => '<div class="col-sm-4">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('interaction_code2', array(
        'type' => 'text',
        'default' => $ticket['InteractionLevel2']['interaction_title2'],
        'readonly' => 'readonly',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Interaction Detail'
        ),
        'between' => '<div class="col-sm-4">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('interaction_code3', array(
        'type' => 'text',
        'default' => $ticket['InteractionLevel3']['interaction_title3'],
        'readonly' => 'readonly',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Interaction Sub Detail'
        ),
        'between' => '<div class="col-sm-4">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('customer_name', array(
        'type' => 'text',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Full Name'
        ),
        'between' => '<div class="col-sm-4">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('email', array(
        'type' => 'email',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Email Address'
        ),
        'between' => '<div class="col-sm-4">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('telephone', array(
        'type' => 'text',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Telephone'
        ),
        'between' => '<div class="col-sm-4">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('department_id', array(
        'type' => 'text',
        'default' => 'Dept 1',
        'readonly' => 'readonly',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Department'
        ),
        'between' => '<div class="col-sm-4">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('subject', array(
        'type' => 'text',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Subject'
        ),
        'between' => '<div class="col-sm-4">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('channel_type', array(
        'options' => array(),
        'empty' => '--CHOOSE--',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Channel Type'
        ),
        'between' => '<div class="col-sm-4">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('sla', array(
        'type' => 'text',
        'default' => '7',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'SLA'
        ),
        'between' => '<div class="col-sm-2">',
        'after' => '</div> Days',
        'class' => 'form-control',
        'readonly' => 'readonly'
    ));
    ?>

    <?php
    echo $this->Form->input('message', array(
        'type' => 'textarea',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Message'
        ),
        'between' => '<div class="col-sm-4">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('ticket_status', array(
        'options' => array(),
        'empty' => '--CHOOSE--',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Ticket Status'
        ),
        'between' => '<div class="col-sm-4">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>
    
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">
        <span class="glyphicon glyphicon-remove"></span> Close
    </button>
    
    <button type="submit" class="btn btn-success">
        <span class="glyphicon glyphicon-floppy-saved"></span> Save Changes
    </button>
</div>

<?php
echo $this->Form->end();
?>
