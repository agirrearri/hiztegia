
<div class="row">
	<div class="col-sm-offset-1 col-sm-11">
		<h3 class="page-header">
			<i class="fa fa-file-text-o"></i>
			<?= $title?>
		</h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<?php


		//print_r($honi_buruz->num_rows());
		// echo($honi_buruz->testua);
		// $honi_buruz_testua = utf8_decode($honi_buruz->testua);
		echo(form_open('dashboard/honi_buruz_aldaketa_gorde', array('class'=>'form-horizontal')));

		/*ez dugu behar
			$berba = array(
					'name'=>'berba',
					'id' =>'berba',
					'value' => mb_strtolower($berbabat->name, 'UTF-8'),
					'class' => 'textfield'
			);
		*/
		$submit= array(
				'name' =>'submit',
				'id' => 'submit',
				'type'=> 'submit',
				'class' => 'btn btn-primary'
		);
		$testua = array(
				'name'=>'editor1',
				'id'=>'editor1',
				'cols'=>'200',
				'rows'=>'20',
				'value' => $honi_buruz->testua,
				'class' => 'form-control ckeditor',
			);
			?>


		<div class="form-group">
			<?=form_label('Honi buruz:', 'editor1', array('class'=>'col-sm-2 control-label'))?>
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

