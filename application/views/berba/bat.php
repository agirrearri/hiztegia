<?php
if($main_info->num_rows()!=1){
	echo("erroreren bat");
}else{
	echo('<div id="definizioa">');
	$berba = $main_info->result();
	echo('<p>');
	echo($berba[0]->name);
	echo('</p>');
	echo('<p>');
	echo($berba[0]->definizio);
	echo('</p>');
	echo('</div>');
}?>
<script type="text/javascript">
$('#head').slideUp(1000);
//$('a.berba').bind('click', function(e) {
//	 e.preventDefault();
//    var href = $(this).attr("href");
//    $("#content").fadeOut(600, function(){
//   	 $("#content").load(href,function() { Cufon.refresh(); }).delay(100).display(4300);
//   	 
//        });
//});

</script>
