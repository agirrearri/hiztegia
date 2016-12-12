<div class="alpha grid_7 omega">
<div id="paginado">
<ul class="tres_columnas">
<?php
foreach($tagak as $tag){
	echo('<li class="hiztegi_item">');
	echo(anchor('berba/tagdunak/'.$tag->id ,mb_strtolower($tag->name, 'UTF-8') , array('title'=>mb_strtolower($tag->name, 'UTF-8'), 'class'=>'myriad_pro_regular tag item')));
	echo('</li>');
};
?>
</ul>
</div>
</div>
<div class="clear"></div>
<div class="alfa grid_7 omega">
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
   	 $("#main").fadeOut(600, function(){
		$('#main').load(href,function() { 
	    	 Cufon.refresh();
	    	 $("#main").fadeIn(500);
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
          	});
           });
   });
</script>
