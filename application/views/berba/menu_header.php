<?php
if(isset($header_info)){
	echo('<div id="radio">');
	foreach ($header_info->result() as $letra){
		/*
		echo('<li>');
		echo anchor('berba/lortu/'.$letra->letra, "<h3>".$letra->letra."</h3>", array('title'=>$letra->letra.' kargatu','class'=>'letrak'));
		echo('</li>');
		*/
		?>
		 <input type="radio" value="<?php echo($letra->letra);?>" class="letrak" id="<?php echo($letra->letra);?>" name="letra" /><label for="<?php echo($letra->letra);?>"><?php echo($letra->letra); ?></label>
	<?php 	
	}
	echo('</div>');
}
?>

<div class="ui-widget">
    <br> <label style="font-size:1.1em" for="bilatu">Bilatu: </label> <input id="bilatu"
		name="bilatu" />
</div>

<script>
$('input.letrak').bind('click', function(e) {
	 e.preventDefault();
     var letra = $(this).val();
     
    if(letra == 'á') letra ='a';
    if(letra == 'é') letra ='e';
    if(letra == 'í') letra ='i';
    if(letra == 'ó') letra ='o';
    if(letra == 'ú') letra ='u';
    
    var href = 'index.php?berba/lortu/'+ letra;
 
    $('#aurreko_orria').val(href);
    $("#main").fadeOut(1000, function(){
   	 $("#main").load(href,function() {
	    	  //Cufon.refresh();
	    	  $("#main").fadeIn(500);
	    });
        });
});

</script>


<script>
$(function() {
function log( label, value ) {
//$( "<div>" ).text( message ).prependTo( "#log" );
//$( "#log" ).scrollTop( 0 );

var href = 'berba/get/' + value;
 $("#main").fadeOut(1000, function(){
        $("#main").load(href,function() {
	    	  $("#main").fadeIn(500);
              $('#bilatu').val('');
	    });
        });
        

}
$( "#bilatu" ).autocomplete({
source: function( request, response ) {
$.ajax({
    url: "<?php echo(base_url());?>berba/berba_like",
	method: 'post',
	dataType: "json",
	data: {
		/*featureClass: "P",
		style: "full",
		maxRows: 12,*/
		term: request.term
},
success: function( data ) {
	response( $.map( data, function( item ) {
		return {
		label: item.label ,
		value: item.value
		}
		}));
}
});
},
minLength: 2,
select: function( event, ui ) {
log(ui.item.lavel, ui.item.value);
},
open: function() {
$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
},
close: function() {
$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
}
});
});
</script>
