<?php /*a:1:{s:61:"/usr/local/nginx/html/tp5/application/test/view/test/yzm2.php";i:1558073158;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>










<form action="" method="post" enctype="multipart/form-data">

    <input type="text" name="xxx">
    <div><?php echo captcha_img(); ?></div>
<!--        <img src="<?php echo url('test/test/yzm'); ?>" alt="">-->
    <input type="file" name="yyy">

    <button>提交</button>

</form>

</body>
</html>