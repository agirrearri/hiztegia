<div class="row">
    <div class="col-sm-offset-1 col-sm-11">
		<h3 class="page-header">
			<i class="fa fa-users"></i>
			<?= $title ?>
		</h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	<table class="table">
		<thead>
			<tr>
				<th>Izena</th>
				<th>Erabiltzailea</th>
				<th>Emaila</th>
				<th>Rola</th>
				<th>Aktibatua</th>
				<th>Ezabatu</th>
			</tr>
		</thead>
		<?php 
		// 		$tmpl = array ( 'table_open'  => '<table class="table">' );

		// 		$this->table->set_template($tmpl);
		// 		$this->table->set_heading('Izena', 'Erabiltzailea', 'Mail', 'Rol', 'Aktibatua' ,'');

		foreach ($users->result() as $user){
			/*
			 $cell = array('data' => 'Blue', 'class' => 'highlight', 'colspan' => 2);
			$this->table->add_row($cell, 'Red', 'Green');
			*/
			if($user->aktibatua==0){
				echo('<tr class="danger">');
			}else{
				echo('<tr class="success">');
			}
			if($user->rol == 'administratzaile'){
				$rol = 'Administratzailea';
			}
			if($user->rol == 'kritiko'){
				$rol = anchor('users/kolaboratzailetu/'.$user->id, 'Kolaboratzaile bihurtu', array('class'=>'link_no_permisos'));
			};
			if($user->rol == 'kolaboratzaile'){
				$rol = anchor('users/kritikotu/'.$user->id, 'Kritiko bihurtu', array('class'=>'link_permisos'));
			};
			if($user->aktibatua == 0){
				$activate = anchor('users/activar_usuario/'.$user->id, 'Aktibatu', array('class'=>'link_no_permisos'));
			}else{
				$activate = anchor('users/desactivar_usuario/'.$user->id, 'Desaktibatu', array('class'=>'link_permisos'));
			};
			echo('<td>' . $user->name . '</td>');
			echo('<td>' . $user->username . '</td>');
			echo('<td>' . $user->email . '</td>');
			echo('<td>' . $rol . '</td>');
			echo('<td>' . $activate . '</td>');
			echo('<td><div class="btn-group">' . anchor('users/delete_user/'.$user->id, '<i class="icon_close_alt2"></i>', array('class'=>'btn btn-danger')) . '</div></td>');
			echo('</tr>');

			// 			$cell = array('data' => 'Blue', 'class' => 'highlight', 'colspan' => 2);
			// 			$this->table->add_row($cell, 'Red', 'Green');
			// generates
			// <td class='highlight' colspan='2'>Blue</td><td>Red</td><td>Green</td>

			// 			$this->table->add_row($user->name, $user->username, $user->email, $rol, $activate, anchor('users/delete_user/'.$user->id, 'eliminar'));
		}

		// 		echo $this->table->generate();

		?>
		</table>
	</div>
</div>

