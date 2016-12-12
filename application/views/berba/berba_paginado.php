<div class="alpha grid_8 omega">

<div id="paginado">
<ul class="tres_columnas">
<?php
foreach($berbak as $berba){
	echo('<li class="hiztegi_item">');
	echo(anchor('berba/get/'.$berba->id ,mb_strtolower($berba->name, 'UTF-8') , array('title'=>mb_strtolower($berba->name, 'UTF-8'), 'class'=>' berba item')));
	echo('</li>');
};
?>
</ul>
</div>
</div>
<div class="clear"></div>
<div class="alfa grid_8 omega" style="position:absolute;top:500px">
<div id="links">
<ul>
<?=$pag_links;?>
</ul>
</div>
</div>

<script>
//$('#menu_head').slideDown(1000);
    $("#links li a").bind('click', function(e){
     	e.preventDefault();
   	 var href = $(this).attr("href");
   	 $(".tres_columnas").fadeOut(600, function(){
		$('#main').load(href,function() { 
	    	 Cufon.refresh();
	    	 $("#main").fadeIn(500);
	    	 $('#aurreko_orria').val(href);
	    });
   	   });
 	});
     
     $('a.berba').on('click', function(e) {
     e.preventDefault();
    var href = $(this).attr("href");
    $("#content").fadeOut(500, function(){
        $("#content").load(href,function() { 
   	   	 Cufon.refresh();
   	   	 $("#content").fadeIn(500);
   	    });
        });
});

 
    $('a.item').bind('click', function(e) {
   	 e.preventDefault();
       var href = $(this).attr("href");
       $("#main").fadeOut(500, function(){
      	 $("#main").load(href,function() { 
          	 Cufon.refresh();
	 
	    	 $("#main").fadeIn(500);
			 $('#definizioa').css('font-size','14px');//enaut letra tipoa handitu dugu	
			 $('#definizioa font').css('font-size','14px');//enaut letra tipoa handitu dugu	
			 $('#definizioa p').first().css('font-size', '18px');
			
		    // alert($('#aurreko_orria').val());
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
