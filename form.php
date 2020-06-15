<?    
//2 часть - form.php
############################################################              
$name_and_email =  $your_name . ' <'.$admin_email.'>';         
$message = '
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>'.$subject.'</title>
	 
</head>
<body style="margin: 0; padding: 0; border: 1px solid #c0c8d0;">
    <div style=" background-color: #2bb127;  width: 100%; height: 100px;">
    	 <div style="width: 170px; height: 100px; color: aliceblue; background-color: #4b5863; text-align:center;"><span  style="line-height: 100px;   font-size: 14px;">'.$name_site.'</span></div> 
    	<div style="margin-top:-59px;  color: aliceblue; font-size: 12px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; '.$slogan.', <a href="'.$domen.'" target="_blank" style="color:  aliceblue;">САЙТ</a> </div>
    </div>
<div style="text-indent: 25px; font-family: Helvetica; font-size: 11px; line-height: 14px; margin-left: 30px;">
	<h2 style="font-weight:100;font-family:Helvetica;font-size:24px;text-align:center; color:#6d766f;line-height:31px;">'.$subject.'</h2>
'.$text_on_form.'
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>
<p>&nbsp;</p>

<p  style="display:block;  font-family:Arial;font-size:12px;color:#a2a2a2;line-height:15px;">Это сообщение отправлено автоматически, на него не нужно отвечать.</p>
</div>
    <div  style="
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 80px;
  background-color: #4b5863;"> 
    	<div style=" color:  #b4bcc3; text-align: center; line-height: 80px; font-size: 11px;"><a href="'.$domen.'" target="_blank"  style=" color:  aliceblue;">© '.$name_site.'</a>&nbsp;&nbsp;'.$begin_year.'&nbsp;&nbsp;-&nbsp;&nbsp;'.date('Y').' </div> 
    </div>
    </div>
</body>
</html>
';

$headers = null;
$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $name_and_email\r\n"; // от кого
$send = mail($To, $subject, $message, $headers); 
############################################################
?>