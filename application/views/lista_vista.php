
	<div class="grid_6">
		<div class="contenido" id="contenido">
			<ul class="nav" id="nav1">
				<?php
				foreach($mensajes as $p){
?>
				<li><?=$p->name;?>: <?=$p->email;?>
				</li>
				<?php
}
?>
			</ul>
		</div>
		<div id="navegador" class="contenido">
			<ul id="pagination-digg">
				<?=$pag_links;?>
			</ul>
		</div>
	</div>
