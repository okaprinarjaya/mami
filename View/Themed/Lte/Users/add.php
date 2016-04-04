<div class="box box-mami-green1">

    <div class="box-header with-border">
        <h3 class="box-title"><span class="glyphicon glyphicon-user"></span> Add New User</h3>
    </div>
                            
    <div class="box-body">

        <div id="menu-bar" style="margin-bottom: 15px;">
            <?php
            echo $this->Html->link(
                '<span class="glyphicon glyphicon-th-large"></span> List Users',
                array('controller' => 'users', 'action' => 'index'),
                array(
                    'class' => 'btn btn-mami-green1',
                    'escape' => false
                )
            );
            ?>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">

                <?php
                echo $this->Form->create('User', array(
                    'role' => 'form',
                    'class' => 'form-horizontal'
                ));
                ?>

                <?php
                echo $this->Form->input('username', array(
                    'type' => 'text',
                    'div' => 'form-group',
                    'label' => array(
                        'class' => 'col-sm-4 control-label'
                    ),
                    'between' => '<div class="col-sm-6">',
                    'after' => '</div>',
                    'class' => 'form-control',
                    'required' => true
                ));
                ?>

                <?php
                echo $this->Form->input('password', array(
                    'type' => 'password',
                    'div' => 'form-group',
                    'label' => array(
                        'class' => 'col-sm-4 control-label'
                    ),
                    'between' => '<div class="col-sm-6">',
                    'after' => '</div>',
                    'class' => 'form-control',
                    'required' => true
                ));
                ?>

                <?php
                echo $this->Form->input('email', array(
                    'type' => 'text',
                    'div' => 'form-group',
                    'label' => array(
                        'class' => 'col-sm-4 control-label'
                    ),
                    'between' => '<div class="col-sm-6">',
                    'after' => '</div>',
                    'class' => 'form-control',
                    'required' => true
                ));
                ?>

                <?php
                echo $this->Form->input('role', array(
                    'options' => $roles,
                    'empty' => '--CHOOSE--',
                    'div' => 'form-group',
                    'label' => array(
                        'class' => 'col-sm-4 control-label'
                    ),
                    'between' => '<div class="col-sm-6">',
                    'after' => '</div>',
                    'class' => 'form-control',
                    'required' => true
                ));
                ?>

                <?php
                echo $this->Form->input('department_id', array(
                    'options' => $departments,
                    'empty' => '--CHOOSE--',
                    'div' => 'form-group',
                    'label' => array(
                        'class' => 'col-sm-4 control-label'
                    ),
                    'between' => '<div class="col-sm-6">',
                    'after' => '</div>',
                    'class' => 'form-control',
                    'required' => true
                ));
                ?>

                <?php
                echo $this->Form->input('complete_name', array(
                    'type' => 'text',
                    'div' => 'form-group',
                    'label' => array(
                        'class' => 'col-sm-4 control-label'
                    ),
                    'between' => '<div class="col-sm-6">',
                    'after' => '</div>',
                    'class' => 'form-control',
                    'required' => true
                ));
                ?>

                <div class="form-group" style="border: none; margin-left: 34.2%;">
                    <button type="submit" class="btn btn-mami-green1">
                        <span class="glyphicon glyphicon-floppy-saved"></span> &nbsp; Create
                    </button>
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
        'app/users/users_add'
    ),
    array('block' => 'scriptBottom')
);
?>