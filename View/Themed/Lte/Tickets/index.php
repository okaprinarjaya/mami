<div class="box box-mami-green1">
                            
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-ticket"></i> &nbsp; List Tickets</h3>
    </div>

    <div class="box-body">

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
                        echo $this->Form->input('ticket_status', array(
                            'options' => $ticket_statuses,
                            'empty' => '-NO FILTER-',
                            'default' => isset($this->request->query['ticket_status']) ? $this->request->query['ticket_status'] : '',
                            'label' => 'Ticket Status :&nbsp;',
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
                    <th>#</th>
                    <th>Ticket No.</th>
                    <th>CIF</th>
                    <th>Customer Name</th>
                    <th>Interaction</th>
                    <th>Interaction Detail</th>
                    <th>Interaction Sub Detail</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Department</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $page = $this->Paginator->params['paging']['Ticket']['page'];
                $limit = $this->Paginator->params['paging']['Ticket']['limit'];
                $rows_num = (($limit * $page) - $limit) + 1;

                foreach ($tickets as $item):
                ?>

                <tr>
                    <td><?php echo $rows_num; ?></td>

                    <td>
                        <?php
                        echo $item['Ticket']['id'];
                        ?>
                    </td>

                    <td>
                        <?php
                        echo $item['Ticket']['cif'];
                        ?>
                    </td>

                    <td>
                        <?php
                        echo $item['Ticket']['customer_name'];
                        ?>
                    </td>

                    <td>
                        <?php
                        echo $item['InteractionLevel1']['interaction_title1'];
                        ?>
                    </td>

                    <td>
                        <?php
                        echo $item['InteractionLevel2']['interaction_title2'];
                        ?>
                    </td>

                    <td>
                        <?php
                        echo $item['InteractionLevel3']['interaction_title3'];
                        ?>
                    </td>

                    <td>
                        <?php
                        echo $item['Ticket']['due_date'];
                        ?>
                    </td>

                    <td>
                        <?php
                        echo $ticket_statuses[$item['Ticket']['ticket_status']];
                        ?>
                    </td>

                    <td>
                        <?php
                        echo $item['Ticket']['department_id'];
                        ?>
                    </td>

                    <td>
                        <?php
                        echo $this->Html->link(
                            '<span class="glyphicon glyphicon-search"></span> Detail',
                            array(
                                'controller' => 'tickets',
                                'action' => 'ajax_modal_get_ticket_detail',
                                $item['Ticket']['id']
                            ),
                            array(
                                'escape' => false,
                                'data-toggle' => 'modal',
                                'data-target' => '#myModal',
                                'title' => 'View ticket detail'
                            )
                        );
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>

<style type="text/css">
.modal-body {
    max-height: calc(100vh - 210px);
    overflow-y: auto;
}
</style>

<?php
echo $this->Html->script(
    array(
        'app/tickets/tickets_index'
    ),
    array('block' => 'scriptBottom')
);
?>