<?php
$this->load->view('includes/header');?>
<div class="container_12">
	<div class="grid_12" id="burukoa">burukoa</div>
</div>
<div class="container_12">
	<div class="clear"></div>
	<div class="grid_12" id="main">
	<div class="grid_4 alpha" id="menu">lehen zutabea
	<?php 
	$this->load->view('includes/first_column');?>
	</div>
	<div class="grid_8 omega" id="content">
	<?php 
		$this->load->view($main_content);?>
	</div>
	</div>
</div>
<div class="container_12">
	<div class="grid_12" id="foot">anka
		<?php 
		$this->load->view('includes/footer');?>
	</div>
</div>
