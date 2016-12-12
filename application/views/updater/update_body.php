<div class="row">
	<div class="col-sm-offset-1 col-sm-11">
		<h3 class="page-header">
			<i class="fa fa-file-text-o"></i>
			<?= $title?>
		</h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 scroll">
		<?php

		$berbabat = $berbabat->row();
		$def = utf8_decode($berbabat->definizio);
		echo(form_open('dashboard/aldaketa_gorde', array('class'=>'form-horizontal')));

		$berba = array(
				'name'=>'berba',
				'id' =>'berba',
				'class' => 'form-control',
				'value' => mb_strtolower($berbabat->name, 'UTF-8'),
				'type' => 'text'
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
				'value' => $def,
			);
			?>
		<?=form_hidden('id', $berbabat->id)?>
		<div class="form-group">
			<?=form_label('Berba:','berba', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-2">
				<?=form_input($berba);?>
			</div>
			<?php echo form_error('berba', '<div class="error">', '</div>'); ?>
		</div>

		<div class="form-group">
			<?=form_label('Definizioa:', 'editor1', array('class'=>'col-sm-2 control-label'))?>
			<div class="col-sm-9">
				<?=form_textarea($definizioa)?>
			</div>
			<?php echo form_error('editor1', '<div class="error">', '</div>'); ?>
		</div>

		<div class="form-group">
			<?= form_label('Gaiak:', '', array('class' => 'col-sm-2 control-label'))?>
			<div class="col-sm-10">
				<?php 
				$i=0;
				foreach($berbaren_tagak as $tag_name => $cheked){
					$data = array(
						'name'        => $tag_name,
						'id'          => $tag_name,
						'value'       => $tagak[$i]['id'],
						'checked'     => $cheked
					);
				echo('<div class="checkbox">');
				echo form_checkbox($data).form_label($tag_name, $tag_name,  array('class' => ''));
				echo('</div>');
				$i = $i+1;
				};//end foreach
				?>
			</div>
		</div>


		<?php
// 		$list = array();
// 		$i=0;
// 		foreach($berbaren_tagak as $tag_name => $cheked){
// 			$data = array(
//     'name'        => $tag_name,
//     'id'          => $tag_name,
//     'value'       => $tagak[$i]['id'],
//     'checked'     => $cheked
//     );
// 			$list[$i] = form_checkbox($data).form_label($tag_name, $tag_name);
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
		<?=form_close();?>
	</div>
</div>

