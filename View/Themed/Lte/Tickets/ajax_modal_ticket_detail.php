<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
        Ticket Detail: 
        <span style="font-weight: bold;">
            <?php echo $ticket['Ticket']['ticket_number']; ?>
        </span>
    </h4>
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

echo $this->Form->input('due_date', array(
    'type' => 'hidden',
    'default' => $ticket['Ticket']['due_date'] == null ? 'null' : $ticket['Ticket']['due_date']
));

echo $this->Form->input('created', array(
    'type' => 'hidden',
    'default' => $ticket['Ticket']['created']
));
?>

<div class="modal-body">
    <?php
    echo $this->Form->input('Foo.cif', array(
        'type' => 'text',
        'default' => $customer_cif['Customer']['CIF_NUM'],
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
        'default' => trim($ticket['Ticket']['customer_name']),
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
    echo $this->Form->input('Foo.department_id', array(
        'type' => 'text',
        'default' => isset($ticket['Department']['department_name']) ? $ticket['Department']['department_name'] : '-',
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
        'default' => isset($channel_types[$ticket['Ticket']['channel_type']]) ? $channel_types[$ticket['Ticket']['channel_type']] : '',
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
    echo $this->Form->input('TicketMessage.0.ticket_message', array(
        'type' => 'textarea',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label',
            'text' => 'Message'
        ),
        'between' => '<div class="col-sm-6">',
        'after' => '</div>',
        'class' => 'form-control',
        'disabled' => $ticket['Ticket']['ticket_status'] == 'C' ? 'disabled' : ''
    ));

    if ($ticket['Ticket']['ticket_status'] != 'C') {
        echo $this->Form->input('TicketMessage.0.ticket_id', array(
            'type' => 'hidden',
            'default' => $ticket['Ticket']['id']
        ));
    }
    ?>

    <div class="form-group">
        <label class="col-sm-4 control-label">&nbsp;</label>
        <div class="col-sm-6">
            
            <h4 style="font-weight: bold;">Follow-Up Messages</h4>
            <hr />

            <?php
            foreach ($ticket['TicketMessage'] as $item):
                $msg = nl2br($item['ticket_message']);
                $msg .= '<br />';
                $msg .= '<span style="font-weight: bold;">';
                $msg .= $item['User']['complete_name'].' - ';
                $msg .= date('d-m-Y H:i:s', strtotime($item['created']));
                $msg .= '</span>';
                
                echo '<p>'.$msg.'<p>';
                echo '<hr />';
            endforeach;
            ?>

        </div>
    </div>

    <?php
    echo $this->Form->input('Foo.created_by', array(
        'type' => 'text',
        'default' => $ticket['CreatedBy']['complete_name'],
        'disabled' => 'disabled',
        'div' => 'form-group',
        'label' => array(
            'class' => 'col-sm-4 control-label'
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
        'between' => '<div class="col-sm-3">',
        'after' => '</div>',
        'class' => 'form-control',
        'disabled' => $ticket['Ticket']['ticket_status'] == 'C' ? 'disabled' : ''
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
