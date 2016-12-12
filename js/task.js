/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 */
$(document).ready(function(){
	$('#berba').bind('blur', function(){
		var berba_valor = $(this).val();
		var datos = {berba: berba_valor};
		$.ajax({
			url: "berba_check_ajax",
			type: 'POST',
			data: datos,
			success: function(respuesta){
				if(respuesta == true){
					//alert('todo ok');
					$('#berba').css('border', 'solid green');
				}else if(respuesta == false){
					//alert('no ok');
					$('#berba').css('border', 'solid red');
				}
			}
		});
	});
});
/*
jQuery(document).ready(function(){
	jQuery('#username').bind('blur', function(){
		var username = 'kaixo';
		var datos = {
				nombre_usuario: username
				};
		$.ajax({
	        type: "POST",
	        url: "users/username_check_ajax",
	        data: "nombre=Juan&apellido=Luna",
	        success: function(datos){
	       alert(datos);
	      }
	});
	});
});
*/
