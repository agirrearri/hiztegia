<div class="row">
	<div class="col-sm-offset-1 col-sm-11">
		<h3 class="page-header">
			<i class="fa fa-weixin"></i>
			<?= $title ?>
		</h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<?php echo(form_open('dashboard/gorde', array('class'=>'form-horizontal')));

		$berba = array(
				'name'=>'berba',
				'id' =>'berba',
				'class' => 'form-control',
				'value'=>set_value('berba'),
				'type'=> 'text'
		);
		$letra = array(
				'name'=> 'letra',
				'id' => 'letra',
				'class' => 'form-control',
				'size' => '1',
				'maxlength' => '1',
				'value' => set_value('letra'),
				'type'=> 'text'
		);
		$submit= array(
				'name' =>'submit',
				'id' => 'submit',
				'type'=> 'submit',
				'class'=> 'btn btn-primary'
		);
		$definizioa = array(
				'name'=>'editor1',
				'id'=>'editor1',
				'class' => 'form-control ckeditor',
				'cols'=>'80',
				'rows'=>'10',
				'value'=>set_value('editor1')
			);

			?>
		<div class="form-group">
			<?=form_label('Berba:','berba', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-2">
				<?=form_input($berba);?>
			</div>
			<?php echo form_error('berba', '<div class="error">', '</div>'); ?>
		</div>

		<div class="form-group">
			<?=form_label('Berbaren lehen letra:', 'letra',  array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-1">
				<?=form_input($letra);?>
			</div>
			<?php echo form_error('letra', '<div class="error">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<?=form_label('Definizioa:', 'editor1', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-9">
				<?=form_textarea($definizioa)?>
			</div>
			<?php echo form_error('editor1', '<div class="error">', '</div>'); ?>
		</div>
		
		<div class="form-group">
			<?=form_label('Gaiak: ', '', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-10">
				<?php 
				foreach($tagak as $taga){
			$data = array(
    					'name'        => $taga->name,
   						'id'          => $taga->name,
    					'value'       => $taga->id,
   		 				'checked'     => FALSE
    					);
			//echo form_label($taga->name, $taga->name, array('class' => 'checkbox-inline'));
			echo('<div class="checkbox">');
			echo form_checkbox($data).form_label($taga->name, $taga->name,  array('class' => ''));
			echo('</div>');
			}
			?>
			</div>
		</div>

		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<?=form_button($submit, 'Gorde' )?>
				<!-- 
				<button id="submit" class="btn btn-primary" type="submit" name="submit">Gorde</button>
				<button class="btn btn-primary" type="submit">Gorde</button> -->
			</div>
		</div>
		<?=form_close();?>

	</div>

	<?php //echo validation_errors(); ?>

</div>
