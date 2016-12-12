<!-- notificatoin dropdown start-->
<ul
    class="nav pull-right top-menu">
	<!-- user login dropdown start-->
	<li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"
		href="#"> <span class="profile-ava"> <img alt=""
				src="<?php echo(base_url());?>img/ond-small.jpg">
		</span> <span class="username">Kaixo <?= $this->session->userdata('name');?>
		</span> <b class="caret"></b>
	</a>
		<ul class="dropdown-menu extended logout">
			<div class="log-arrow-up"></div>
			<li><a href="<?php echo(base_url());?>index.php?users/logout"><i class="icon_key_alt"></i> Irten</a>
			</li>
		</ul>
	</li>
	<!-- user login dropdown end -->
</ul>
<!-- notificatoin dropdown end-->

