<div class="login-box">

    <div class="login-logo">
        <a href="<?php echo Router::url('/'); ?>">
            <?php echo $this->Html->image('logo.png', array('class' => 'img-responsive')); ?>
        </a>
    </div>

    <div class="login-box-body">
        
        <p class="login-box-msg" style="font-weight: bold; font-size: 1.5em;">Sign in to MAMI</p>

        <form action="../../index2.html" method="post">
            
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            &nbsp;
                        </label>
                    </div>
                </div><!-- /.col -->

                <div class="col-xs-4">
                    <button type="submit" class="btn btn-mami-green1 btn-block btn-flat">
                        <span class="glyphicon glyphicon-play"></span> Sign In
                    </button>
                </div><!-- /.col -->
            </div>

        </form>

    </div>

</div>