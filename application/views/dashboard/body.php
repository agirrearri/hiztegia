<?php 
// $i=0;
// $list=array();
// foreach ($linkak as $izen=>$link){
// 	//anchor(uri segments, text, attributes)
// 	$list[$i]= anchor($link, $izen);
// 	$i=$i+1;
// }


// $attributes = array(
//                     'class' => 'dashboard_link_lista',
//                     'id'    => 'dashboard_link_lista',
// 					'name'	=> 'dashboard_link_lista'
//                     );

// echo ul($list, $attributes);
?>

<!-- goian dago zaharra -->
<!-- ------------------------------------------------------------------------ -->
<!-- ------------------------------------------------------------------------ -->

<!-- container section start -->
<section
	id="container" class="">
	<header class="header dark-bg">
		<div class="toggle-nav">
			<div class="icon-reorder tooltips"
				data-original-title="Toggle Navigation" data-placement="bottom"></div>
		</div>

		<!--logo start-->
		<a href="dashboard" class="logo">kudeatu hemen <span class="lite"> ondarruberbetan.com</span>
		</a>
		<!--logo end-->

		<div class="top-nav notification-row">
			<!-- notificatoin dropdown start-->
			<?php echo $dropdown_menu;?>
			<!-- notificatoin dropdown end-->
		</div>
	</header>
	<!--header end-->

	<!--sidebar start-->
	<aside>
		<div id="sidebar" class="nav-collapse">
			<!-- sidebar menu start-->
			<?php echo $main_menu?>
			<!-- sidebar menu end-->
		</div>
	</aside>
	<!--sidebar end-->

	<!--main content start-->
	<section id="main-content">
		<section class="wrapper">
			<?php echo $main_content;?>
		</section>
	</section>

</section>
<!-- container section start -->
