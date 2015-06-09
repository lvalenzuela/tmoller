<?
global $nombre, $telefono, $email, $comentarios, $enviar ;

$enviar = $_POST['enviar'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$comentarios = $_POST['comentarios'];

if($enviar)
{
  $mensaje = "Nombres: " . $nombre . "\n";
  $mensaje.= "E-mail: " . $email . "\n";
  $mensaje.= "Teléfono: " . $telefono . "\n";
  $mensaje.= "Comentarios:\n" . $comentarios . "\n";

  mail("paisajismo@teresamoller.cl","Contacto desde teresamoller.cl ",$mensaje,"FROM: $email");
}
?><html>
<head>
<script src="validador.js"></script>
<title>:: Arquitectura del Paisaje :: Teresa Moller y Asociados ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<link href="../estilos.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {color: #CCCCCC}
-->
</style>
</head>

<body onLoad="MM_preloadImages('../images/home_f2.gif','../images/curriculum_f2.gif','../images/casas/elcondor.gif','../images/casasb_f2.gif','../images/edificiosb_f2.gif','../images/otrosb_f2.gif','../images/en_procesob_f2.gif','../images/img-public-r2.gif')">
<table width="548" height="518" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  
  <tr>
    <td width="548" height="282" valign="top"><table width="548" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="270" valign="top"><table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="226" valign="top"><div align="center">
                <p>
                  <? if($enviar) { ?>
                  <font class="texto">Gracias por contactarnos</font>
                  <? }else{ ?>
                </p>
                <form name="fm" method="POST" action="" onSubmit="return chequea()">
                  <table width="223">
                    <tr>
                      <td height="25" colspan="2" align="left" valign="top" class="texto"><span class="titulos">CONTACTO</span></td>
                      </tr>
                    <tr>
                      <td width="52" align="left" valign="top" class="texto">Nombre:</td>
                      <td width="159" height="9" class="texto"><input name="nombre" type="text" value=" " size="30"></td>
                    </tr>
                    <tr>
                      <td align="left" valign="top" class="texto"><div align="right"></div>
                        E - mail: </td>
                      <td height="20" class="texto"><input name="email" type="text" size="30"></td>
                    </tr>
                    <tr>
                      <td align="left" valign="top" class="texto">Tel&eacute;fono:</td>
                      <td height="20" class="texto"><input name="telefono" type="text" id="telefono" size="30"></td>
                    </tr>
                    <tr>
                      <td align="left" valign="top" class="texto"><div align="right"></div>
                        Mensaje:</td>
                      <td class="texto"><textarea name="comentarios" cols="27" rows="5" wrap="PHYSICAL" id="textarea"></textarea></td>
                    </tr>
                    <tr>
                      <td>
                        <div align="right"> </div></td>
                      <td align="right"><input name="enviar" type="submit" class="texto" value="Enviar"></td>
                    </tr>
                  </table>
                  <? } ?>
                </form>
            </div></td>
          </tr>
        </table></td>
        <td height="282" align="right" valign="top" class="texto">&nbsp;</td>
      </tr>
    </table>      </td>
  </tr>
  <tr>
    <td height="121" valign="top"><img src="../images/img-contact.jpg" width="548" height="148"></td>
  </tr>
  
  
  <tr>
    <td height="24" valign="bottom"><table width="548" height="24" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><a href="casas.html" target="_self" onMouseOver="MM_swapImage('Image14','','../images/casasb_f2.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../images/casasb.gif" name="Image14" width="139" height="24" border="0"></a></td>
        <td><a href="edificios.html" target="_self" onMouseOver="MM_swapImage('Image9','','../images/edificiosb_f2.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../images/edificiosb.gif" name="Image9" width="139" height="24" border="0"></a></td>
        <td><a href="otros.html" target="_self" onMouseOver="MM_swapImage('Image12','','../images/otrosb_f2.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../images/otrosb.gif" name="Image12" width="139" height="24" border="0"></a></td>
        <td><a href="enproceso.html" target="_self" onMouseOver="MM_swapImage('Image13','','../images/en_procesob_f2.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../images/en_procesob.gif" name="Image13" width="131" height="24" border="0"></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="27" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td height="1" bgcolor="#B6B5B5"><img src="../images/spacer.gif" width="1" height="1"></td>
  </tr>
      <tr>
        <td height="36"><table width="548" height="36" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="339" height="36"><img src="../images/direccion.gif" width="227" height="36"></td>
            <td width="40" valign="top"><a href="index_interior.html" target="_self" onMouseOver="MM_swapImage('Image91','','../images/home_f2.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="../images/home.gif" name="Image91" width="45" height="17" border="0" id="Image91"></a></td>
            <td width="45" align="right" valign="top"><a href="publicaciones.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image15','','../images/img-public-r2.gif',1)"><img src="../images/img-public-r1.gif" name="Image15" width="80" height="17" border="0"></a></td>
            <td width="69" valign="top"><a href="cv.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image11','','../images/curriculum_f2.gif',1)"><img src="../images/curriculum.gif" name="Image11" width="69" height="17" border="0"></a></td>
            <td width="55" valign="top"><img src="../images/contacto_f2.gif" name="Image10" width="55" height="17" border="0"></td>
          </tr>
        </table></td>
  </tr>
</table>
<table width="548" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right"><a href="http://www.singular.cl" target="_blank" class="style1">dise&ntilde;ado por: singular dise&ntilde;o </a> </td>
  </tr>
</table>
</body>
</html>
