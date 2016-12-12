<input type="hidden" id="aurreko_orria" value=""/>
</body>

<script>
	$(document).ready(function() {
		 
		$( "#radio" ).buttonset();
			
		
		
	
		$('#menu_head').hide();
		$('#menu_foot').hide();

		// hide #back-top first
		$("#to_top").hide();
		
		// fade in #back-top
		$(function () {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					$('#to_top').fadeIn();
				} else {
					$('#to_top').fadeOut();
				}
			});

			// scroll body to 0px on click
			$('#to_top').click(function () {
				$('body,html').animate({
					scrollTop: 0
				}, 800);
				return false;
			});
		});

	});
</script>

<script type="text/javascript">
	//Cufon.set('fontSize','15px').replace('#menu_head a' ,{  fontFamily: 'Destroy',textShadow: '1px 1px #17232b', hover: { color: '#d5d7fa'} });
	Cufon.set('fontSize','33px').replace('#menu_left a' ,{  fontFamily: 'LatiniaBlack',textShadow: '2px 2px #17232b', hover: { color: '#d5d7fa'} });
	//Cufon.set('fontSize', '15px').replace('#content a',{ fontFamily: 'Destroy'});
//	Cufon.replace('.myriad_pro_semibold_italic', { fontFamily: 'Myriad Pro Semibold Italic', hover: { color: '#CCC'} }); 
//	Cufon.replace('.myriad_pro_semibold', { fontFamily: 'Myriad Pro Semibold', hover: { color: '#CCC' } }); 
//	Cufon.replace('.myriad_pro_regular', { fontFamily: 'Myriad Pro Regular', hover: { color: '#CCC' } }); 
//	Cufon.set('fontSize','20px').replace('.hiztegi_item', { fontFamily: 'Myriad Pro Regular', hover: { color: '#CCC' } });
//	Cufon.replace('.myriad_pro_condensed_italic', { fontFamily: 'Myriad Pro Condensed Italic', hover: { color: '#CCC' } }); 
//	Cufon.replace('.myriad_pro_condensed', { fontFamily: 'Myriad Pro Condensed', hover: { color: '#CCC' } }); 
//	Cufon.replace('.myriad_pro_bold_italic', { fontFamily: 'Myriad Pro Bold Italic', hover: { color: '#CCC' } }); 
//	Cufon.replace('.myriad_pro_bold_condensed_italic', { fontFamily: 'Myriad Pro Bold Condensed Italic', hover: { color: '#CCC' } }); 
//	Cufon.replace('.myriad_pro_bold_condensed', { fontFamily: 'Myriad Pro Bold Condensed', hover:{ color: '#CCC' } }); 
//	Cufon.replace('.myriad_pro_bold', { fontFamily: 'Myriad Pro Bold', hover: { color: '#CCC' } }); 
</script>

<script type="text/javascript">

	$('a.main_menu_item').bind('click', function(e) {
		e.preventDefault();
	     var href = $(this).attr("href");
	     $('#aurreko_orria').val(href);
		if ($(this).attr('name')!='hiztegia'){// && $(this).attr('name')!='gaiak'
			$('#menu_head').slideUp(1000);
			$('#menu_foot').slideUp(1000);
		}
		else{
            $('#radio > input').attr('checked',false);
    		$( "#radio > input" ).button( "refresh" );
			$('#menu_head').slideDown(1000);
			$('#menu_foot').slideDown(1000);
			 
		}
		if ($(this).attr('name')!='hiztegia'){
			  $("#main").fadeOut(500, function(){
			    	 $("#main").load(href,function() {
				    	Cufon.refresh();
				    	//alert('horain');
				    	$("#main").fadeIn(500);
			    	 });
			       });
		}else{
			$('#main').html('');
		}
	   
	});
/*
	$('a.berba').bind('click', function(e) {
		 e.preventDefault();
	     var href = $(this).attr("href");
	     $("#content").fadeOut(600, function(){
	    	 $("#content").load(href,function() { Cufon.refresh(); }).delay(100).fadeIn(2300);
	         });
	});
*/

/*fondo imagen adaptable*/
function updateBackground() {
	screenWidth = $(window).width();
	screenHeight = $(window).height();
	var bg = jQuery("#bg");

	// Proporcion horizontal/vertical. En este caso la imagen es cuadrada
	ratio = 1;

	if (screenWidth/screenHeight > ratio) {
	$(bg).height("auto");
	$(bg).width("100%");
	} else {
	$(bg).width("auto");
	$(bg).height("100%");
	}

	// Si a la imagen le sobra anchura, la centramos a mano
	if ($(bg).width() > 0) {
		$(bg).css('left', (screenWidth - $(bg).width()) / 2);
	}
	}
	$(document).ready(function() {
	// Actualizamos el fondo al cargar la pagina
	updateBackground();
	$(window).bind("resize", function() {
	// Y tambien cada vez que se redimensione el navegador
	updateBackground();
	});
	});
	/*fin fondo imagen adaptable*/
	
</script>


</html>
