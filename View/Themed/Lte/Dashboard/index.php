<?php
$weekly = current_week_date_range();
?>

<div class="box box-mami-green1">
                            
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-dashboard"></i> &nbsp; Dashboard</h3>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <h4>Legend</h4>
                <table>
                    <tr>
                        <td style="background-color: #D69A18; width: 50px;">&nbsp;</td>
                        <td>TICKET SUBMIT</td>
                    </tr>

                    <tr>
                        <td style="background-color: #317EDA; width: 50px;">&nbsp;</td>
                        <td>TICKET OPEN</td>
                    </tr>

                    <tr>
                        <td style="background-color: #0A6A40; width: 50px;">&nbsp;</td>
                        <td>TICKET CLOSED</td>
                    </tr>
                </table>
            </div>

            <div class="col-md-4 pull-right">
                <h4>Tickets Summary</h4>
                <table class="table table-striped">
                    <tr>
                        <th>SUBMIT</th>
                        <td>
                            <span class="label label-lg label-primary" style="font-size: 1em;">
                                <?php echo $submit_count; ?>
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <th>OPEN</th>
                        <td>
                            <span class="label label-lg label-primary" style="font-size: 1em;">
                                <?php echo $inprogress_count; ?>
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <th>CLOSED</th>
                        <td>
                            <span class="label label-lg label-primary" style="font-size: 1em;">
                                <?php echo $closed_count; ?>
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <h4>Monthly: <?php echo date('F/Y'); ?></h4>
        <div id="bar-chart-monthly" style="margin-bottom: 50px;"></div>

        <h4>Weekly: <?php echo date('d/F/Y', strtotime($weekly['sd'])).' s/d '.date('d/F/Y', strtotime($weekly['ed'])); ?></h4>
        <h4>Legend</h4>
        <table>
            <tr>
                <td style="background-color: #D69A18; width: 50px;">&nbsp;</td>
                <td>TICKET SUBMIT</td>
            </tr>

            <tr>
                <td style="background-color: #317EDA; width: 50px;">&nbsp;</td>
                <td>TICKET OPEN</td>
            </tr>

            <tr>
                <td style="background-color: #0A6A40; width: 50px;">&nbsp;</td>
                <td>TICKET CLOSED</td>
            </tr>
        </table>
        <div id="bar-chart-weekly" style="margin-bottom: 50px;"></div>

        <h4>Daily: <?php echo date('d/F/Y'); ?></h4>
        <h4>Legend</h4>
        <table>
            <tr>
                <td style="background-color: #D69A18; width: 50px;">&nbsp;</td>
                <td>TICKET SUBMIT</td>
            </tr>

            <tr>
                <td style="background-color: #317EDA; width: 50px;">&nbsp;</td>
                <td>TICKET OPEN</td>
            </tr>

            <tr>
                <td style="background-color: #0A6A40; width: 50px;">&nbsp;</td>
                <td>TICKET CLOSED</td>
            </tr>
        </table>
        <div id="bar-chart-daily" style="margin-bottom: 50px;"></div>
    </div>

</div>

<?php
echo $this->Html->css(
    array('/plugins/morris/morris'),
    array('inline' => false)
);

echo $this->Html->script(
    array(
        '/plugins/raphael.min',
        '/plugins/morris/morris.min',
        'app/dashboard/dashboard_index'
    ),
    array('block' => 'scriptBottom')
);
?>

