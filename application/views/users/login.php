<?php 
$username = array(
		'name'=>'username',
		'id' =>'username',
		'value' => '',
		'class' => 'form-control',
		'placeholder' => 'Erabiltzailea',
		'type' => 'text',
		'autofocus' => ''
);
$password = array(
		'name'	=>	'password',
		'id'	=>	'password',
		'class' => 'form-control',
		'placeholder' => 'Pasahitza',
		'type' => 'password',
);

$submit = array(
		'class'=>'btn btn-primary btn-lg btn-block',
		'type' => 'submit'
);
			?>

<div
	class="container">

	<!-- <form class="login-form" action="users/verify_login">-->
	<?= form_open("users/verify_login", array('class'=>'login-form'));?>

	<div class="login-wrap">
		<p class="login-img">
			<i class="icon_lock_alt"></i>
		</p>
		<div class="input-group">
			<span class="input-group-addon"><i class="icon_profile"></i> </span>
			<?= form_input($username);?>
		</div>
		<div class="input-group">
			<span class="input-group-addon"><i class="icon_key_alt"></i> </span>
			<?= form_input($password);?>
		</div>
		<!-- <label class="checkbox"> <input type="checkbox" value="remember-me">
				Remember me <span class="pull-right"> <a href="#"> Forgot Password?</a>
			</span>
			</label> -->
		<?=form_button($submit, 'Sartu' )?>

	</div>
	<?=form_close();?>

</div>
