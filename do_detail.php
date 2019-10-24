<?php
header("Content-type:text/html;charset=utf-8");
include 'config.php';
$link=mysqli_connect('localhost','root','','show');
@$username = $_POST['username'];
@$articleId = $_POST['articleId'];
@$conment = $_POST['conment'];
$create_time=date("Y-m-d H:i:s");
// echo $username.$articleId.$conment;
$sql="insert into comment(article_id,username,content,create_time) values('$articleId' , '$username','$conment','$create_time')";
$result=mysqli_query($link,$sql);
if($result){
	exit(json_encode(array('status'=>'1','message'=>'评论发表成功')));
}else{
	exit(json_encode(array('status'=>'0','message'=>'评论发表失败')));
}









?>