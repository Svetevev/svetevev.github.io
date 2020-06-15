<?
include('config.php');
$name_komments      = strip_tags($_POST['name_komments']);
$text_komments      = strip_tags($_POST['text_komments']); 
$email_komments     = strip_tags($_POST['email_komments']);   
$img_hidden         = strip_tags($_POST['img_hidden']); 
$metka              = trim ( preg_replace('/[^0-9]/ui', '', microtime() ) );
$text_komments      = preg_replace('[\r\n]', '<br>', $text_komments );
$num_string         = trim ( strip_tags ( $_POST['num_string'] ) );
$identifikator      = current ( explode ( '**' , $num_string ) );  
$proverka_bad_words = preg_replace('/\s/', '',   mb_strtolower ( $name_komments.$text_komments, 'UTF-8' ) );
$md5_email          = md5 ( $email );
$data_komments      = date ( 'Y/m/d - G:i');
$how_much_komments  = '1150';//максимальная длина комментариве  
$too_long_name 		= '60';//максимальная длина имени  
$too_small_name     = '3';//минимальная длина имени 

if (isset($_COOKIE['_um_fl']))	
{
$vivod =  "Вы слишком часто отправляете сообщения.";
}
else	
{
	if($_POST['submit_koments'])   
	{
		if(!$_SESSION['admin'])
		{
			for ($i=0; $i < count($bad_word_komment); $i++) { if (@strpos($proverka_bad_words, trim($bad_word_komment[$i])) !== false) { $bad = 'Идеи предлагайте, но не ругайтесь'; } }
			for ($i=0; $i < count($bad_url_komm); $i++) { if (@strpos($proverka_bad_words, trim($bad_url_komm[$i])) !== false) { $ETC = true; } }	
		}

		if($text_komments[$how_much_komments]) { $bad = 'Текст слишком длинный'; }
		if($name_komments[$too_long_name])     { $bad = 'Имя слишком длинное';   }
		if(!$name_komments[$too_small_name])   { $bad = 'Имя слишком короткое';  }
		if(substr_count($name_komments.$text_komments.$email_komments   , '::')) { $bad  = 'Не допустимо использование сдвоенного двоеточия "::"';}
		if($ETC) { $yes_or_no = 'NO';  $vivod = 'Ваша идея будет рассмотрена после проверки'; } else { $yes_or_no = 'YES'; }		

		if(!$bad)
		{
			if($num_string)
			{
			$num_string_epd = substr_replace($num_string, '_', 3, 0); //После 3-о символа (параметр) вставляем !, который не замещает ни одного символа (параметр 0) 
			$text_comments =  $yes_or_no .'::'.$data_komments .'::'. $name_komments .'::'. $num_string_epd  .'::'. $img_hidden .'::'. $text_komments .'::'. $metka;	
			$patterns = "/$identifikator/";// что меняем 
			$replacements = "$identifikator\n$text_comments";//На что менняем 
			$text_comments = preg_replace($patterns, $replacements, $file_get_contents ); //пропускаем через функцияю замены 
			}
			else
			{	
			$text_comments =  $yes_or_no .'::'.$data_komments .'::'. $name_komments .'::'. $otvet  .'::'. $img_hidden .'::'. $text_komments .'::'. $metka ."\n";
			$text_comments =  $text_comments. $file_get_contents;	
			}
			
			if($text_comments)
			{
				$write_for_page  =	file_put_contents($file_comments_put, $text_comments, LOCK_EX);
				if($write_for_page)
				{
					
					if(!$vivod){ $vivod .= ' Ваша идея добавлена';}
					if(!$_SESSION['admin'])
					{  
						if (!isset($_COOKIE['_um_fl'])){ setcookie("_um_fl", $metka ,time()+60);} 
						$To =  $admin_email;
						$subject = "Новое сообщение на сайте $name_site";
						$text_on_form = '<h3  style="font-weight:100;font-family:Helvetica;font-size:24px;text-align:center;color:#6d766f;line-height:31px;font-family: cursive;">Здравствуйте BOSS!</h3>
						<p style="font-size: 17px;">Новое сообщение на  - <a href="'.$url_page.'#'.$metka.'" target="_blank">странице</a></p> 
						<p style="font-size: 17px;">Пользователь : <b>'.$name_komments .'</b></p>
						<p style="font-size: 17px;">Сообщение  : <b>'.$text_komments.'</b></p>';
						include('form.php');
						 
					}		 					
				}	
			}
			else   
			{
				$vivod .= 'Упс! Идея не добавлена. Повторите попытку позже';
			}	
		}
		else
		{
			$vivod = '<red>'.$bad.'</red>';
		}
	}
}
?>