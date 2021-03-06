<div class="box box-mami-green1">
                            
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-ticket"></i> &nbsp; List Tickets</h3>
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
                'style' => 'margin-right: 5px; margin-bottom:5px; width: 150px;'
            ));
            ?>

            <?php
            echo $this->Form->input('ticket_status', array(
                'options' => $ticket_statuses,
                'empty' => '--NO FILTER--',
                'default' => isset($this->request->query['ticket_status']) ? $this->request->query['ticket_status'] : '',
                'label' => 'Status :&nbsp;',
                'div' => false,
                'class' => 'form-control input-sm',
                'style' => 'margin-right: 5px; margin-bottom:5px;'
            ));
            ?>

            <?php
            echo $this->Form->input('sla_state', array(
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
            ));
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
        </div>

        <div class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-6">
                    <div class="dataTables_length" id="example_length">
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
                                'onchange' => 'this.form.submit()',
                                'aria-controls' => 'example'
                            ));
                            ?>
                            entries
                        </label>
                    </div>
                </div>

                <div class="pull-right" style="margin-right: 15px;">
                    <div id="example_filter" class="dataTables_filter">
                        <?php
                        echo $this->Html->link(
                            '<i class="fa fa-file-excel-o"></i> Export to Excel',
                            Router::url(array(
                                'controller' => 'tickets',
                                'action' => 'export_excel'
                            ), true).'?'.http_build_query($this->request->query),
                            array(
                                'class' => 'btn btn-sm btn-mami-green1',
                                'escape' => false
                            )
                        );
                        ?>

                        <label>
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

        <?php
        if ($grid_view_type == 'already_due_date'):
            echo $this->element('Tickets/ticket_already_due_date');
        else:
            echo $this->element('Tickets/ticket_main');
        endif;
        ?>

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
echo $this->Html->css(
    array('/plugins/datepicker/datepicker3'),
    array('inline' => false)
);

echo $this->Html->script(
    array(
        '/plugins/datepicker/bootstrap-datepicker',
        'app/tickets/tickets_index'
    ),
    array('block' => 'scriptBottom')
);
?>