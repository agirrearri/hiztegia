<?php
//print_r($main_info->result());
//echo(base_url());
echo('<ul>');
foreach ($berbak->result() as $berba) {
	echo('<li class="">');
	echo "<span>".anchor('berba/get/'.$berba->id ,mb_strtolower($berba->name, 'UTF-8'), 
						array('title'=>mb_strtolower($berba->name, 'UTF-8'), 'class'=>'berba'))
				."</span>&nbsp;&nbsp;&nbsp;<span class='baltza txikia'>".$berba->sortze_data."</span>";
	echo('</li>');
}
echo('</ul>');
?>
<script>
$('a.berba').bind('click', function(e) {
	 e.preventDefault();
   var href = $(this).attr("href");
   $("#main").fadeOut(500, function(){
  	 $("#main").load(href,function() {
  	  	  Cufon.refresh();
  	  	 $("#main").fadeIn(500);
  	  	$('#main').append('<a href="'+$('#aurreko_orria').val()+'" id="atzera_joan_be" class="atzera_joan">Atzera joan</a>');
	     $('#main').prepend('<a href="'+$('#aurreko_orria').val()+'" id="atzera_joan_goi" class="atzera_joan">Atzera joan</a>');
		   $('.atzera_joan').css('float', 'right');
		   $('.atzera_joan').bind('click', function(e) {
		  		e.preventDefault();
		    	var href = $(this).attr("href");
		    	$("#main").fadeOut(500, function(){
		    		$("#main").load(href,function() { 
		    			Cufon.refresh(); 
		    	    	$("#main").fadeIn(500);
		    	 	});
		    	 });
		   });
		   
  	  	   });
  	  
       });
});
</script>