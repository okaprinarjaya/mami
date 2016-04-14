<div class="box box-mami-green1">
                            
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-users"></i> &nbsp; List Customers</h3>
    </div>

    <div class="box-body">

        <div id="menu-bar" style="margin-bottom: 15px;">
            <?php
            echo $this->Html->link(
                '<span class="glyphicon glyphicon-plus"></span> Customer Personal',
                array(
                    'controller' => 'customers',
                    'action' => 'add',
                    'personal'
                ),
                array(
                    'class' => 'btn btn-mami-green1',
                    'escape' => false
                )
            );
            ?>

            &nbsp;

            <?php
            echo $this->Html->link(
                '<span class="glyphicon glyphicon-plus"></span> Customer Corporate',
                array(
                    'controller' => 'customers',
                    'action' => 'add',
                    'corporate'
                ),
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
                        echo $this->Form->input('customer_type', array(
                            'options' => array(
                                'corporate' => 'Corporate',
                                'personal' => 'Personal',
                                'a' => 'CIF',
                                'b' => 'First Name',
                                'c' => 'Middle Name',
                                'd' => 'Last Name',
                                'e' => 'Birth Date',
                                'f' => 'Mailing Address',
                                'g' => 'Email',
                                'h' => 'Home Phone No.',
                                'i' => 'Mobile Phone No.'
                            ),
                            'empty' => '--EMPTY--',
                            'default' => isset($this->request->query['customer_type']) ? $this->request->query['customer_type'] : '',
                            'label' => 'Filter by: &nbsp; ',
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
                    <th>No.</th>
                    <th>CIF</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Birth Date</th>
                    <th>Mailing Address</th>
                    <th>Email</th>
                    <th>Home Phone No.</th>
                    <th>Mobile Phone No.</th>
                    <th>Client Type</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $page = $this->Paginator->params['paging']['Customer']['page'];
                $limit = $this->Paginator->params['paging']['Customer']['limit'];
                $rows_num = (($limit * $page) - $limit) + 1;

                foreach($cust as $item):
                ?>
                <tr>
                    <td style="text-align: center;"><?php echo $rows_num; ?></td>

                    <td>&nbsp;</td>
                    
                    <td>
                        <?php
                        if ($item['Customer']['CLI_TYP'] < 2):
                            echo ucfirst($item['Customer']['CLI_NM']);
                        elseif ($item['Customer']['CLI_TYP'] == 2):
                            echo ucfirst($item['Customer']['CLI_NM_PERSON']);
                        endif;
                        ?>
                    </td>

                    <td><?php echo ucfirst($item['Customer']['MID_NM']); ?></td>
                    <td><?php echo ucfirst($item['Customer']['LAST_NM']); ?></td>
                    <td><?php echo $item['Customer']['BIRTH_DT']; ?></td>
                    <td><?php echo $item['Customer']['ADDR_1_DEFAULT']; ?></td>
                    
                    <td>
                        <?php
                        if ($item['Customer']['CLI_TYP'] < 2):
                            echo $item['Customer']['EMAIL_ADD'];
                        elseif ($item['Customer']['CLI_TYP'] == 2):
                            echo $item['Customer']['EMAIL_ADD_PERSON'];
                        endif;
                        ?>
                    </td>
                    
                    <td><?php echo $item['Customer']['PRIM_PHON_NUM']; ?></td>
                    <td><?php echo $item['Customer']['MOBILE_NUM']; ?></td>
                    <td><?php echo $client_types[$item['Customer']['CLI_TYP']]; ?></td>
                    <td>
                        <?php
                        echo $this->Html->link(
                            '<span class="glyphicon glyphicon-search"></span> Detail',
                            array(
                                'controller' => 'customers',
                                'action' => 'edit',
                                $item['Customer']['CUSTOMER_ID']
                            ),
                            array('escape' => false)
                        )
                        ?>

                        <br />
                        
                        <?php
                        echo $this->Html->link(
                            '<i class="fa fa-ticket"></i> Create Ticket',
                            array(
                                'controller' => 'tickets',
                                'action' => 'add',
                                $item['Customer']['CUSTOMER_ID']
                            ),
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

<?php
echo $this->Html->script(
    array(
        'app/customers/customers_index'
    ),
    array('block' => 'scriptBottom')
);
?>