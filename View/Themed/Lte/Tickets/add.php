<div class="box box-mami-green1">
                            
    <div class="box-header with-border">
        <h3 class="box-title"><span class="glyphicon glyphicon-plus"></span> New Ticket</h3>
    </div>

    <div class="box-body">

        <div id="menu-bar" style="margin-bottom: 15px;">
            <?php
            echo $this->Html->link(
                '<span class="glyphicon glyphicon-th-large"></span> List Tickets',
                '/tickets',
                array(
                    'class' => 'btn btn-mami-green1',
                    'escape' => false
                )
            );
            ?>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">

                <fieldset>
                    <legend>
                        Create Ticket for CIF: <?php echo '#'.$customer['Customer']['CIF_NUM']; ?> 
                        - 
                        Customer: 

                        <?php
                        if ($customer['Customer']['CLI_TYP'] < 2):
                            echo ucwords($customer['Customer']['CLI_NM'].' '.$customer['Customer']['MID_NM']);
                        elseif ($customer['Customer']['CLI_TYP'] == 2):
                            echo ucfirst($customer['Customer']['CLI_NM_PERSON']);
                        endif;
                        ?>
                    </legend>

                    <?php
                    echo $this->Form->create('Ticket', array(
                        'role' => 'form',
                        'class' => 'form-horizontal',
                        'novalidate' => true
                    ));
                    ?>

                    <?php
                    echo $this->Form->input('Foo.cif', array(
                        'type' => 'text',
                        'default' => $customer['Customer']['CIF_NUM'],
                        'div' => 'form-group',
                        'label' => array(
                            'class' => 'col-sm-4 control-label',
                            'text' => 'CIF'
                        ),
                        'between' => '<div class="col-sm-3">',
                        'after' => '</div>',
                        'class' => 'form-control',
                        'readonly' => 'readonly'
                    ));
                    ?>

                    <?php
                    echo $this->Form->input('cif', array(
                        'type' => 'hidden',
                        'default' => $customer_id
                    ));
                    ?>

                    <?php
                    echo $this->Form->input('interaction_code1', array(
                        'options' => $interactions_root,
                        'empty' => '--CHOOSE--',
                        'div' => 'form-group',
                        'label' => array(
                            'class' => 'col-sm-4 control-label',
                            'text' => 'Interaction'
                        ),
                        'between' => '<div class="col-sm-4">',
                        'after' => '</div>',
                        'class' => 'form-control',
                        'required' => true
                    ));
                    ?>

                    <?php
                    echo $this->Form->input('interaction_code2', array(
                        'options' => array(),
                        'empty' => '--EMPTY--',
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
                        'options' => array(),
                        'empty' => '--EMPTY--',
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
                        'default' => trim($customer['Customer']['CLI_NM'].' '.$customer['Customer']['MID_NM']),
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
                        'default' => $customer['Customer']['EMAIL_ADD'],
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
                        'default' => $customer['Customer']['MOBILE_NUM'],
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
                        'options' => $depts,
                        'empty' => '--CHOOSE--',
                        'div' => 'form-group',
                        'label' => array(
                            'class' => 'col-sm-4 control-label',
                            'text' => 'Assign to Department'
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
                        'class' => 'form-control',
                        'required' => true
                    ));
                    ?>

                    <?php
                    echo $this->Form->input('channel_type', array(
                        'options' => $channel_types,
                        'empty' => '--CHOOSE--',
                        'div' => 'form-group',
                        'label' => array(
                            'class' => 'col-sm-4 control-label',
                            'text' => 'Channel Type'
                        ),
                        'between' => '<div class="col-sm-4">',
                        'after' => '</div>',
                        'class' => 'form-control',
                        'required' => true
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
                    echo $this->Form->input('TicketMessage.0.ticket_message', array(
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
                    echo $this->Form->input('Foo.ticket_status', array(
                        'options' => $ticket_statuses,
                        'empty' => '--CHOOSE--',
                        'required' => true,
                        'div' => 'form-group',
                        'label' => array(
                            'class' => 'col-sm-4 control-label',
                            'text' => 'Ticket Status'
                        ),
                        'between' => '<div class="col-sm-4">',
                        'after' => '</div>',
                        'class' => 'form-control',
                    ));

                    echo $this->Form->input('ticket_status', array(
                        'type' => 'hidden',
                        'default' => ''
                    ));
                    ?>

                    <div class="form-group" style="border: none; margin-left: 34.2%;">
                        <button type="submit" class="btn btn-mami-green1">
                            <span class="glyphicon glyphicon-floppy-saved"></span> Create
                        </button>

                        &nbsp;

                        <?php
                        echo $this->Html->link(
                            '<span class="glyphicon glyphicon-remove"></span> Cancel',
                            '/tickets',
                            array(
                                'class' => 'btn btn-mami-brown',
                                'escape' => false
                            )
                        );
                        ?>
                    </div>

                    <?php
                    echo $this->Form->end();
                    ?>

                </fieldset>

            </div>
        </div>

    </div>

</div>

<?php
echo $this->Html->css(
    array('/plugins/parsley/parsley.css'),
    array('inline' => false)
);
?>

<?php
echo $this->Html->script(
    array(
        '/plugins/parsley/parsley.min.js',
        'app/tickets/tickets_add'
    ),
    array('block' => 'scriptBottom')
);
?>