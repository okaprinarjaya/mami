<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>MAMI - Sign In</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php
    echo $this->Html->css(array(
        '/bootstrap/css/bootstrap.min.css',
        '/plugins/font-awesome-4.6.2/css/font-awesome.min.css',
        'AdminLTE.min',
        'skin-mami',
        'app'
    ));
    ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition login-page">

    <?php
    echo $this->Session->flash('flash');
    echo $this->Session->flash('auth');
    echo $this->fetch('content');
    ?>

<script type="text/javascript">
<?php
echo 'var __base_url = "'.Router::url('/').'";';
echo "\n";
?>
</script>

<?php
echo $this->Html->script(array(
    '/plugins/jQuery/jQuery-2.1.4.min.js',
    '/bootstrap/js/bootstrap.min.js'
));
?>

</body>
</html>
