<? session_start ();  ?>
<html>
<head>
<title>Выход</title>
<meta http-equiv='Refresh' content='3; URL=index.php'>
<meta charset="utf-8">
	<style>  {
    background: url(back.png);
        -moz-background-size: 100% auto; 
    -webkit-background-size: 100% auto;
    -o-background-size: 100% auto; 
    background-size: 100% auto; 
}</style>
<body>
<?
if(!$_SESSION['admin'])
{
	echo '';
}
else
{
	session_destroy ();
	echo 'Вы вышли';
}
?>
</body>
</html>