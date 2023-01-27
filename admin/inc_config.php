<?php 
/************************** */
/* fichero de configuracion */
/************************** */


/* definicion de variables generales */

$sitioTitulo = 'Pelis - '; // Aparecera en la cebereca
$sitioRutaLocal = '/infinity/'; // si la aplicación  no esta directamente colocado en la raiz de sitio.
$rutaImagenes = '/imagenes/'; // carpeta donde guarderemos las imagenes 
$rutaImagenesPerfil='admin/img/perfil/';// carpeta donde se guardan las fotos de perfil de los usuarios
$rutaLog = '/infinity/admin/log/';
$rutaModelomail = 'admin/';
/* definicion de variables del head */
$headTitle = $sitioTitulo; // para cambiarlo añadir la variable en el fichero particular;
$headDescription = 'Página de peliculas estupenda'; // meta 
$headKeywords = 'peliculas, films, series'; // meta description
$headAutor = 'Alberto Mozo'; 
$pagina = $_SERVER['SCRIPT_NAME'];
$logaccion = '-'; // variable para incluir accion  a guardar en fichero log inc_logaccesos.php
/* variables para el manejo de grupos de formación */
$grupos = ['IFCD0210_2022207.json','IFCD0210_2022211.json','IFCD0210_202211.txt','IFCD0210_202207.txt'];

/* array de roles de usuario 
si añadimos un nuevo rol debemos generar un nuevo indice */
$rolesT['A']='Administrador';
$rolesT['U']='Usuarios';
$rolesT['I']='Invitados';
$rolesT['E']='Editor';
$rolesT['S']='Secretaria';
$rolesT['G']='Gerente';



/* variables para el envio de correo con mail */
$mailto  = "albertomozodocente@gmail.com"; // correo de recepcion de mensajes
$mailheaders = "From: albertomozodocente@gmail.com\r\n";
$mailheaders .= "Reply-To: albertomozodocente@gmail.com\r\n";
$mailheaders .= "X-Mailer: PHP/".phpversion();// 4 parametro de mail se define como se envia el texto
     
/* variables para el envio de correo con PHPMailer */
$MailerMail = 'your mail';// MAil para USERNAME, FROM, REPLY
$MailerDebug = 'SMTP::DEBUG_SERVER';
$MailerHost = 'smtp.gmail.com';
$MailerUsername = $MailerMail;
$MailerPassword = 'your password';
$MailerFrom = $MailerMail;
$MailerReply = $MailerMail;

/* variables para personlaizar los estilos de los mails  */
/* $mailEnvioCabecera = file_get_contents("$rutaModelomail".'inc_modelomail_cabecera.php');
$mailEnvioPie = file_get_contents("$rutaModelomail".'inc_modelomail_pie.php'); */
 $mailEnvioCabecera = '<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title></title>
  <!--[if mso]>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
  <style>
    table, td, div, h1, p {font-family: Arial, sans-serif;}
  </style>
</head>
<body style="margin:0;padding:0;">
  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
    <tr>
      <td align="center" style="padding:0;">
        <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
          <tr>
            <td align="center" style="padding:40px 0 30px 0;background:#70bbd9;">
              <img src="https://assets.codepen.io/210284/h1.png" alt="" width="300" style="height:auto;display:block;" />
            </td>
          </tr>';
        

$mailEnvioPie = '<tr>
<td style="padding:30px;background:#ee4c50;">
  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
    <tr>
      <td style="padding:0;width:50%;" align="left">
        <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
          &reg; Someone, Somewhere 2021<br/><a href="http://www.example.com" style="color:#ffffff;text-decoration:underline;">Unsubscribe</a>
        </p>
      </td>
      <td style="padding:0;width:50%;" align="right">
        <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
          <tr>
            <td style="padding:0 0 0 10px;width:38px;">
              <a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>
            </td>
            <td style="padding:0 0 0 10px;width:38px;">
              <a href="http://www.facebook.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>'; 


/* conexion a base de datos */

// podriamos definirlo  aqui o usar otro include (inc_conexion.php);



