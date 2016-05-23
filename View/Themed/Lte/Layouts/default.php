<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>MAMI</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php
    echo $this->Html->css(array(
        '/bootstrap/css/bootstrap.min.css',
        '/plugins/font-awesome-4.6.2/css/font-awesome.min.css',
        'AdminLTE.min',
        'skin-mami',
        'app'
    ));

    echo $this->fetch('css');
    ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="hold-transition skin-mami layout-top-nav">

    <div class="wrapper">
        
        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container-fluid">
                    
                    <div class="navbar-header">
                        <a href="<?php echo Router::url('/').'dashboard'; ?>" class="navbar-brand">
                            <?php echo $this->Html->image('logo.png'); ?>
                        </a>

                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        
                        <ul class="nav navbar-nav">

                            <li>
                                <?php
                                echo $this->Html->link(
                                    '<i class="fa fa-users"></i> &nbsp; Customers',
                                    array('controller' => 'customers', 'action' => 'index'),
                                    array('escape' => false)
                                );
                                ?>
                            </li>

                            <li>
                                <?php
                                echo $this->Html->link(
                                    '<i class="fa fa-ticket"></i> &nbsp; Tickets',
                                    array('controller' => 'tickets', 'action' => 'index'),
                                    array('escape' => false)
                                );
                                ?>
                            </li>

                            <li>
                                <?php
                                echo $this->Html->link(
                                    '<i class="fa fa-book"></i> &nbsp; Knowledge Base',
                                    'http://192.168.198.180:8484/mami-kb',
                                    array(
                                        'escape' => false,
                                        'target' => '_blank'
                                    )
                                );
                                ?>
                            </li>

                            <?php
                            if (
                                AuthComponent::user('role') == 'ADM' || 
                                AuthComponent::user('role') == 'ROOT'
                            ):
                            ?>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-file-text"></i> &nbsp; 
                                    Reports <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-dashboard"></i> &nbsp; Dashboard',
                                            array(
                                                'controller' => 'dashboard',
                                                'action' => 'index'
                                            ),
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>

                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-table"></i> &nbsp; Top 10 Interaction Complaint',
                                            Router::url(array(
                                                'controller' => 'tickets',
                                                'action' => 'index'
                                            ),true).'?interaction_code1=4&interaction_code2=&ticket_status=&sla_state=&periode=&from_date=&from_date_val=&to_date=&to_date_val=&rpp=10&kwd=',
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>

                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-table"></i> &nbsp; Top 10 Interaction Request',
                                            Router::url(array(
                                                'controller' => 'tickets',
                                                'action' => 'index'
                                            ),true).'?interaction_code1=3&interaction_code2=&ticket_status=&sla_state=&periode=&from_date=&from_date_val=&to_date=&to_date_val=&rpp=10&kwd=',
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>

                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-table"></i> &nbsp; Top 10 Interaction Inquiry',
                                            Router::url(array(
                                                'controller' => 'tickets',
                                                'action' => 'index'
                                            ),true).'?interaction_code1=1&interaction_code2=&ticket_status=&sla_state=&periode=&from_date=&from_date_val=&to_date=&to_date_val=&rpp=10&kwd=',
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>

                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-table"></i> &nbsp; Tiket yang sudah due date',
                                            Router::url(array(
                                                'controller' => 'tickets',
                                                'action' => 'index'
                                            ),true).'?interaction_code1=&interaction_code2=&ticket_status=&sla_state=EQ_SLA&periode=&from_date=&from_date_val=&to_date=&to_date_val=&rpp=100&kwd=',
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>

                                    <!-- OPEN BELUM LEWAT SLA -->
                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-table"></i> &nbsp;  Tiket <strong>open daily</strong> yang belum lewat SLA',
                                            Router::url(array(
                                                'controller' => 'tickets',
                                                'action' => 'index'
                                            ),true).'?interaction_code1=&interaction_code2=&ticket_status=P&sla_state=LT_SLA&periode=D&from_date=&from_date_val=&to_date=&to_date_val=&rpp=100&kwd=',
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>

                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-table"></i> &nbsp;  Tiket <strong>open weekly</strong> yang belum lewat SLA',
                                            Router::url(array(
                                                'controller' => 'tickets',
                                                'action' => 'index'
                                            ),true).'?interaction_code1=&interaction_code2=&ticket_status=P&sla_state=LT_SLA&periode=W&from_date=&from_date_val=&to_date=&to_date_val=&rpp=100&kwd=',
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>

                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-table"></i> &nbsp;  Tiket <strong>open monthly</strong> yang belum lewat SLA',
                                            Router::url(array(
                                                'controller' => 'tickets',
                                                'action' => 'index'
                                            ),true).'?interaction_code1=&interaction_code2=&ticket_status=P&sla_state=LT_SLA&periode=M&from_date=&from_date_val=&to_date=&to_date_val=&rpp=100&kwd=',
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>


                                    <!-- SUBMIT BELUM LEWAT SLA -->
                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-table"></i> &nbsp;  Tiket <strong>submit daily</strong> yang belum lewat SLA',
                                            Router::url(array(
                                                'controller' => 'tickets',
                                                'action' => 'index'
                                            ),true).'?interaction_code1=&interaction_code2=&ticket_status=S&sla_state=LT_SLA&periode=D&from_date=&from_date_val=&to_date=&to_date_val=&rpp=100&kwd=',
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>

                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-table"></i> &nbsp;  Tiket <strong>submit weekly</strong> yang belum lewat SLA',
                                            Router::url(array(
                                                'controller' => 'tickets',
                                                'action' => 'index'
                                            ),true).'?interaction_code1=&interaction_code2=&ticket_status=S&sla_state=LT_SLA&periode=W&from_date=&from_date_val=&to_date=&to_date_val=&rpp=100&kwd=',
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>

                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-table"></i> &nbsp;  Tiket <strong>submit monthly</strong> yang belum lewat SLA',
                                            Router::url(array(
                                                'controller' => 'tickets',
                                                'action' => 'index'
                                            ),true).'?interaction_code1=&interaction_code2=&ticket_status=S&sla_state=LT_SLA&periode=M&from_date=&from_date_val=&to_date=&to_date_val=&rpp=100&kwd=',
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>

                                    <!-- OPEN SUDAH LEWAT SLA -->
                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-table"></i> &nbsp;  Tiket <strong>open daily</strong> yang <strong>sudah</strong> lewat SLA',
                                            Router::url(array(
                                                'controller' => 'tickets',
                                                'action' => 'index'
                                            ),true).'?interaction_code1=&interaction_code2=&ticket_status=P&sla_state=GT_SLA&periode=D&from_date=&from_date_val=&to_date=&to_date_val=&rpp=100&kwd=',
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>

                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-table"></i> &nbsp;  Tiket <strong>open weekly</strong> yang <strong>sudah</strong> lewat SLA',
                                            Router::url(array(
                                                'controller' => 'tickets',
                                                'action' => 'index'
                                            ),true).'?interaction_code1=&interaction_code2=&ticket_status=P&sla_state=GT_SLA&periode=W&from_date=&from_date_val=&to_date=&to_date_val=&rpp=100&kwd=',
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>

                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-table"></i> &nbsp;  Tiket <strong>open monthly</strong> yang <strong>sudah</strong> lewat SLA',
                                            Router::url(array(
                                                'controller' => 'tickets',
                                                'action' => 'index'
                                            ),true).'?interaction_code1=&interaction_code2=&ticket_status=P&sla_state=GT_SLA&periode=M&from_date=&from_date_val=&to_date=&to_date_val=&rpp=100&kwd=',
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>


                                    <!-- SUBMIT SUDAH LEWAT SLA -->
                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-table"></i> &nbsp;  Tiket <strong>submit daily</strong> yang <strong>sudah</strong> lewat SLA',
                                            Router::url(array(
                                                'controller' => 'tickets',
                                                'action' => 'index'
                                            ),true).'?interaction_code1=&interaction_code2=&ticket_status=S&sla_state=GT_SLA&periode=D&from_date=&from_date_val=&to_date=&to_date_val=&rpp=100&kwd=',
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>

                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-table"></i> &nbsp;  Tiket <strong>submit weekly</strong> yang <strong>sudah</strong> lewat SLA',
                                            Router::url(array(
                                                'controller' => 'tickets',
                                                'action' => 'index'
                                            ),true).'?interaction_code1=&interaction_code2=&ticket_status=S&sla_state=GT_SLA&periode=W&from_date=&from_date_val=&to_date=&to_date_val=&rpp=100&kwd=',
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>

                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-table"></i> &nbsp;  Tiket <strong>submit monthly</strong> yang <strong>sudah</strong> lewat SLA',
                                            Router::url(array(
                                                'controller' => 'tickets',
                                                'action' => 'index'
                                            ),true).'?interaction_code1=&interaction_code2=&ticket_status=S&sla_state=GT_SLA&periode=M&from_date=&from_date_val=&to_date=&to_date_val=&rpp=100&kwd=',
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-wrench"></span> &nbsp; 
                                    Settings <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<span class="glyphicon glyphicon-user"></span> &nbsp; Users',
                                            array('controller' => 'users', 'action' => 'index'),
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>

                                    <li>
                                        <?php
                                        echo $this->Html->link(
                                            '<span class="glyphicon glyphicon-th-large"></span> &nbsp; Departments',
                                            array('controller' => 'departments', 'action' => 'index'),
                                            array('escape' => false)
                                        );
                                        ?>
                                    </li>
                                </ul>
                            </li>

                            <?php
                            endif;
                            ?>

                        </ul>

                    </div>

                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        
                        <ul class="nav navbar-nav">
                            
                            <li class="dropdown user user-menu">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs">
                                        <span class="glyphicon glyphicon-user"></span> &nbsp; 
                                        <?php echo AuthComponent::user('complete_name'); ?>
                                    </span>
                                </a>
                            </li>

                            <li class="dropdown user user-menu">
                                <a href="<?php echo Router::url('/').'users/logout'; ?>">
                                    <span class="hidden-xs">
                                        <span class="glyphicon glyphicon-off"></span> &nbsp; Logout
                                    </span>
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>
            </nav>
        </header>

        <div class="content-wrapper">
            <div class="container-fluid">
                
                <section class="content-header">
                    <h1>
                        <?php
                        if (isset($__module_title__)):
                            echo $__module_title__;
                        else:
                            echo "Untitled";
                        endif;
                        ?> 
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        
                        <!-- START -->
                        <?php
                        echo $this->Session->flash('flash');
                        echo $this->Session->flash('auth');

                        echo $this->fetch('content');
                        ?>
                        <!-- END -->

                    </div>

                </section>
            
            </div>

        </div>

    </div>

<script type="text/javascript">
<?php
echo 'var __base_url = "'.Router::url('/').'";';
echo "\n";
?>
</script>

<?php
echo $this->Html->script(array(
    '/plugins/jQuery/jQuery-2.1.4.min.js',
    '/bootstrap/js/bootstrap.min.js',
    '/plugins/slimScroll/jquery.slimscroll.min.js',
    '/plugins/fastclick/fastclick.min.js',
    'app.min'
));
?>

<?php
echo $this->fetch('scriptBottom');
?>

<?php echo $this->element('sql_dump'); ?>

</body>
</html>
