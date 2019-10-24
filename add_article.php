<?php
header("Content-type:text/html;charset=utf-8");
// 验证用户是否已登录
session_start();
@$user = $_SESSION['username'];
if(!$user){
	echo "<script>alert('客官您是不是忘记登录了,请登录后再发表');</script>";
	echo "<script>window.location.href='./index.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="./js/jquery.min.js"></script>
    <script src="./static/wangEditor/release/wangEditor.min.js"></script>
	<style>
        #canvas{
            animation-name:myani;
			animation-duration:2s;
            /* 圆心位置 */
            transform-origin:100px 100px;
            animation-iteration-count:infinite;
            animation-direction:alternate;
        }
        @keyframes myani{
			0%{	
				transform: rotateZ(0deg);
			}
			100%{	
				transform: rotateZ(360deg);
				
			}
        }
    </style>
    <script>
        window.onload=function(){
        var canvas=document.getElementById('canvas');
        var context=canvas.getContext('2d');
         	context.beginPath();
            context.arc(100,100,100,0,Math.PI*2);
            context.closePath();
            // context.strokeStyle="teal";
            // context.stroke();
            context.fillStyle='white';
            context.fill();
            context.beginPath();
            context.arc(100,150,50,Math.PI*1.5,Math.PI*0.5,true);
            // context.closePath();
            context.fillStyle="coral";
            context.fill();
            context.beginPath();
            context.arc(100,100,100,Math.PI*0.5,Math.PI*1.5,true);
            // context.closePath();
            context.fillStyle="coral";
            context.fill();
            context.beginPath();
            context.arc(100,50,50,Math.PI*1.5,Math.PI*0.5);
            // context.closePath();
            context.fillStyle="white";
            context.fill();

           

            context.beginPath();
            context.arc(100,50,10,0,Math.PI*2);
            context.closePath();
            context.fillStyle='coral';
            context.fill();
            context.beginPath();
            context.arc(100,150,10,0,Math.PI*2);
            context.closePath();
            context.fillStyle='white';
            context.fill();
        }
    </script>
</head>
<body style="background-image:url('./images/bg.png');background-repeat:no-repeat;background-attachment: fixed;background-size:100% 100%;opacity:2;">
<canvas id="canvas" width='400px' height='400px'></canvas>
<div style="position:absolute;top:20%;left:25%;z-index:99999;border:1px solid gray;padding:40px;width:700px;">
	<form action="do_article.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="username" value="<?php echo $_SESSION['username']?>">
                <div>
                    <label for="title" style="font-size:20px;color:white;">标题</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="title" id="title" placeholder="请输入文章标题" style="height:30px;width:200px;" autofocus>
                </div>
                <br>
                <div>
                    <label for="cate_id" style="font-size:20px;color:white;">分类</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="cate_id" id="cate_id" style="height:30px;width:200px;"> <!--name与字段名对应-->
                            <option value="">请选择分类</option>
                            <option value="1">心情客栈</option>
                            <option value="2">学无止境</option>
                    </select>
                </div>
                <br>
                
    
                <div>
                <p style="font-size:20px;color:white;">内容</p>
                <!-- <textarea name="content" id="content" cols="30" rows="10"></textarea>  -->
                <div id="editor" style="background:#cdcdcd;"></div><br>                 
                <input type="hidden" name="content" value="content" id="fwen">
                </div>
                <br>

                <div>
                    <label for="title_img" style="font-size:20px;color:white;">文章图片</label>
                    <!-- <input type="file" name="title_img" id="title_img"> -->
                    <input value="上传图片" type="file" name="img" id="file" >
                    <p class="help-block" ></p>
                </div>
                <br>
                <!-- 这里使用原生的post提交 -->
                <button type="submit" style="background:green;width:100px;height:35px;color:cyan;font-size:18px" onclick="getContent()">保存</button>
	</form>
</div>
<script type="text/javascript">
    // 初始化富文本编辑器
    var ed;
    var fu=document.getElementById('fwen');
    $(function(){
       var rich_editor=window.wangEditor;
       ed=new rich_editor('#editor');
       ed.create();
    });
    // var content=ed.txt.text();
    // fu.value=content;
    // 初始化富文本编辑器 
    // function initEditor(){
    //     var E=window.wangEditor;
    //     var editor=new E('#editor');
    //     editor.create();
    // }
    // initEditor();
    // 获取富文本编辑器得值，并赋值给隐藏域，传给后台
    function getContent(){
        var content=ed.txt.text();
        fu.value=content;
    }
</script>

</body>
</html>
