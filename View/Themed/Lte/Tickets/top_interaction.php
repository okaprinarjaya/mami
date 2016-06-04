<div class="box box-mami-green1">
                            
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-ticket"></i> &nbsp; Top Interaction</h3>
    </div>

    <div class="box-body">
        <div style="padding: 5px; border:1px #DDDDDD solid; margin-bottom: 5px;">
            <?php
            echo $this->Form->create('Filter', array(
                'type' => 'get',
                'class' => 'form-inline',
                'role' => 'form'
            ));
            ?>

            <?php
            echo $this->Form->input('interaction_code1', array(
                'options' => $interactions_root,
                'empty' => '--CHOOSE--',
                'default' => isset($this->request->query['interaction_code1']) ? $this->request->query['interaction_code1'] : '',
                'label' => 'Interaction : &nbsp;',
                'div' => false,
                'class' => 'form-control input-sm',
                'style' => 'margin-right: 5px; margin-bottom:5px; width: 150px;'
            ));
            ?>

            <?php
            echo $this->Form->input('interaction_code2', array(
                'options' => $interactions_codes2,
                'empty' => '--CHOOSE--',
                'default' => isset($this->request->query['interaction_code2']) ? $this->request->query['interaction_code2'] : '',
                'label' => 'Interaction Detail :&nbsp;',
                'div' => false,
                'class' => 'form-control input-sm',
                'style' => 'margin-right: 5px; margin-bottom:5px; width: 200px;'
            ));
            ?>

            <?php
            /*echo $this->Form->input('ticket_status', array(
                'options' => $ticket_statuses,
                'empty' => '--NO FILTER--',
                'default' => isset($this->request->query['ticket_status']) ? $this->request->query['ticket_status'] : '',
                'label' => 'Status :&nbsp;',
                'div' => false,
                'class' => 'form-control input-sm',
                'style' => 'margin-right: 5px; margin-bottom:5px;'
            ));*/
            ?>

            <?php
            /*echo $this->Form->input('sla_state', array(
                'options' => array(
                    'LT_SLA' => 'Belum melewati SLA',
                    'GT_SLA' => 'Sudah Melewati SLA',
                    'EQ_SLA' => 'Due Date',
                ),
                'empty' => '--CHOOSE--',
                'default' => isset($this->request->query['sla_state']) ? $this->request->query['sla_state'] : '',
                'label' => 'SLA :&nbsp;',
                'div' => false,
                'class' => 'form-control input-sm',
                'style' => 'margin-right: 5px; margin-bottom:5px;'
            ));*/
            ?>

            <?php
            echo $this->Form->input('periode', array(
                'options' => array(
                    'D' => 'Daily',
                    'W' => 'Weekly',
                    'M' => 'Monthly'
                ),
                'empty' => '--CHOOSE--',
                'default' => isset($this->request->query['periode']) ? $this->request->query['periode'] : '',
                'label' => 'Periode :&nbsp;',
                'div' => false,
                'class' => 'form-control input-sm',
                'style' => 'margin-right: 5px; margin-bottom:5px;'
            ));
            ?>

            <br />

            <?php
            echo $this->Form->input('Foo.from_date', array(
                'type' => 'text',
                'default' => isset($this->request->query['from_date']) ? $this->request->query['from_date'] : '',
                'label' => 'From Date :&nbsp;',
                'div' => false,
                'class' => 'form-control input-sm',
                'style' => 'margin-right: 5px;'
            ));

            echo $this->Form->input('from_date_val', array(
                'type' => 'hidden',
                'default' => isset($this->request->query['from_date_val']) ? $this->request->query['from_date_val'] : ''
            ));
            ?>

            <?php
            echo $this->Form->input('Foo.to_date', array(
                'type' => 'text',
                'default' => isset($this->request->query['to_date']) ? $this->request->query['to_date'] : '',
                'label' => 'To Date :&nbsp;',
                'div' => false,
                'class' => 'form-control input-sm',
                'style' => 'margin-right: 5px;'
            ));

            echo $this->Form->input('to_date_val', array(
                'type' => 'hidden',
                'default' => isset($this->request->query['to_date_val']) ? $this->request->query['to_date_val'] : ''
            ));
            ?>

            <button type="submit" class="btn btn-mami-brown1">
                <span class="glyphicon glyphicon-zoom-in"></span> Search
            </button>

        </div>

        <div class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="pull-right" style="margin-right: 15px; margin-bottom: 5px;">
                    <div id="example_filter" class="dataTables_filter">
                        <?php
                        echo $this->Html->link(
                            '<i class="fa fa-file-excel-o"></i> Export to Excel',
                            Router::url(array(
                                'controller' => 'tickets',
                                'action' => 'top_interaction_export_excel'
                            ), true).'?'.http_build_query($this->request->query),
                            array(
                                'class' => 'btn btn-sm btn-mami-green1',
                                'escape' => false
                            )
                        );
                        ?>
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
                    <th>Interaction</th>
                    <th>Interaction Detail</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($top_interactions as $item):
                ?>

                <tr>
                    <td><?php echo $item['InteractionLevel1']['interaction_title']; ?></td>
                    <td><?php echo $item['InteractionLevel2']['interaction_title']; ?></td>
                    <td>
                        <span class="label label-lg label-primary" style="font-size: 1em;">
                            <?php echo $item['Ticket']['totdat']; ?>
                        </span>
                    </td>
                </tr>

                <?php
                endforeach;
                ?>
            </tbody>
        </table>

    </div>

</div>


<?php
echo $this->Html->css(
    array('/plugins/datepicker/datepicker3'),
    array('inline' => false)
);

echo $this->Html->script(
    array(
        '/plugins/datepicker/bootstrap-datepicker',
        'app/tickets/tickets_top_interaction'
    ),
    array('block' => 'scriptBottom')
);
?>