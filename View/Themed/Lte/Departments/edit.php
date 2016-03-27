<div class="box box-mami-green1">

    <div class="box-header with-border">
        <h3 class="box-title"><span class="glyphicon glyphicon-th-large"></span> Add New Department</h3>
    </div>
                            
    <div class="box-body">

        <div id="menu-bar" style="margin-bottom: 15px;">
            <?php
            echo $this->Html->link(
                '<span class="glyphicon glyphicon-th-large"></span> List Departments',
                array('controller' => 'departments', 'action' => 'index'),
                array(
                    'class' => 'btn btn-mami-green1',
                    'escape' => false
                )
            );
            ?>

            <?php
            echo $this->Form->postLink(
                '<span class="glyphicon glyphicon-trash"></span> Delete this Department',
                array(
                    'controller' => 'departments',
                    'action' => 'delete',
                    $this->request->data['Department']['id']
                ),
                array(
                    'escape' => false,
                    'class' => 'btn btn-danger pull-right',
                    'confirm' => 'Are you sure to delete this Department?'
                )
            );
            ?>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">

                <?php
                echo $this->Form->create('Department', array(
                    'role' => 'form',
                    'class' => 'form-horizontal',
                    'novalidate' => true
                ));

                echo $this->Form->input('id');
                ?>

                <?php
                echo $this->Form->input('department_name', array(
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
