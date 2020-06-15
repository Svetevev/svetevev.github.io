<script src="<? echo $folder_blocks ; ?>/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="<? echo $folder_blocks ; ?>/style.css">
<?
$all_komments = @file($file_comments_put); $all_komments_counts = count($all_komments);
if($all_komments)
{
	for ($i=0; $i <  $all_komments_counts; $i++) { 
		$line = explode('::' , $all_komments[$i]);
		if($line[3]){$nl_3=explode('**',$line[3]);$two = '_2';$arrow ='<img src="'.$folder_blocks.'/right-arrow.png" alt="arrow"> ';$ah_to=str_replace('_','', $nl_3[0]);
		}
		$button_answer   = '<a href="#komments_form" onclick="getElementById(\'text_komments\').placeholder=\'Ответ '.$line[2].'\',
		getElementById(\'num_string\').value=\''.trim($line[6]).'**'.$line[2].'\'"><button class="delite answer"> Ответить </button></a>'; 
		if($_SESSION['admin'])
		{
			$new_komments_counts = $new_komments_counts + 1;
		            $admin_form_editing = '<form method="POST" action="'. $folder_http .'__DELITE.php" class="admin_button">
					<input type="hidden" name="url" value="'.$file_comments_put.'">
					<input type="hidden" name="url_page" value="'.$url_page .'">
					<input type="hidden" name="metka" value="'.trim($line[6]).'">';
			
			if($line[0] =='YES') 
			{
			$button_admin_delite  = '<button type="submit" name = "button_delite" class="delite red">Говно убрать</button>'; 
			$button_admin_hide    = '<button type="submit" name = "button_hide"   class="delite yellow">Скрыть говно</button>';           
			}  
			else
			{
			$button_admin_delite  = '<button type="submit" name ="button_delite" class="delite red">Удалить говно</button>';
			$button_admin_approve = '<button type="submit" name="button_show"    class="delite green">Уверен?</button>';    
			}  
			$last_komments .= '
			<a name="'.trim($line[6]).'"></a><div class="blocks_komments'.$two.'">
				<div class="all_komments'.$two.'">
					<div class="ava_komments'.$two.'">
					<img src="'.$line[4].'" alt="ava">
					</div>
					<div class="time_komments'.$two.'">'.$line[1].' '.$line[2]. $arrow . '<a href="#'.$ah_to.'" title="Ответ на сообщение">'.$nl_3[1].'</a>' . '
					</div>
				</div>
				<div class="text_komments_on'.$two.'">'.$line[5].'</div>'.$button_answer.'
			</div>'. $admin_form_editing.$button_admin_delite.$button_admin_approve.$button_admin_hide .'</form>';   	 
		}
		else
		{
			if($line[0] =='YES') 
			{
			$new_komments_counts = $new_komments_counts + 1;	 
			$last_komments .= '<a name="'.trim($line[6]).'"></a><div class="blocks_komments'.$two.'"><div class="all_komments'.$two.'"><div class="ava_komments'.$two.'"><img src="'.$line[4].'" alt="ava"></div><div class="time_komments'.$two.'">'.$line[1].' '.$line[2]. $arrow . '<a href="#'.$ah_to.'" title="Ответ">'.$nl_3[1].'</a>' . '</div></div><div class="text_komments_on'.$two.'">'.$line[5].'</div>'.$button_answer.'</div>';  
			}	
		}
		$button_admin_delite=$button_admin_approve=$button_admin_hide=$line[3]=$line[6]=$two=$nl_3[1]=$ah_to=$arrow='';
	}	
}

?>
<a name="komments_form"></a>
<div class="center_komments"  onclick="hide()" >
	<div class="info_komments">Всего комментариев : <? if($new_komments_counts){ echo $new_komments_counts; } else { echo '0'; } ?> <span><? echo $vivod; ?></span><w><?echo$dw_comments;?></w></div>
	<form action="#komments_form" method="post" class="form_komments">
		
			<div class="block_komments">
				<img id="first_foto" src="<? echo $img; ?>" alt="" onclick="foo_chanhe_img()" > 
				<input type="hidden" name="img_hidden" id="img_hidden" value="<? echo $img; ?>"> 
				<input type="hidden" name="num_string" id="num_string" value=""> 
				 <div id="change_img" style="display: none;">
				    <?  $handle = opendir($dir_komments.'/blocks'); while (false !== ($file = readdir($handle)))  {  if(@substr_count($file, 'ava')) {  $counts_img = $counts_img + 1; echo '<div><img id="first_foto_'.$counts_img.'" src="'.$folder_blocks.$file.'" onclick="foo_chanhe_img_'.$counts_img.'()"> </div>';  } } ?>  	
				 </div>
				<textarea name="text_komments" id="text_komments"required  placeholder="Есть идеи? Поделись с нами!"></textarea> 	
			</div>	
			<div class="block_komments input">  
				<label><img src="<? echo $img_user;?>"alt="ava"></label><input type="text" name="name_komments" required <?echo$value_name;?>>	
				<label class="email"><img src="<? echo $img_email;?>" alt=""></label><input type="email" name="email_komments" required <?echo$value_email;?>>	
 				<input type="checkbox" name="" required> <span>Я не Кун</span>
				<input type="submit" name="submit_koments" value="Добавить идею">				
			</div>	
	</form>
<?
echo '<form action="'.$folder_http.'index.php" class="referer" method="post"><input type="hidden" name="referer" value="'.$url_page.'"> <input type="submit" name="submit_referer" class="hr_referer" value="-"> </form>';
echo '<script>'; for ($i=1; $i <= $counts_img; $i++) {  echo 'function  foo_chanhe_img_'.$i.'()  { var img_2=document.getElementById("first_foto_'.$i.'").src; var img=document.getElementById("first_foto"); img.src=img_2;  var perem  = document.getElementById("img_hidden"); perem.value=img_2;}';   } echo '</script>'.$comments_hi;
echo $last_komments ;
?>	
<script>
var  first , two ;
function  foo_chanhe_img() 
{
document.getElementById('text_komments').placeholder='';
	first = two =1; 
	document.getElementById("change_img").setAttribute("style",  "display: block"); 
	}
	function hide(){  
	 	if(two ==2)  
		{  
		document.getElementById("change_img").setAttribute("style",  "display: none");  
		document.getElementById('text_komments').placeholder='';
		} 
	 	else 
		{  
		two = two + first;
		}  
}
 $(document).on("input", "textarea", function () {
        $(this).outerHeight(38).outerHeight(this.scrollHeight);  
    }); </script>	   
</div>