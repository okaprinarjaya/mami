<div class="box box-mami-green1">
                            
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-dashboard"></i> &nbsp; Dashboard</h3>
    </div>

    <div class="box-body">
        <div id="bar-chart"></div>
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

