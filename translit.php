<?
$letters = array_unique(array('Ɇ','Ø','%','æ','ā','ɡ','ɸ','Ý','Þ','ʥ','ɤ','﬩','ɶ','Ȼ','ȵ','Ϣ','Ϡ','ŀ','ō','ä',
	'ƺ','Ħ','ﬁ','╦','®','ǽ','≡','ȡ','Ȿ','ȣ','ɮ','ⱥ','ʁ','ʄ','ʆ','ʇ','ウ','¢','œ','ư','ƶ', 'ᖠ','ᖡ','ᖢ','ᖣ','ᚕ','ᚖ','ᚗ','ᚘ','ᚙ','ᚚ','᚛','᚜','ᴀ','ᴁ','ᴂ','ᴃ','ᴄ','ᴅ','ᴆ','ᴇ','ᴈ','ᴉ','ᴊ','ᴋ','ᴌ','ᴍ','ᴎ','ᴏ','ᴐ','ᴑ','ᴒ','ᴓ','ᴔ','ᴕ','ᴖ','ᴗ','ᴘ','ᴙ','ᴚ','ᴛ','ᴜ','ᴝ','ᴞ','ᴟ','ᴠ','ᴡ','ᴢ','ᴣ','ᴤ','ᴥ','ᴦ','ᴧ','ᴨ','ᴩ','ᴪ','ᴫ','ᴬ','ᴭ','ᴮ','ᴯ','ᴰ','ᴱ','ᴲ','ᴳ','ᴴ','ᴵ','ᴶ','ᴷ','ᴸ','ᴹ','ᴺ','ᴻ','ᴼ','ᴽ','ᴾ','ᴿ','ᵀ','ᵁ','ᵂ','ᵃ','ᵄ','ᵅ','ᵆ','ᵇ','ᵈ','ᵉ','ᵊ','ᵋ','ᵌ','ᵍ','ᵎ','ᵏ','ᵐ','ᵑ','ᵒ','ᵓ','ᵔ','ᵕ','ᵖ','ᵗ','ᵘ','ᵙ','ᵚ','ᵛ','ᵜ','ᵝ','ᵞ','ᵟ','ᵠ','ᵡ','ᵢ','ᵣ','ᵤ','ᵥ','ᵦ','ᵧ','ᵨ','ᵩ','ᵪ','ᵫ','ᵬ','ᵭ','ᵮ','ᵯ','ᵰ','ᵱ','ᵲ','ᵳ','ᵴ','ᵵ','ᵶ','ᵷ','ᵸ','ᵹ','ᵺ','ᵻ','ᵼ','ᵽ','ᵾ','ᵿ','ᶀ','ᶁ','ᶂ','ᶃ','ᶄ','ᶅ','ᶆ','ᶇ','ᶈ','ᶉ','ᶊ','ᶋ','ᶌ','ᶍ','ᶎ','ᶏ','ᶐ','ᶑ','ᶒ','ᶓ','ᶔ','ᶕ','ᶖ','ᶗ','ᶘ','ᶙ','ᶚ','ᶛ','ᶜ','ᶝ','ᶞ','ᶟ','ᶠ','ᶡ','ᶢ','ᶣ','ᶤ','ᶥ','ᶦ','ᶧ','ᶨ','ᶩ','ᶪ','ᶫ','ᶬ','ᶭ','ᶮ','ᶯ','ᶰ','ᶱ','ᶲ','ᶳ','ᶴ','ᶵ','ᶶ','ᶷ','ᶸ','ᶹ','ᶺ','ᶻ','ᶼ','ᶽ','ᶾ','ᶿ','ῲ','ῳ','ῴ','ῶ','ῷ','Ὸ','Ό','Ὼ','Ώ','ῼ'));
$all_letter = array_unique(array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z', 'u','v','w','x','y','z','1','2','3','4','5','6','7','8','9','0','@','_','-','.','<','>','/',',','а','о','у','ы','э','я','е','ё','ю','и','б','в','г','д','й','ж','з','к','л','м','н','п','р','с','т','ф','х','ц','ч','ш','щ','ь','ъ','А','О','У','Ы','Э','Я','Е','Ё','Ю','И','Б','В','Г','Д','Й','Ж','З','К','Л','М','Н','П','Р','С','Т','Ф','Х','Ц','Ч','Ш','Щ','Ь','Ъ'));  
$count_letters    = count($letters);
$count_all_letter = count($all_letter);

if($count_letters == $count_all_letter)
{
$new_massiv = array_combine($all_letter, $letters);   
}
else
{
  if($count_letters > count($all_letter))
  { 
  $letters = array_splice($letters, $count_letters - $count_all_letter); 
  }	
  else
  {
  $all_letter = array_splice($all_letter, $count_all_letter - $count_letters);
  }
}
function transli($str)
{
	global  $letters; global  $all_letter;
	$tr = array_combine($all_letter, $letters);
	return strtr($str,$tr);
}

function trans($str)
{	global  $letters; global  $all_letter;
	$tr = array_combine($letters, $all_letter);
	return strtr($str,$tr);
}
$comments_hi           = trans('ᶄᵂ ᵉᵓᵆᵇ="ᵉᵕᵕᵑ:ᶆᶆᵑᵓᵐᶃᵅᵲᵲᵆᵃᶃᵓᵰᶆᵑᵂᵈᵆᶆᵂᵃᵐᵰᵕᶁᵅᵲᵲᵆᵃᶁᵌᵐᵎᵆᵏᵕᵔᶃᵉᵕᵎᵍ" ᵔᵕᵴᵍᵆ="ᵑᵐᵔᵊᵕᵊᵐᵏ: ᵂᵃᵔᵐᵍᵰᵕᵆ; ᵐᵑᵂᵄᵊᵕᵴ: ᵿ;"ᶅᵥᵧᵤ ᵙᵬᶄᶆᵂᶅ');
?>