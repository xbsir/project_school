<?php
header("Content-type:text/html;charset=utf-8");
$host='localhost';
$userName='root';
$passWorld='';
$dbName='show';

$link=mysqli_connect($host,$userName,$passWorld,$dbName);
if(mysqli_connect_errno()){
    die('数据库连接失败！'.mysqli_connect_errno());
}else{
    //echo '<h2>恭喜，数据库连接成功！</h2>';
}

?>