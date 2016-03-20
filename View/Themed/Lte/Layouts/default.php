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
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
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
                <div class="container">
                    
                    <div class="navbar-header">
                        <a href="<?php echo Router::url('/').'customers'; ?>" class="navbar-brand">
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
                        </ul>

                    </div>

                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        
                        <ul class="nav navbar-nav">
                            
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs">
                                        <span class="glyphicon glyphicon-user"></span> &nbsp; Alexander Pierce
                                    </span>
                                </a>
                            </li>

                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
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
            <div class="container">
                
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

</body>
</html>
