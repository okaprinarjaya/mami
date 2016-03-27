<div class="box box-mami-green1">

    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-user"></i> &nbsp; List Users</h3>
    </div>

    <div class="box-body">

        <div id="menu-bar" style="margin-bottom: 15px;">
            <?php
            echo $this->Html->link(
                '<span class="glyphicon glyphicon-plus"></span> Add New User',
                array('controller' => 'users', 'action' => 'add'),
                array(
                    'class' => 'btn btn-mami-green1',
                    'escape' => false
                )
            );
            ?>
        </div>

        <?php
        echo $this->Form->create('Filter', array(
            'type' => 'get',
            'class' => 'form-inline',
            'role' => 'form'
        ));
        ?>

        <div class="container-fluid table-default-filter" style="padding-bottom: 5px;">
            <div class="row" style="margin-top: 5px; position: relative;">
                
                <div class="col-sm-6">

                    <div class="dataTables_length">
                        <label>
                            Show 
                            <?php
                            echo $this->Form->input('rpp', array(
                                'options' => array(
                                    '10' => '10',
                                    '25' => '25',
                                    '50' => '50',
                                    '100' => '100'
                                ),
                                'default' => isset($this->request->query['rpp']) ? $this->request->query['rpp'] : '50',
                                'label' => false,
                                'div' => false,
                                'class' => 'form-control input-sm',
                                'onchange' => 'this.form.submit()'
                            ));
                            ?>
                            entries
                        </label>
                    </div>

                </div>

                <div style="position: absolute; right:5px;">
                    <div class="dataTables_filter">

                        <label style="margin-right: 10px;">
                            <input class="form-control input-sm" type="text" name="kwd" value="<?php echo isset($this->request->query['kwd']) ? $this->request->query['kwd'] : ''; ?>">
                        </label>

                        <button type="submit" class="btn btn-mami-brown1">
                            <span class="glyphicon glyphicon-zoom-in"></span> Search
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <?php
        echo $this->Form->end();
        ?>

        <table id="pbs-index" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Complete Name</th>
                    <th>Role</th>
                    <th>Department</th>
                    <th>Date Created</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $page = $this->Paginator->params['paging']['User']['page'];
                $limit = $this->Paginator->params['paging']['User']['limit'];
                $rows_num = (($limit * $page) - $limit) + 1;

                foreach ($users as $item):
                ?>

                <tr>
                    <td><?php echo $rows_num; ?></td>

                    <td><?php echo $item['User']['username']; ?></td>

                    <td><?php echo $item['User']['email']; ?></td>

                    <td><?php echo $item['User']['complete_name']; ?></td>

                    <td><?php echo $item['User']['role']; ?></td>

                    <td><?php echo $item['Department']['department_name']; ?></td>

                    <td><?php echo $item['User']['created']; ?></td>

                    <td>
                        <?php
                        echo $this->Html->link(
                            '<span class="glyphicon glyphicon-pencil"></span> Edit',
                            array('controller' => 'users', 'action' => 'edit', $item['User']['id']),
                            array('escape' => false)
                        )
                        ?>
                    </td>
                </tr>

                <?php
                $rows_num++;
                endforeach;
                ?>
            </tbody>
        </table>

        <ul class="pagination">
            <?php
            echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
            echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
            echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
            ?>
        </ul>

    </div>

</div>
