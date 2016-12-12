<div class="row">
	<div class="col-sm-offset-1 col-sm-11">
		<h3 class="page-header">
			<i class="fa fa-picture-o"></i>
			<?= $title?>
		</h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">

		<?php 
// 		if(isset($error)){
//  print_r($error);
// }
?>
		
		<?php
		echo(form_open_multipart('dashboard/protagonista_gorde', array('class'=>'form-horizontal')));

		$izena = array(
				'name'=>'izena',
				'id' =>'izena',
				'value'=>set_value('izena'),
				'class' => 'form-control',
				'type'=> 'text'
		);
		$abizena1 = array(
				'name'=> 'abizena1',
				'id' => 'abizena1',
				'value' => set_value('abizena1'),
				'class' => 'form-control',
				'type'=> 'text'
		);
		$abizena2 = array(
				'name'=> 'abizena2',
				'id' => 'abizena2',
				'value' => set_value('abizena2'),
				'class' => 'form-control',
				'type'=> 'text'
		);
		$ezizena = array(
				'name'=> 'ezizena',
				'id' => 'ezizena',
				'value' => set_value('ezizena'),
				'class' => 'form-control',
				'type'=> 'text'
		);
		$jaiotze_data = array(
				'name'=> 'jaiotze_data',
				'id' => 'jaiotze_data',
				'value' => set_value('jaiotze_data'),
				'class' => 'form-control',
				'type' => 'date',
				'placeholder' => 'UUUU-HH-EE',
				'pattern' => '[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])',
				'type'=> 'text'
		);
		$argazkia = array(
				'name' => 'argazkia',
				'id' => 'argazkia',
				);

		$submit= array(
				'name' =>'submit',
				'id' => 'submit',
				'type'=> 'submit',
				'class'=> 'btn btn-primary'
		);
		$testua = array(
				'name'=>'editor1',
				'id'=>'editor1',
				'class' => 'form-control ckeditor',
				'cols'=>'80',
				'rows'=>'10',
				'value'=>set_value('editor1')
		);
		?>

		<div class="form-group">
			<?=form_label('Izena:','izena', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-2">
				<?=form_input($izena);?>
			</div>
			<?php echo form_error('izena', '<div class="error">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<?=form_label('1 abizena:','abizena1', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-2">
				<?=form_input($abizena1);?>
			</div>
			<?php echo form_error('abizena1', '<div class="error">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<?=form_label('2 abizena:','abizena2', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-2">
				<?=form_input($abizena2);?>
			</div>
			<?php echo form_error('abizena2', '<div class="error">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<?=form_label('Ezizena:','ezizena', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-2">
				<?=form_input($ezizena);?>
			</div>
			<?php echo form_error('ezizena', '<div class="error">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<?=form_label('Jaiotze data:','jaiotze_data', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-2">
				<?=form_input($jaiotze_data);?>
			</div>
			<?php echo form_error('ezizena', '<div class="error">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<?=form_label('Argazkia:','argazkia', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-2">
				<?=form_upload($argazkia);?>
			</div>
			<?php echo form_error('argazkia', '<div class="error">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<?=form_label('Testua:', 'editor1', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-9">
				<?=form_textarea($testua)?>
			</div>
			<?php echo form_error('editor1', '<div class="error">', '</div>'); ?>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<?=form_button($submit, 'Gorde' )?>
				<!-- 
				<button id="submit" class="btn btn-primary" type="submit" name="submit">Gorde</button>
				<button class="btn btn-primary" type="submit">Gorde</button> -->
			</div>
		</div>

		<?php //echo validation_errors(); ?>
		<?=form_close();?>
	</div>
</div>

