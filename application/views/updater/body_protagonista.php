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
		$i=0;
		$list=array();

		foreach ($protagonistak->result() as $protagonista){
			//anchor(uri segments, text, attributes)
			$attributes = array(
					'class' => 'protagonista'
			);

			$list[$i]= anchor("dashboard/protagonista_updater/".$protagonista->id, mb_strtolower( $protagonista->abizena1. " " . $protagonista->abizena2 . " " . $protagonista->izena . " (" . $protagonista->ezizena . ")", 'UTF-8') , $attributes) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . anchor("dashboard/protagonista_delete/".$protagonista->id, mb_strtolower('ezabatu', 'UTF-8') , $attributes);
			$i=$i+1;
		}


		$attributes = array(
                    'class' => 'tres_columnas',
                    'id'    => 'dashboard_link_lista',
					'name'	=> 'dashboard_link_lista'
                    );

echo ul($list, $attributes);
?>
	</div>
</div>
<script>

</script>
