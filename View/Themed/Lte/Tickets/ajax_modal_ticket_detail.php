<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Ticket Detail</h4>
</div>

<?php
echo $this->Form->create('Ticket', array(
    'url' => array('controller' => 'tickets', 'action' => 'edit', $ticket['Ticket']['id']),
    'role' => 'form',
    'class' => 'form-horizontal',
    'novalidate' => true
));

echo $this->Form->input('id', array(
    'type' => 'hidden',
    'default' => $ticket['Ticket']['id']
));
?>

<div class="modal-body">
    <?php
    echo $this->Form->input('Foo.cif', array(
        'type' => 'text',
        'default' => $ticket['Ticket']['cif'],
        'disabled' => 'disabled',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'CIF'
        ),
        'between' => '<div class="col-sm-6">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('interaction_code1', array(
        'type' => 'text',
        'default' => $ticket['InteractionLevel1']['interaction_title1'],
        'disabled' => 'disabled',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Interaction'
        ),
        'between' => '<div class="col-sm-6">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('interaction_code2', array(
        'type' => 'text',
        'default' => $ticket['InteractionLevel2']['interaction_title2'],
        'disabled' => 'disabled',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Interaction Detail'
        ),
        'between' => '<div class="col-sm-6">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('interaction_code3', array(
        'type' => 'text',
        'default' => $ticket['InteractionLevel3']['interaction_title3'],
        'disabled' => 'disabled',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Interaction Sub Detail'
        ),
        'between' => '<div class="col-sm-6">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('customer_name', array(
        'type' => 'text',
        'default' => $ticket['Ticket']['customer_name'],
        'disabled' => 'disabled',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Full Name'
        ),
        'between' => '<div class="col-sm-6">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('email', array(
        'type' => 'email',
        'default' => $ticket['Ticket']['email'],
        'disabled' => 'disabled',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Email Address'
        ),
        'between' => '<div class="col-sm-6">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('telephone', array(
        'type' => 'text',
        'default' => $ticket['Ticket']['telephone'],
        'disabled' => 'disabled',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Telephone'
        ),
        'between' => '<div class="col-sm-6">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('department_id', array(
        'type' => 'text',
        'default' => $ticket['Ticket']['department_id'],
        'disabled' => 'disabled',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Assign to Department'
        ),
        'between' => '<div class="col-sm-6">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('subject', array(
        'type' => 'text',
        'default' => $ticket['Ticket']['subject'],
        'disabled' => 'disabled',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Subject'
        ),
        'between' => '<div class="col-sm-6">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('channel_type', array(
        'type' => 'text',
        'default' => $ticket['Ticket']['channel_type'],
        'disabled' => 'disabled',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Channel Type'
        ),
        'between' => '<div class="col-sm-6">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('sla', array(
        'type' => 'text',
        'default' => '7',
        'disabled' => 'disabled',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'SLA'
        ),
        'between' => '<div class="col-sm-2">',
        'after' => '</div> Days',
        'class' => 'form-control',
        'disabled' => 'disabled'
    ));
    ?>

    <?php
    echo $this->Form->input('message', array(
        'type' => 'textarea',
        'default' => $ticket['Ticket']['message'],
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Message'
        ),
        'between' => '<div class="col-sm-6">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>

    <?php
    echo $this->Form->input('ticket_status', array(
        'options' => $ticket_statuses,
        'default' => $ticket['Ticket']['ticket_status'],
        'empty' => '--CHOOSE--',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Ticket Status'
        ),
        'between' => '<div class="col-sm-6">',
        'after' => '</div>',
        'class' => 'form-control'
    ));
    ?>
    
</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-mami-green1">
        <span class="glyphicon glyphicon-floppy-saved"></span> Save Changes
    </button>

    <button type="button" class="btn btn-mami-brown" data-dismiss="modal">
        <span class="glyphicon glyphicon-remove"></span> Close
    </button>
</div>

<?php
echo $this->Form->end();
?>
