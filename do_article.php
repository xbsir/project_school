<?php
include './config.php';
session_start();
$username=$_POST['username'];
$title=$_POST['title'];
$content=$_POST['content'];
$cate_id=$_POST['cate_id'];
// $time=time();
// $create_time=date(format:"Y-m-d H:i:s",$time);
// date_default_timezone_set(timezone_identifier,'Asia/Shanghai');//时区设置
$create_time=date("Y-m-d H:i:s");
if($title==""){
    echo "<script>alert('文章标题不能为空');window.location.href='add_article.php';</script>";
    return false;
}
if($cate_id==""){
    echo "<script>alert('文章分类不能为空');window.location.href='add_article.php';</script>";
    return false;
}
if($content==""){
    echo "<script>alert('文章内容不能为空');window.location.href='add_article.php';</script>";
    return false;
}
//图片处理
if ($_FILES["img"]["error"] > 0) {
        switch ($_FILES["img"]["error"]) {
            case 1 :
                echo "<script type='text/javascript'>alert('上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值<br>');history.back();</script>";
                break;
            case 2 :
                echo "<script type='text/javascript'>alert('上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值');history.back();</script>";
                break;
            case 3 :
                echo "<script type='text/javascript'>alert('文件只有部分被上传');history.back();</script>";
                break;
            case 4 :
                echo "<script type='text/javascript'>alert('没有文件被上传');history.back();</script>";
                break;
            default :
                echo "<script type='text/javascript'>alert('末知错误');history.back();</script>";
        }
        exit;
    }
    $maxsize = 50000000000;
    //step 2 使用$_FILES["pic"]["size"] 限制大小 单位字节 2M=2000000
    if ($_FILES["img"]["size"] > $maxsize) {
        echo "<script type='text/javascript'>alert('上传的文件太大，不能超过{$maxsize}字节');history.back();</script>";
        exit;
    }
    //step 3 使用$_FILES["pic"]["type"]或是文件的扩展名 限制类型 MIME image/gif image/png  gif png jpg
    $allowtype = array("png", "gif", "jpg", "jpeg");
    $arr = explode(".", $_FILES["img"]["name"]);
    $hz = $arr[count($arr) - 1];
    if (!in_array($hz, $allowtype)) {
        echo "<script type='text/javascript'>alert('这是不允许的类型');history.back();</script>";
        exit;
    }
    //step 4 将让传后的文件名改名
    $filepath = "./static/uploads/";
    //为了符合UBB的路径
    $randname = date("Y") . date("m") . date("d") . date("H") . date("i") . date("s") . rand(100, 999) . "." . $hz;
    //将临时位置的文件移动到指定的目录上即可
    if (is_uploaded_file($_FILES["img"]["tmp_name"])) {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $filepath . $randname)) {
            // echo "<script type='text/javascript'>alert('图片上传成功');</script>";
            // $_SESSION['images'] = $filepath . $randname;
            $title_img=$filepath . $randname;
            // echo $_SESSION['images'];
        } else {
            echo "<script type='text/javascript'>alert('上传失败');history.back();</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('不是一个上传文件');history.back();</script>";
    }



if($title_img==""){
	echo "<script>alert('文章图片不能为空');window.location.href='add_article.php';</script>";
    return false;
}

// echo $usre_id.$title.$cate_id.$content.$create_time;
if($title&&$content&&$cate_id&&$title_img){
$sql="insert into article(title,content,cate_id,username,title_img,create_time) Values('$title','$content','$cate_id','$username','$title_img','$create_time')";
$result=mysqli_query($link,$sql);
 //插入数据库
 if(!$result){
 echo "<script>alert('数据插入失败');window.location.href='add_article.php';</script>";
 return false;
 }else{
 echo "<script>window.location.href='index.php';</script>";
 return false;
 }
}

?>