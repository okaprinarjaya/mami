<div class="box">
                            
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
                    'class' => 'btn btn-warning btn-sm',
                    'escape' => false
                )
            );
            ?>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">

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
                    'default' => $customer_id,
                    'disabled' => 'disabled',
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
                    'class' => 'form-control'
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
                    'options' => $depts,
                    'empty' => '--CHOOSE--',
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
                    'options' => $channel_types,
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
                    'options' => $ticket_statuses,
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

                <div class="form-group" style="border: none; margin-left: 34.2%;">
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-floppy-saved"></span> Create
                    </button>

                    &nbsp;

                    <?php
                    echo $this->Html->link(
                        '<span class="glyphicon glyphicon-remove"></span> Cancel',
                        '/tickets',
                        array(
                            'class' => 'btn btn-default',
                            'escape' => false
                        )
                    );
                    ?>
                </div>

                <?php
                echo $this->Form->end();
                ?>
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