
<div class="row">
	<div class="col-sm-offset-1 col-sm-11">
		<h3 class="page-header">
			<i class="fa fa-list"></i>
			<?= $title?>
		</h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<?php echo(form_open('tag/insert' , array('class'=>'form-horizontal')));

		$tag = array(
				'name'=>'tag',
				'id' =>'tag',
				'value' => '',
				'class' => 'form-control',
				'value'=>set_value('tag'),
				'type'=> 'text'
		);
		$submit= array(
				'name' =>'submit',
				'id' => 'submit',
				'type'=> 'submit',
				'class'=> 'btn btn-primary'
		);
		$deskribapena = array(
				'name'=>'editor',
				'id'=>'editor',
				'cols'=>'80',
				'rows'=>'10',
				'value'=>set_value('editor'),
				'class' => 'form-control ckeditor',
			);
			?>

		<div class="form-group">
			<?=form_label('Gaia:','tag', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-2">
				<?=form_input($tag);?>
			</div>
			<?php echo form_error('tag', '<div class="error">', '</div>'); ?>
		</div>

		<div class="form-group">
			<?=form_label('Deskribapena:', 'editor', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-9">
				<?=form_textarea($deskribapena)?>
			</div>
			<?php echo form_error('editor', '<div class="error">', '</div>'); ?>
		</div>

		<div class="form-group">
			<?=form_label('Hauek existitzen dira jadanik: ', '', array('class'=>'col-sm-2 control-label'))?>
				<div class="col-sm-2">
				<?php
				$list = array();
				$i=1;
				foreach($tagak as $taga){
			$data = array(
    					'name'        => $taga->name,
   						'id'          => $taga->name,
    					'value'       => $taga->id
    					);
$list[$i] = form_label($taga->name, $taga->name);
$i = $i+1;
//echo form_label($taga->name, $taga->name, array('class' => 'checkbox-inline'));

			}
					$attributes = array(
							'class' => 'tag_lista',
							'id'    => 'tag_lista',
							'name' => 'tag_lista'
					);
					echo ul($list, $attributes);?>
				

			</div>
		</div>




		<?php

// 		$list = array();
// 		$list[0] = '<b>Hauek existitzen dira jadanik:</b>';
// 		$i=1;
// 		foreach($tagak as $taga){
// 			$data = array(
//     'name'        => $taga->name,
//     'id'          => $taga->name,
//     'value'       => $taga->id,
//     'checked'     => FALSE
//     );
// 			$list[$i] = form_label($taga->name, $taga->name);
// 			$i = $i+1;
// 		}

// 		$attributes = array(
//                     'class' => 'tag_lista',
//                     'id'    => 'tag_lista',
//                     'name' => 'tag_lista'
//                     );

// echo ul($list, $attributes);
?>


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

