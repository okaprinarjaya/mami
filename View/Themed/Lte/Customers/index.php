<div class="box box-mami-green1">
                            
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-users"></i> &nbsp; List Customers</h3>
    </div>

    <div class="box-body">

        <div id="menu-bar" style="margin-bottom: 15px;">
            <?php
            echo $this->Html->link(
                '<span class="glyphicon glyphicon-plus"></span> Add New Customer',
                array('controller' => 'customers', 'action' => 'add'),
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

                        <?php
                        echo $this->Form->input('filter_field', array(
                            'options' => array(
                                'CUSTOMER_ID' => 'ID Customer',
                                'CLI_NM' => 'First Name',
                                'MOBILE_NUM' => 'Mobile Phone',
                                'OTHER_PHON_NUM' => 'Mobile Phone 2',
                                'PRIM_PHON_NUM' => 'Home Phone',
                                'CLI_TYP' => 'Client Type' ,
                                'SEX_CODE' => 'Gender' ,
                            ),
                            'empty' => '-NO FILTER-',
                            'default' => isset($this->request->query['filter_field']) ? $this->request->query['filter_field'] : '',
                            'label' => 'Filter by :&nbsp;',
                            'div' => false,
                            'class' => 'form-control input-sm',
                            'style' => 'margin-right: 5px;'
                        ));
                        ?>

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
                    <th>ID Customer</th>
                    <th>First Name</th>
                    <th>Sex</th>
                    <th>Email</th>
                    <th>Client Type</th>
                    <th>Home Phone No.</th>
                    <th>Mobile Phone No.</th>
                    <th>Mobile Phone 2 No. </th>
                    <th>Office No. </th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach($cust as $key => $val):
                ?>
                <tr>
                    <td><?php echo $val['Customer']['CUSTOMER_ID']; ?></td>
                    <td><?php echo ucwords($val['Customer']['CLI_NM']); ?></td>
                    <td><?php echo $val['Customer']['SEX_CODE']; ?></td>
                    <td><?php echo $val['Customer']['EMAIL_ADD']; ?></td>
                    <td><?php echo $val['Customer']['CLI_TYP']; ?></td>
                    <td><?php echo $val['Customer']['PRIM_PHON_NUM']; ?></td>
                    <td><?php echo $val['Customer']['MOBILE_NUM']; ?></td>
                    <td><?php echo $val['Customer']['OTHER_PHON_NUM']; ?></td>
                    <td><?php echo $val['Customer']['OFFICE_PHON_NUM']; ?></td>
                    <td>
                        <?php
                        echo $this->Html->link(
                            '<span class="glyphicon glyphicon-search"></span> Detail',
                            array('controller' => 'customers', 'action' => 'edit', $val['Customer']['CUSTOMER_ID']),
                            array('escape' => false)
                        )
                        ?>

                        <br />
                        
                        <?php
                        echo $this->Html->link(
                            '<i class="fa fa-ticket"></i> Create Ticket',
                            array('controller' => 'tickets', 'action' => 'add', $val['Customer']['CUSTOMER_ID']),
                            array('escape' => false)
                        )
                        ?>
                    </td>
                </tr>
                
                <?php
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

<?php
echo $this->Html->script(
    array(
        'app/customers/customers_index'
    ),
    array('block' => 'scriptBottom')
);
?>