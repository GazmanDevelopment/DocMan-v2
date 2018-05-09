<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$email_attr = array(
	'name'	=> 'identity',
	'id'	=> 'identity',
	'size'	=> '50',
	'type'	=> 'text',
	'class'	=> 'form-control',
	'required'	=> 'required'
);
$first_name_attr = array(
	'name'	=> 'first_name',
	'id'	=> 'first_name',
	'size'	=> '25',
	'type'	=> 'text',
	'class'	=> 'form-control',
	'required'	=> 'required'
);
$last_name_attr = array(
	'name'	=> 'last_name',
	'id'	=> 'last_name',
	'size'	=> '25',
	'type'	=> 'text',
	'class'	=> 'form-control'
);
$password_attr = array(
    'name'  => 'password',
    'id'    => 'password',
    'size'  => '25',
    'class' => 'form-control'
);
$password_confirm_attr = array(
    'name'  => 'pass_confirm',
    'id'    => 'pass_confirm',
    'size'  => '25',
    'class' => 'form-control'
);
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-user-plus fa-fw"></i> User Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	
                        	<?php echo validation_errors(); ?>
                        
                            <?php echo form_open('user/add'); ?>

                            	<label for="email">
                            		Email Address
                            	</label><br />
                            	<div class="form-group input-group <?php echo null == form_error('identity') ? '' : 'form-group has-error'; ?>">
                            		<span class="input-group-addon">@</span>
                            		<?php echo form_input($email_attr, set_value('email')); ?>
                            	</div>
                            	<?php echo form_error('email'); ?>
                            	<br />

                            	<?php echo form_fieldset("User Name / Level"); ?>
                                	<label for="first_name">
                                		First Name
                                	</label>
                                	<div class="form-group input-group <?php echo null === form_error('first_name') ? 'form-group has-error' : ''; ?>">
                                		<?php echo form_input($first_name_attr, set_value('first_name')); ?>
                                	</div>
                                	<br />
                                	<?php echo form_error('first_name'); ?>
                                	<br />
                                	<label for="last_name">
                                		Last Name
                                	</label>
                                	<div class="form-group input-group">
                                		<?php echo form_input($last_name_attr, set_value('last_name')); ?>
                                	</div>                            	
                            	<?php echo form_fieldset_close(); ?>
                            	<?php echo form_fieldset("Password"); ?>
                                    <label for="password">
                                        Password
                                    </label>
                            	    <div class="form-group input-group  <?php echo null === form_error('password') ? 'form-group has-error' : ''; ?>">
                                        <?php echo form_password($password_attr, set_value('password')); ?>
                                    </div>
                                    <label for="pass_confirm">
                                        Confirm Password
                                    </label>
                                    <div class="form-group input-group  <?php echo null === form_error('pass_confirm') ? 'form-group has-error' : ''; ?>">
                                        <?php echo form_password($password_confirm_attr); ?>
                                    </div>
                            	<?php echo form_fieldset_close(); ?>
                            	<br />
                            	<?php echo form_submit("submit", "Add New User", "class='btn btn-success'"); ?>
                        	</form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->  
                </div>
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->