<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <div id="infoMessage"><?php echo $message;?></div>
                            <?php echo form_open('user/login', 'role="form" method="post"'); ?>
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="identity" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <?php echo form_submit('submit', 'Login', 'class="btn btn-lg btn-success btn-block"'); ?>
                                </fieldset>
                            </form>
                            <br />
                            <em>User Management Powered by <a href="http://benedmunds.com/ion_auth/">Ion Auth</a></em>
                        </div>
                    </div>
                </div>
            </div>
        </div>