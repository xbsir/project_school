<?php
header("Content-type:text/html;charset=utf-8");
include 'config.php';
session_start();
@$username=$_SESSION["username"];
if(!$username){
	echo "<script>alert('客官您是不是忘记登录了,请登录后再查看文章详情');</script>";
	echo "<script>window.location.href='./index.php';</script>";
}
$link=mysqli_connect('localhost','root','','show');
$articleId=$_GET["articleId"];
// echo $articleId;
$sql3="update article set pv=pv+1 where id='$articleId'";
mysqli_query($link,$sql3);
$sql="select * from article where id='$articleId'";
$result=mysqli_query($link,$sql);
// echo '<pre>';
// var_dump($result);
if($result){
	// echo 'success';//查寻结果
    $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
 //    echo '<pre>';
	// var_dump($rows);
	foreach($rows as $row){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="./css/detail.css">
	<script src="./js/jquery.min.js"></script>
</head>
<body>
	<?php 
	if($row["cate_id"]==1){
		echo  '<h1>心情客栈</h1>';
	}else{
		echo  '<h1>学无止境</h1>';
	}
	echo '<hr>';?>
	<div class="main">
	<?php
	echo '<h2 style="margin-left:100px;">标题：'.$row["title"].'</h2><br>';
	echo '<span style="margin-left:20px;">作者：'.$row["username"].'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<sapn>阅读量：'.$row["pv"].'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo '<span>时间：'.$row["create_time"].'</span><br><br>';
	echo '<div>'.htmlspecialchars_decode($row["content"]).'</div>';
	echo '<h2 style="margin-top:200px;">发表评论</h2>';
	echo '<form id="comment">';
	echo '<input type="hidden" name="articleId" value="'.$articleId.'">';
	echo '<input type="hidden" name="username" value="'.$username.'">';
	echo '<textarea name="content" id="content" cols="50" rows="6"></textarea><br>';
	echo '<button type="button" id="submit" style="width:100px;height:35px;background:green;">提交</button>';
	echo '</form>';
	?>

	</div>
<script>
    $('#submit').on('click',function (){
		var conment = $.trim($('#content').val());
		var articleId=$.trim($('input[name="articleId"]').val());
		var username=$.trim($('input[name="username"]').val());
		// console.log(conment,articleId,username);
        if(!conment){
        	alert('评论内容不能为空');
        	// history.go();
        	return;
        }
        $.post('./do_detail.php',{conment:conment,articleId:articleId,username:username},function(res){
			if(res.status==1){
				// $('#res').text('luokaixing');
				// console.log({res.message});
				// alert(res.message);
				window.location.reload();
			}else{
				alert(res.message);
			}
		},'json');
    })
</script>
</body>
</html>
		
<?php
	}
}
?>
<?php
	$sql2="select * from comment where article_id='$articleId' order by id desc limit 10";
	$result2=mysqli_query($link,$sql2);
	if($result2){
		$rows2=mysqli_fetch_all($result2,MYSQLI_ASSOC);
		foreach($rows2 as $row){
			echo '<div style="margin-left:35%;margin-right:30%;margin-top:50px;">';
		    echo '<p>'.$row['username'].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['create_time'].'</p>';
		    echo '<div style="min-height:50px;">'.$row['content'].'</div>';
		    echo '<hr>';
		    echo '</div>';
		}
	}
	
	?>