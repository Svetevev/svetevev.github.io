<!DOCTYPE html><html><style>.in{width:200px;left:50%;top:50%;position:absolute;transform:translate(-50%,-50%);color:##111111;}</style><head><meta charset="UTF-8"><title>delite</title></head><body>
<?  
$metka        = $_POST['metka'];
$url          = $_POST['url'];
$url_page     = $_POST['url_page'];
$get_comments = file($url);
 
if($metka)
{
	if(isset($_POST['button_show']))
	{  
		for ($i = 0; $i < count($get_comments); $i++) 
		{
			$line = trim($get_comments[$i]);
			if (strpos($line, $metka) !== false)
			{ 
			$text     = str_replace('NO::', 'YES::', $line);
			$text_new = str_replace($line, $text, $get_comments);
			$write    = file_put_contents($url, $text_new);
			}		 

		}
		if($write) { $info = 'Комментарий будет виден'; } else { $info = 'Что-то пошло не так :('; }
	}

	if(isset($_POST['button_hide']))
	{  
		for ($i = 0; $i < count($get_comments); $i++) 
		{
			$line = trim($get_comments[$i]);
			if (strpos($line, $metka) !== false)
			{ 
			$text       = str_replace('YES::', 'NO::', $line);	
			$text_new   = str_replace($line, $text, $get_comments);
			$write_hide = file_put_contents($url, $text_new);
			}		 
		}
		if($write_hide) { $info = 'Комментарий скрыт'; } else { $info = 'Запись не прошла, где-то произошла ошибка'; }
	}

	if(isset($_POST['button_delite']))
	{  
		foreach($get_comments as $key=>$value)
		{
			if(substr_count($value,$metka))
			{
				array_splice($get_comments, $key, 1);
				$write_delite = file_put_contents( $url , $get_comments );

				if($get_comments)
				{
				if($write_delite) { $info = 'Комментарий удален'; } else { $info = 'Запись не прошла, где-то произошла ошибка'; }
				}
				else
				{
					$info =  'Пусто...';
				}
			}
		}
	}
}
echo  "<div class='in'> $info </div><html><head><meta http-equiv='Refresh' content='1; URL=".$url_page."#komments_form'></head></html>"; 
?>	
</body>
</html>