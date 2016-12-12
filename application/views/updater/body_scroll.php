		<?php 
		$i=0;
		$list=array();

		foreach ($berbak->result() as $berba){
			//anchor(uri segments, text, attributes)
			$attributes = array(
					'class' => 'berba'
			);

			$list[$i]= anchor("dashboard/berba_updater/".$berba->id, mb_strtolower($berba->name, 'UTF-8') , $attributes) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . anchor("dashboard/berba_delete/".$berba->id, mb_strtolower('ezabatu', 'UTF-8') , $attributes);
			$i=$i+1;
		}


		$attributes = array(
                    'class' => 'tres_columnas',
                    'id'    => 'dashboard_link_lista',
					'name'	=> 'dashboard_link_lista'
                    );

echo ul($list, $attributes);
?>
