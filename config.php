<? session_start (); 
if($_SESSION['admin']){$admin =1;}
$your_name    = 'Svetevev'; 
$admin_email  = 'svetevevtm@gmail.com'; 
$slogan       = 'Там, где сила - там и противление. Противление грозит конфликтом, а конфликт - это Кун';
$begin_year   = '2020';
$name_site     = strtoupper($_SERVER["SERVER_NAME"]);
$url_page      = $_SERVER["HTTP_X_FORWARDED_PROTO"].'://' .$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$domen         = $_SERVER["HTTP_X_FORWARDED_PROTO"].'://' .$_SERVER["HTTP_HOST"]; 
$dir_komments  = __DIR__; 
$explo         = explode(basename($_SERVER['DOCUMENT_ROOT']),__DIR__); $count_explo=count($explo);
if($count_explo >2){$folder_http=$domen.$explo[1].basename($_SERVER['DOCUMENT_ROOT']).$explo[2].'/';}else{$folder_http= $domen.(end($explo)).'/'; }
$folder_blocks = $folder_http.'blocks/'; 

if($_POST['referer']) 
{
$_SESSION['referer_url'] = strip_tags ($_POST['referer']); 
$refresh      = '<html><meta http-equiv="refresh" content="1; URL='.$_SESSION['referer_url'] .'">';  
} 
else
{
	if($_SESSION['referer_url'])
	{ 
	$refresh      = '<html><meta http-equiv="refresh" content="1; URL='.$_SESSION['referer_url'] .'">';  
	}
	else
	{
	$refresh      = '<html><meta http-equiv="refresh" content="1; URL='.$domen  .'">';			
	}
}

if($admin)
{
	$img                = $folder_blocks.'admin.png';
	$placeholder_name   = $your_name;
	$value_name         = 'value="'.$your_name.'"';
	$value_email        = 'value="'.$admin_email.'"';
}
else
{
	$img               = $folder_blocks.'hand_no_foto.png';
	$value_name        = 'placeholder="Имя"'; 
	$value_email       = 'placeholder="Email "'; 
 
}
############################################################
$img_user              = $folder_blocks .'user.png';
$img_email             = $folder_blocks .'email.png';
############################################################
$is_bot                = '0'; //Если вы не хотите иметь ограничения на ввод данных в форме админа – ставим 0
############################################################
$bad_word_komment      = array('дурак','козел','ублюдок','чмо','сука','бля','блядь','блять','пиздец','пизда','б.л.я','пидор','мразь','скатина','лох' ); //по умолчанию
$bad_url_komm          = array('http','www','img','php','html','htm','xml');

$file_comments_put     =  $dir_komments .'/store/' . preg_replace('[/]', '_',  $_SERVER["REQUEST_URI"]);
include($dir_komments .'/blocks/translit.php');
$file_get_contents     = @file_get_contents($file_comments_put);
if(!$your_name or !$admin_email) { $vivod = '<br><red>Вам нужно заполнить   $your_name $admin_email в файле config.php</red>';}
?>