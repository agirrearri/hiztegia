<div class="container_12">
	<div class="grid_12" id="burua">
	
	</div>
</div>
<div class="container_12">
	<div class="prefix_3 grid_9" id="menu_head">
		<?php echo ($menu_header_content);?>
	</div>
	<div class="clear"></div>
	<div class="grid_2 suffix_1" id="menu_left">
        	<!-- www.TuTiempo.net - Ancho:118px - Alto:36px -->
<div id="TT_tC1wLBtxYY8aceGUKfzHVhixy6lUTU12btEd1ZyoKEj"><h2><a href="http://www.tutiempo.net">El Tiempo en el mundo</a></h2><a href="http://www.tutiempo.net/Tiempo-Ondarroa-E48710.html">El tiempo en Ondarroa</a></div>
<script type="text/javascript" src="http://www.tutiempo.net/widget/eltiempo_tC1wLBtxYY8aceGUKfzHVhixy6lUTU12btEd1ZyoKEj"></script>
		 <a href="#top" title="Gora" id="to_top">Gora joan</a>
			<?php 
			echo ($menu_left_content);?>
            
	</div>
	<div class="grid_9" id="main">
			<?php 
			echo($main_content);?>
	</div>

	<div class="clear"></div>
	<div class="prefix_3 grid_6 suffix_3" id="menu_foot">
		<?php echo($menu_foot_content);?>
	</div>
</div>
<div class="container_12">
    <div class="grid_11" id="anka">
		<?php $this->load->view("berba/foot");?>
	</div>
	<div class="grid_1" id="egilea" title="webgunearen egilea: eñaut agirre arrizabalaga"><font style="color:white">@web_egilea</font></div>
</div>
 <script>
$(function() {
$( '#egilea' ).tooltip({
position: {
	 my: "center bottom-20",
	 at: "center top",
using: function( position, feedback ) {
$( this ).css( position );
$( "<div>" )
.addClass( "arrow" )
.addClass( feedback.vertical )
.addClass( feedback.horizontal )
.appendTo( this );
}
}
});
});
</script>