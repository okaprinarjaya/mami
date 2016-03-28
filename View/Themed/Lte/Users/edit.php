<div class="box box-mami-green1">

    <div class="box-header with-border">
        <h3 class="box-title"><span class="glyphicon glyphicon-user"></span> Edit User</h3>
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

            <?php
            echo $this->Form->postLink(
                '<span class="glyphicon glyphicon-trash"></span> Delete this User',
                array(
                    'controller' => 'users',
                    'action' => 'delete',
                    $this->request->data['User']['id']
                ),
                array(
                    'escape' => false,
                    'class' => 'btn btn-danger pull-right',
                    'confirm' => 'Are you sure to delete this user?'
                )
            );
            ?>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">

                <?php
                echo $this->Form->create('User', array(
                    'role' => 'form',
                    'class' => 'form-horizontal',
                    'novalidate' => true
                ));

                echo $this->Form->input('id');
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
                    'readonly' => 'readonly'
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
                    'disabled' => 'disabled'
                ));
                ?>

                <div class="form-group">
                    <label class="col-sm-4 control-label">&nbsp;</label>
                    <div class="col-sm-6">
                        <label for="FooChpwd">Change password ?</label>

                        <?php
                        echo $this->Form->checkbox('Foo.chpwd', array(
                            'hiddenField' => false,
                            'value' => 'Y'
                        ));
                        ?>
                    </div>
                </div>

                <?php
                echo $this->Form->input('email', array(
                    'type' => 'text',
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
                echo $this->Form->input('role', array(
                    'options' => $roles,
                    'empty' => '--CHOOSE--',
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
                echo $this->Form->input('department_id', array(
                    'options' => $departments,
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
                echo $this->Form->input('complete_name', array(
                    'type' => 'text',
                    'div' => 'form-group',
                    'label' => array(
                        'class' => 'col-sm-4 control-label'
                    ),
                    'between' => '<div class="col-sm-6">',
                    'after' => '</div>',
                    'class' => 'form-control'
                ));
                ?>

                <div class="form-group" style="border: none; margin-left: 34.2%;">
                    <button type="submit" class="btn btn-mami-green1">
                        <span class="glyphicon glyphicon-floppy-saved"></span> &nbsp; Update
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
echo $this->Html->script(
    array(
        'app/users/users_edit.js'
    ),
    array('block' => 'scriptBottom')
);
?>