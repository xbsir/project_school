<?php
header("Content-type:text/html;charset=utf-8");
session_start();
include './config.php';
@$username=$_SESSION['username'];
$page=isset($_GET['p'])?$_GET['p']:1;
$_SESSION['page']=$page;
// echo $page;
// if(isset($_SESSION['username'])){
// 	echo '<h1>hello</h1>';
// }//测试用户登录与否，是否有session
// echo '<h1>word</h1>';
// $sql="select * from article";
// $result=mysqli_query($link,$sql);
// echo '<pre>';//格式预处理
// var_dump($result);
// if($result && mysqli_num_rows($result)>0){
// 	// $row=mysqli_fetch_assoc($result);//每一条数据 数组形式
// 	// echo '<pre>';
// 	// print_r($row);
// 	// echo mysqli_num_rows($result);//总共几条数据
// 	while($row=mysqli_fetch_assoc($result)){
// 		// echo '<pre>';
// 		// print_r($row);
// 	}
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>孤独的等待者</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/product.css">
	<link rel="stylesheet" href="css/about.css">
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
			/*background-color: #222222*/
		}

		body::-webkit-scrollbar {
			display: none;
		}
		#banner {
		width:800px;
		height:600px;
		position:relative;
		margin:0 auto;
		margin-top:40px;
		}
		#banner ul li img {
		width:800px;
		height:600px;
		}
		#banner ul li {
		position:absolute;
		list-style: none;
		left:0px;
		top:0px;
		}
		#banner .tagle {
		z-index:99999;
		}
		#banner .tagle #prev {
		position:absolute;
		top:40%;
		left:0;
		
		}
		#banner .tagle #next {
		position:absolute;
		top:40%;
		right:0;
		}
		#banner #num {
		width:500px;
		height:20px;
		position:absolute;
		z-index:999;
		left:30%;
		margin-left:-78px;
		bottom:42px;
		}
		#banner #num span {
		width:20px;
		height:20px;
		text-align: center;
		border-radius:20px;
		border:1px solid #e6ddd0;
		
		margin-left:16px;
		margin-right:16px;
		display:inline-block;
		}
		#banner #num span:hover {
		background:#ffffff;
		cursor:pointer;
		}
		#banner #num span.on {
		border:1px solid #e6ddd0;
		background:#ffffff;
		}
	</style>
	<script src="./js/jquery.min.js"></script>
	<script src="./js/page.js"></script>
	<script src="./js/particle.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<div>
		<div class="denglu">
		<?php if(isset($username)){
			echo "<span><a style='color:gray;'>欢迎  
			$_SESSION[username]</a><span>";
			}?>
		<?php if(!isset($username)){
			echo '<a href="login.html">登录</a>';
			}?>
			<a href="reg.html">注册</a>
			<a href="add_article.php">发表文章</a>
		</div>
	</div>
	<canvas class="canvas" style="width:100%;height:400px;opacity:0.5;"></canvas>
	<div class="xz">
		<!-- 外层最大容器 -->
        <div class="wrap">
            <!--包裹所有元素的容器-->
            <div class="cube">
                <!--前面图片 -->
                <div class="out_front">
                    <img src="images/001.jpg" class="pic">
                </div>
                <!--后面图片 -->
                <div class="out_back">
                    <img src="images/two.jpeg" class="pic">
                </div>
                <!--左面图片 -->
                <div class="out_left">
                    <img src="images/three.jpeg" class="pic">
                </div>
                <!--右面图片 -->
                <div class="out_right">
                    <img src="images/two.jpeg" class="pic">
                </div>
                <!--上面图片 -->
                <div class="out_top">
                    <img src="images/001.jpg" class="pic">
                </div>
                <!--下面图片 -->
                <div class="out_bottom">
                    <img src="images/three.jpeg" class="pic">
                </div>

                <!--小正方体 -->
                <span class="in_front">
                    <img src="images/001.jpg" class="in_pic">
                </span>
                <span class="in_back">
                    <img src="images/002.jpg" class="in_pic">
                </span>
                <span class="in_left">
                    <img src="images/003.jpg" class="in_pic">
                </span>
                <span class="in_right">
                    <img src="images/004.jpg" class="in_pic">
                </span>
                <span class="in_top">
                    <img src="images/005.jpg" class="in_pic">
                </span>
                <span class="in_bottom">
                    <img src="images/006.jpg" class="in_pic">
                </span>
            </div>
        </div>
	</div>
	<div class="music">
	        <img src="images/music-player.png" alt="图片加载错误" style="height:35px;">
		    <a href="music.html">游戏&音乐</a>
	</div>

	<div class="logo">
			<span id="fcolor">西伯利亚狼</span>
			<!-- <span class="logo1">luokaixing</span> -->
			<br>
			<span><a href="./js03.html" style="text-decoration:none;font-size:30px;">想看更炫酷动画？点击我
			</a></span>
	</div>

	<div class="c-body">
		
			<div class="moban1">
				<ul>
					<li class="moban">首页</li>
					<li class="moban">关于我</li>
					<li class="moban">作品展示</li>
					<li class="moban">心情客栈</li>
					<li class="moban">学无止境</li>
				</ul>
			</div>
			<div class="content">
				
			</div>	
	</div>
	<div class="fixed">
		<div class="fixed-side"  id="juanz"><span style="position:relative;top:40px;right:0px">捐赠</span></div>
		<div class="fixed-side"><span style="position:relative;top:40px;right:0px" id="lianxi">联系</span></div>
	</div>
	<div class="juanp">
		<div id="juanp1"><span style="float:right;color:red;margin-right:10px;">X</span></div>
		<img src="./images/002.jpg" alt="" style="width:80px;height:80px;border-radius:10px;margin-left:10px;">
	</div>
	<div class="lianxip">
		<div id="lianxip1"><span style="float:right;color:red;margin-right:10px;">X</span></div>
		<img src="./images/my.jpg" alt="" style="width:80px;height:80px;border-radius:10px;margin-left:10px;">
	</div>
	<div>
		<canvas id="mycanvas" class="mylo"></canvas>
	</div>
	<div class="foot">
	<br>
			<p style="color:#65c294;">本网站版权归<span style="color:#cde6c7;">罗开星</span>所有&nbsp;&nbsp;&nbsp;<span><img src="./images/police.png" alt=""  style="width:25px;height:20px;">京ICP备案XXXXXXXX1号</span></p>
			<p style="color:#65c294;">如未经本人允许，盗用本站资源商业化<span>将承担相应法律责任</span></p>
	</div>
</body>
</html>
<!-- 控制联系捐赠图片显示隐藏 -->
<script>
	$(function(){
		//console.log(11);
		$('#juanz').click(function(){
			$('.juanp').css('display','block');
		});
		$('#juanp1').click(function(){
			$('.juanp').css('display','none');
		});
		$('#lianxi').click(function(){
			$('.lianxip').css('display','block');
		});
		$('#lianxip1').click(function(){
			$('.lianxip').css('display','none');
		});
	});
</script>
<script type="text/javascript">
var c = new Cbg({
	container: ".canvas",
	//随机生成动画，默认无控制
	control: "auto",
	//鼠标跟随控制
	//control: "mouse",
	//坐标点定位控制
	//control: "coordinate",
	//设置坐标点，默认屏幕中心，坐标点定位控制时使用
	//x: $(window).width() / 2,
	//y: $(window).height() / 2
	//Canvas宽度高度自定义,默认全屏
	width: $(window).width(),
	height: $(window).height(),
	//生成点尺寸设置
	//size: [初始大小, 尺寸衰减速率（数值越大，尺寸缩减越快，反之越慢，最小不得小于0.01）],
	size: [10, 0.2],
	//生成点的类型，type
	//type：color 生成点为颜色块
	type: "color",
	//生成点颜色列表，随机刷新颜色
	color: ["#6525EE", "#007AFF", "orange", "orangered","green"],
	//生成点颜色单值，固定颜色刷新
	//color: "red",

	//type：img 生成点为图片，图片比例1：1
	//type: "img",
	//生成点图片列表，随机刷新图片
	//imgUrl: ["图片路径", "图片路径"，....],
	//生成点图片单值，固定图片刷新
	//imgUrl: "图片路径",
	//动画类型：
	//animation_type: 0（默认动画，随机方位，随机方向）
	//animation_type: 1（向左运动）
	//animation_type: 2（向右运动）
	//animation_type: 3（向下运动）
	//animation_type: 4（向上运动）
	animation_type: 0,
	//生成点生成速率，数值越大，点的生成越慢
	speed: 10,
})
</script>
<!-- 字体变色 -->
<script>
	//var span=document.getElementById('#fcolor');
	var array = ['#8e453f', '#8f4b4a', '#78331e','#b4533c','#ba8448','#c7a252','white'], index = -1;
            onload=function(){
                setInterval(function(){
                    index++;
                    index = index > array.length - 1 ? 0 : index;
                    fcolor.style.color = array[index];
                }, 2000);
            }
</script>
<!-- luokaixing字符画板操作 -->
<script>
		var canvas=document.getElementById('mycanvas');
            var context=canvas.getContext('2d');
			context.font='30px sans-serif';
            context.strokeText('LuoKaiXing',100,100);
</script>
