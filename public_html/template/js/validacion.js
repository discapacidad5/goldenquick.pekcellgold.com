function valida_vacios(ids,mensajes)
{
	var error=true;
	$.each( ids, function( i, val ) {
  	var contenido=$(val).val();
	if(contenido=='')
	{
		$(val).parent( ".input" ).addClass('state-error');
		$(val).focus();
		$(val).parent(".input").parent().append('<em class="invalid">'+mensajes[i]+'</em>');

		error=false;
	}
	else
	{
		$(val).parent(".input").parent().remove(".invalid");
	}
});
	return error;
}
function valida_espacios(ids,mensajes)
{
	var error          = true;
	var espacio_blanco = /\s/;
	$.each( ids, function( i, val ) {
  	var contenido=$(val).val();
	if(contenido.indexOf(" ") !== -1)
	{
		$(val).parent( ".input" ).addClass('state-error');
		$(val).focus();
		$(val).parent(".input").parent().append('<em class="invalid">'+mensajes[i]+'</em>');

		error=false;
	}
	else
	{
		$(val).parent(".input").parent().remove(".invalid");
	}
});
	return error;
}
function valida_correo(ids,mensajes)
{
	var error=true;
	$.each(ids,function(i,val)
	{
		var contenido=$(val).val();
		var arroba=contenido.indexOf('@');
		if(arroba==-1)
		{
			error=false;
		}
		else
		{
			var correo_nm=contenido.substring(0,arroba-1);
			if(correo_nm=='')
			{
				error=false;
			}
			else
			{
				dominio=contenido.substring(arroba+1);
				if(dominio=='')
				{
					error=false;
				}
				else
				{
					punto1=dominio.indexOf('.');
					if(punto1==-1)
					{
						error=false;
					}
					else
					{
						nom_dominio=dominio.substring(0,punto1-1);
						if(nom_dominio=='')
						{
							error=false;
						}
						else
						{
							tipo_dominio=dominio.substring(punto1+1);
							if(tipo_dominio=='')
							{
								error=false;
							}
							else
							{
								$(val).parent(".input").parent().remove(".invalid");
							}
						}
						
					}
				}
			}
		}
		if(!error)
		{
			$(val).parent( ".input" ).addClass('state-error');
			$(val).focus();
			$(val).parent(".input").parent().append('<em class="invalid">'+mensajes[i]+'</em>');
		}
	});
	return error;
}

function valida_psswrds(ids,mensaje)
{
	psswrd1=$(ids[0]).val();
	psswrd2=$(ids[1]).val();
	var error=true;
	if(psswrd1!=psswrd2)
	{
		$(ids[1]).parent( ".input" ).addClass('state-error');
		$(ids[1]).focus();
		$(ids[1]).parent(".input").parent().append('<em class="invalid">'+mensaje+'</em>');
		error=false
	}
	else
	{
		$(ids[1]).parent(".input").parent().remove(".invalid");
	}
	return error;
}

function valida_entero(ids, mensajes)
{
	var error=true;
	$.each(ids,function(i,val)
	{
		var contenido=$(val).val();
		var tamano=contenido.length;
		for(var j=0;j<tamano;j++)
		{
			var dato=contenido.substring(j,j+1);
			if($.isNumeric(dato))
			{
				var numero=parseInt(dato);
				
				if(numero%1!=0)
				{
					error=false;
					break;
				}
				else
				{
					$(val).parent(".input").parent().remove(".invalid");
				}
			}
			else
			{
				error=false;
				break;
			}
		}
		if(!error)
		{
			$(val).parent( ".input" ).addClass('state-error');
			$(val).focus();
			$(val).parent(".input").parent().append('<em class="invalid">'+mensajes[i]+'</em>');
		}
		
	});
	return error;
}

function valida_tamano(ids,min,max,mensajes)
{
	var error=true;
	$.each(ids,function(i,val)
	{
		var contenido=$(val).val();
		var tamano=contenido.length;
		if(tamano<min[i]||tamano>max[i])
		{
			$(val).parent( ".input" ).addClass('state-error');
			$(val).focus();
			$(val).parent(".input").parent().append('<em class="invalid">'+mensajes[i]+'</em>');
			error=false;
		}
		else
		{
			$(val).parent(".input").parent().remove(".invalid");
			
		}
	});
	return error;
}

function valida_fecha(ids,mensajes)
{
	var error=true;
	$.each(ids,function(i,val)
	{
		var contenido=$(val).val();
		var tamano=contenido.length;
		if(tamano!=10)
		{
			error=false;
		}
		else
		{
			var ano=contenido.substring(0,4);
			if(!$.isNumeric(ano)||ano%1!=0)
			{
				error=false;
			}
			else
			{
				var guion=contenido.substring(4,5);
				if(guion!="-")
				{
					error=false;
				}
				else
				{
					var mes=contenido.substring(5,7);
					if(!$.isNumeric(mes)||mes%1!=0)
					{
						error=false;
					}
					else
					{
						var guion=contenido.substring(7,8);
						if(guion!="-")
						{
							error=false;
						}
						else
						{
							var dia=contenido.substring(8);
							if(!$.isNumeric(dia)||dia%1!=0)
							{
								error=false;
							}
							else
							{
								$(val).parent(".input").parent().remove(".invalid");
							}
						}
					}
				}
			}
		}
		if(!error)
		{
			$(val).parent( ".input" ).addClass('state-error');
			$(val).focus();
			$(val).parent(".input").parent().append('<em class="invalid">'+mensajes[i]+'</em>');
		}
	});
	return error;
}

function valida_espacios(ids, mensajes)
{
	var error=true;
	$.each(ids,function(i,val)
	{
		var contenido=$(val).val();
		var tamano=contenido.length;
		for(var j=0;j<tamano;j++)
		{
			var dato=contenido.substring(j,j+1);
			if(dato==" ")
			{
				error=false;
				break;
			}
			else
			{
				$(val).parent(".input").parent().remove(".invalid");
			}
		}
		if(!error)
		{
			$(val).parent( ".input" ).addClass('state-error');
			$(val).focus();
			$(val).parent(".input").parent().append('<em class="invalid">'+mensajes[i]+'</em>');
		}
		
	});
	return error;
}

function valida_decimales(ids, mensajes)
{
	alert("algo");
	var error=true;
	$.each(ids,function(i,val)
	{
		var contenido=$(val).val();
		var tamano=contenido.length;
		for(var j=0;j<tamano;j++)
		{
			var dato=contenido.substring(j,j+1);
			if($.isNumeric(dato))
			{
				var numero=parseInt(dato);
				
				if(numero%1!=0)
				{
					error=false;
					break;
				}
				else
				{
					$(val).parent(".input").parent().remove(".invalid");
				}
			}
			else
			{
				if(dato==".")
				{
					$(val).parent(".input").parent().remove(".invalid");
				}
				else
				{
					error=false;
					break;
				}
			} 
		}
		if(!error)
		{
			$(val).parent( ".input" ).addClass('state-error');
			$(val).focus();
			$(val).parent(".input").parent().append('<em class="invalid">'+mensajes[i]+'</em>');
		}
		
	});
	return error;
}
