<div class="box box-mami-green1">
                            
    <div class="box-body">

        <div class="panel panel-default">
            <div class="panel-body">

                <fieldset>
                    <legend>
                        Add New User
                    </legend>

                    <?php
                    echo $this->Form->create('User', array(
                        'role' => 'form',
                        'class' => 'form-horizontal',
                        'novalidate' => true
                    ));
                    ?>

                    <?php
                    echo $this->Form->input('username', array(
                        'type' => 'text',
                        'div' => 'form-group',
                        'label' => array(
                            'class' => 'col-sm-4 control-label'
                        ),
                        'between' => '<div class="col-sm-3">',
                        'after' => '</div>',
                        'class' => 'form-control'
                    ));
                    ?>

                    <?php
                    echo $this->Form->input('password', array(
                        'type' => 'password',
                        'div' => 'form-group',
                        'label' => array(
                            'class' => 'col-sm-4 control-label'
                        ),
                        'between' => '<div class="col-sm-3">',
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
                        'between' => '<div class="col-sm-3">',
                        'after' => '</div>',
                        'class' => 'form-control'
                    ));
                    ?>

                    <?php
                    echo $this->Form->input('agt_code', array(
                        'options' => $agents,
                        'div' => 'form-group',
                        'label' => array(
                            'class' => 'col-sm-4 control-label'
                        ),
                        'between' => '<div class="col-sm-3">',
                        'after' => '</div>',
                        'class' => 'form-control'
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

                </fieldset>

            </div>
        </div>

    </div>

</div>
