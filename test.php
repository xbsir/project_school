<?php
include './config.php';
$sql="SELECT * FROM article";
$result=mysqli_query($link,$sql);
if($result && mysqli_num_rows($result)>0){
    echo '<h2 align="center">article各项数据数据表</h2>';
    echo '<h3 align="center">共有'.mysqli_num_rows($result).'条数据</h3>';
    $row=mysqli_fetch_assoc($result);
    echo  'ID是：'.$row['id'].'<br>';
    echo  '标题是：'.$row['title'].'<br>';
    echo  '图片地址：'.$row['title_img'].'<br>';
    echo  '分类id：'.$row['cate_id'].'<br>';
    echo  '用户id：'.$row['user_id'].'<br>';
    echo  '文章内容：'.$row['content'].'<br>';
    echo  '文章浏览量：'.$row['pv'].'<br>';
    echo  '文章是否热门：'.$row['is_hot'].'<br>';
    echo  '创建时间：'.$row['create_time'].'<br>';
    echo  '更新时间：'.$row['update_time'].'<br>';
    echo 'nothing';
}else{
    echo '<h2>没有任何数据返回</h2>';
}


?>