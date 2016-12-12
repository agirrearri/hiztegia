<div class="row">
	<div class="col-sm-offset-1 col-sm-11">
		<h3 class="page-header">
			<i class="fa fa-user"></i>
			<?= $title ?>
		</h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<?= form_open("users/create_account", array('class'=>'form-horizontal'));?>
		<?php 
		$name= array(
				'name' => 'name',
				'id' => 'name',
				'class'=> 'form-control',
				'value' => set_value('name'),
				'type'=> 'text'
		);
		$email= array(
				'name' => 'email',
				'id' => 'email',
				'class'=> 'form-control',
				'value' => set_value('email'),
				'type'=> 'text'
		);
		$username = array(
				'name'=>'username',
				'id' =>'username',
				'class'=> 'form-control',
				'value' => set_value('username'),
				'type'=>'text'
		);
		$password = array(
				'name'	=>	'password',
				'id'	=>	'password',
				'class'=> 'form-control',
				'type'=>'password'
		);
		$re_password = array(
					'name'	=>	're_password',
					'id'	=>	're_password',
'class'=> 'form-control',
'type'=>'password'
			);
$submit= array(
		'name' =>'submit',
		'id' => 'submit',
		'type'=> 'submit',
		'class'=> 'btn btn-primary'
);

			?>
		<div class="form-group">
			<?=form_label('Izena:','name', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-3">
				<?=form_input($name);?>
			</div>
			<?php echo form_error('name', '<div class="error">', '</div>'); ?>
		</div>

		<div class="form-group">
			<?=form_label('Email:','email', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-3">
				<?=form_input($email);?>
			</div>
			<?php echo form_error('email', '<div class="error">', '</div>'); ?>
		</div>

		<div class="form-group">
			<?=form_label('Erabiltzailea:','username', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-3">
				<?=form_input($username);?>
			</div>
			<?php echo form_error('username', '<div class="error">', '</div>'); ?>
		</div>

		<div class="form-group">
			<?=form_label('Pasahitza:','password', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-3">
				<?=form_input($password);?>
			</div>
			<?php echo form_error('password', '<div class="error">', '</div>'); ?>
		</div>

		<div class="form-group">
			<?=form_label('Errepikatu pasahitza:','re_password', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-3">
				<?=form_input($re_password);?>
			</div>
			<?php echo form_error('re_password', '<div class="error">', '</div>'); ?>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<?=form_button($submit, 'Gorde' )?>
				<!-- 
				<button id="submit" class="btn btn-primary" type="submit" name="submit">Gorde</button>
				<button class="btn btn-primary" type="submit">Gorde</button> -->
			</div>
		</div>
		<?= form_close();?>

		<div id="link_register">
			<?php //anchor('users/login', 'Login')?>
		</div>
		<div id="link_retry_password">
			<?php //anchor('users/retry_password', 'Recuperar password')?>
		</div>
		<?php echo validation_errors(); ?>
	</div>
</div>

