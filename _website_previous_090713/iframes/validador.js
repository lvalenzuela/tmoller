function chequea()
    {
    if (isBlanco(document.fm.nombre.value))
       {
       alert("Debe ingresar su nombre");
       window.document.fm.nombre.select();
       return false;
       }
	  
   
    if (!isValidEmail(document.fm.email.value))
       {
       alert("\"" + document.fm.email.value + "\" no es un e-mail valido!");
       window.document.fm.email.focus();
       window.document.fm.email.select();
       return false;
       }
	   

	if (isBlanco(document.fm.telefono.value))
       {
       alert("Debe ingresar su teléfono");
       window.document.fm.telefono.select();
       return false;
       }
	   
	   
 if (isBlanco(document.fm.comentarios.value))
      {
      alert("Debe ingresar un mensaje");
      window.document.fm.comentarios.select();
      return false;
   }

    return true
    }

function isBlanco(texto)
   {
   largo = texto.length
   for (i=0; i < largo ; i++ )
       if ( texto.charAt(i) !=" ")
          return false;
return true
   }

function isValidEmail(texto)
{
  var addressIsValid = false;
  var invalidPatterns = /(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/;
  var validPatterns = /^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/;
  if (window.RegExp)
  {
    if (!invalidPatterns.test(texto) && validPatterns.test(texto))
    {
      addressIsValid = true;
    }
    else
        {
         addressIsValid = false;
        }
  }
  else {
       if(texto.indexOf("@") >= 0)
       addressIsValid = true;
       }
return addressIsValid;
}

