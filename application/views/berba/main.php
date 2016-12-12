<?php
//print_r($main_info->result());
//echo(base_url());
echo('<ul>');
foreach ($main_info->result() as $berba) {
	echo('<li>');
	echo (anchor('berba/get/'.$berba->id ,$berba->name , array('title'=>$berba->name, 'class'=>'myriad_pro_regular berba')));
	echo('</li>');
}
echo('</ul>');
?>
<script>
$('#head').slideDown(1000);
/*
$('a.berba').bind('click', function(e) {
	 e.preventDefault();
    var href = $(this).attr("href");
    $("#content").fadeOut(500, function(){
   	 $("#content").load(href,function() { 
   	   	 Cufon.refresh();
   	   	 $("#content").fadeIn(500);
   	    });
        });
});*/
</script>