<?php
$weekly = current_week_date_range();
?>

<div class="box box-mami-green1">
                            
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-dashboard"></i> &nbsp; Dashboard</h3>
    </div>

    <div class="box-body">
        <h4>Monthly: <?php echo date('F/Y'); ?></h4>
        <div id="bar-chart-monthly" style="margin-bottom: 50px;"></div>

        <h4>Weekly: <?php echo date('d/F/Y', strtotime($weekly['sd'])).' s/d '.date('d/F/Y', strtotime($weekly['ed'])); ?></h4>
        <div id="bar-chart-weekly" style="margin-bottom: 50px;"></div>

        <h4>Daily: <?php echo date('d/F/Y'); ?></h4>
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

