<?session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="./donotignore.css">
  <title>누가도와달래 로그인</title>

</head>
<body>
<center>
  <h2>누가도와달래 로그인</h2>
 
  <hr />
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <!-- <label for="name">이름:</label>
    <input type="text" id="name" name="name" value="<?php if (!empty($name)) echo $name; ?>" /><br />
	-->
	<p>아디: <input type="text"class="namecan" name="id" placeholder="전체주소 또는 아이디"> </p>
	 <p>비번: <input type="password"class="namecan" name="pw" placeholder="비밀번호"> </p>
  <div>  &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp<button class="login1_btn" name="login" type="submit">로그인</button></div>



   </form>
	<p></p>

<?php

if (isset($_POST['login'])) {
	
   $id = $_POST['id'];
   
   $pw = $_POST['pw'];
   
   
 
   

 if($id != ""){ // post로 날라온 변수중에 id가 공백이 아닐경우

require_once ('dbconn.php'); // DB에 연결해주고
mysqli_query($conn,"SET NAMES utf8");
$query = sprintf("SELECT * FROM userinfo where id = '%s' and pw = '%s'",mysqli_real_escape_string($dbc,$id),mysqli_real_escape_string($dbc,$pw)); // id와 pass가 일치하는 사항을

$rst = mysqli_query($dbc,$query) ; // 검색해본뒤

$row = mysqli_fetch_array($rst); // 배열에 집어넣고

if($row){ // 배열의 해당값이 1일경우 (로그인 됫을경우)
  session_start();

$_SESSION["id"] = $id; // 세션 id라는 변수에 post id라는 변수를 담고
$_SESSION["pw"] = $pw;
$_SESSION["name"] =$row['name'];
$namess=$row['name'];

?>

<script type="text/javascript">
<script>/* 로그인후 페이지로 이동한다. (세션이 생긴다.) */

string iconv ( string $in_charset , string $out_charset , string $str )
</script>

<?php
//$text = '로그인성공';
//$f = fopen('./test2_dutsfs8.txt' , 'a' ) ;
// fwrite($f, iconv( 'UTF-8' ,'euc-kr//IGNORE' ,$text) );
 //fclose( $f ) ;

 echo ("<script> alert('로그인 성공'); </script>");

echo "<script>location.href='../';</script>";
?>




<?php

}else{ // 없는 값일 경우 (로그인 실패)

?>

<script>/* 실패 메세지와 뒤로 간다 */

alert("아이디 혹은 비밀번호가 틀렸거나 없는 아이디입니다.");

history.go(-1);

</script>

<?php

}
 }
}

?>
</center>
</body>
</html>