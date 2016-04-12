<div class="box box-mami-green1">
                            
    <div class="box-header with-border">
        <h3 class="box-title"><span class="glyphicon glyphicon-search"></span> &nbsp; Customer Detail</h3>
    </div>

    <div class="box-body">

        <div id="menu-bar" style="margin-bottom: 15px;">
            <?php
            echo $this->Html->link(
                '<span class="glyphicon glyphicon-th-large"></span> List Customers',
                array('controller' => 'customers', 'action' => 'index'),
                array(
                    'class' => 'btn btn-mami-green1',
                    'escape' => false
                )
            );
            ?>
        </div>

        <?php
        echo $this->Form->create('Customer', array(
            'role' => 'form',
            'class' => 'form-horizontal',
            'data-parsley-validate' => true ,
        ));

        echo $this->Form->input('CUSTOMER_ID');
        ?>
        <div id="accordion" class="panel-group ">
    
            <!-- ITEM 1 -->
            <div class="panel panel-success">
            
                <div class="panel-heading bg-mami-green1">
                    <h4 class="panel-title">
                        Corporate Customer Information
                    </h4>
                </div>
                
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <?php
                            echo $this->element('CustomersCorporate/base');
                        ?>
                    </div>
                </div>

            </div>
            
            <div class="panel panel-success">
            
                <div class="panel-heading bg-mami-green1">
                    <h4 class="panel-title">
                        <input type="checkbox" class="items" /> Company Information
                    </h4>
                </div>
                
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php
                            echo $this->element('CustomersCorporate/company_information');
                        ?>
                    </div>
                </div>

            </div>
            
            
            <!-- ITEM 3 -->
            <div class="panel panel-success">
            
                <div class="panel-heading bg-mami-green1">
                    <h4 class="panel-title">
                        <input type="checkbox" class="items" /> Contact Information
                    </h4>
                </div>
                
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php
                            echo $this->element('CustomersCorporate/contact_information');
                        ?>
                    </div>
                </div>

            </div>
            
            
            <!-- ITEM 3 -->
            <div class="panel panel-success">
            
                <div class="panel-heading bg-mami-green1">
                    <h4 class="panel-title">
                        <input type="checkbox" class="items" /> Contact person
                    </h4>
                </div>
                
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php
                            echo $this->element('CustomersCorporate/contact_person');
                        ?>
                    </div>
                </div>

            </div>
            
            <!-- ITEM 3 -->
            <div class="panel panel-success">
            
                <div class="panel-heading bg-mami-green1">
                    <h4 class="panel-title">
                        <input type="checkbox" class="items" /> Permanent Residential Address
                    </h4>
                </div>
                
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php
                            echo $this->element('CustomersCorporate/permanent_residential_address');
                        ?>
                    </div>
                </div>

            </div>
            
            <div class="panel panel-success">
            
                <div class="panel-heading bg-mami-green1">
                    <h4 class="panel-title">
                        <input type="checkbox" class="items" /> Default Mail Address
                    </h4>
                </div>
                
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php
                            echo $this->element('CustomersCorporate/default_email_address');
                        ?>
                    </div>
                </div>

            </div>
            
            
            
            <div class="panel panel-success">
            
                <div class="panel-heading bg-mami-green1">
                    <h4 class="panel-title">
                        <input type="checkbox" class="items" /> FATCA
                    </h4>
                </div>
                
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php
                            echo $this->element('CustomersCorporate/fatca');
                        ?>
                    </div>
                </div>

            </div>

        </div>
        
        <!-- // END TAB NAVIGATION -->

        <div class="form-group" style="border: none; margin-left: 1%;">
            <button type="submit" class="btn btn-mami-green1">
                <span class="glyphicon glyphicon-floppy-saved"></span> Save
            </button>

            &nbsp;

            <?php
            echo $this->Html->link(
                '<span class="glyphicon glyphicon-remove"></span> Cancel',
                array('controller' => 'customers', 'action' => 'index'),
                array(
                    'class' => 'btn btn-mami-brown',
                    'escape' => false
                )
            );
            ?>
        </div>

        <?php
        echo $this->Form->end();
        ?>

    </div>

</div>

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<?php
echo $this->Html->css(
    array('/plugins/parsley/parsley.css'),
    array('inline' => false)
);
?>

<?php
echo $this->Html->script(
    array(
        '/plugins/moment.js',
        '/plugins/daterangepicker/daterangepicker.js',
        '/plugins/parsley/parsley.min.js',
        'app/customers/customers_add'
    ),
    array('block' => 'scriptBottom')
);
?>