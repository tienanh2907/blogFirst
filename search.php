<?php 

$key =  $_GET["keyword"];

$arrX = array("Kay", "Joe","Susan", "Frank", "MAC", "WINDOWS","LINUX", "SOLARIS");
$result = [];

if(!empty($key)) {
    foreach($arrX as $value){
        $check = strpos($value, $key);
        if($check){
            $result[] = $value;
        }   
    }
}
?>


<html>
<head>
	<title>Trang tim kiem</title>
	<meta charset="utf-8">
</head>
<body>
	<form method="get" action="/search">
        <fieldset>
            <legend>Tim kiem</legend>
                <table>
                    <tr>
                        <td>Keyword</td>
                        <td><input type="text" name="keyword" size="30" value="<?php echo $_GET["keyword"];?>"></td>

                    </tr>
                
                    <tr>
                        <td colspan="2" align="center"> 
                        <input type="submit" name="btn_submit" value="Đăng nhập"></td>
                    </tr>
                    
                </table>
    </fieldset>
  </form>
  <hr>
  <?php
    if(!empty($result)){
       foreach($result as $r) {
           echo "<p>{$r}</p>";
       }   
    }
  ?>
</body>
</html>



