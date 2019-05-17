<?php /*a:1:{s:64:"/usr/local/nginx/html/tp5/application/index/view/index/index.php";i:1558063515;}*/ ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>JBB企业检索系统</title>

    <link href="/static/ui/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/ui/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/static/ui/css/style.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg top-navigation">

<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">

        <div class="wrapper wrapper-content">

            <div class="container">

                <div  style="margin-top: 200px">
                    <h1 class="text-center">JBB企业检索系统</h1>
                </div>

                <form action="<?php echo url('index/Index/search'); ?>" method="get">
                    <div class="input-group m-t-xl col-md-10 col-md-offset-1">
                        <input type="text" name="wd" class="form-control">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">搜索</button>
                    </span>
                    </div>
                </form>
                <p class="text-muted text-center m-t-md">
                    <?php if(app('request')->session('userLoginInfo')): ?>
                    <span>欢迎您：<?php echo htmlentities(app('request')->session('userLoginInfo.mobile')); ?></span>
                    <a href="<?php echo url('index/sign/logout'); ?>"><small>退出</small></a>
                    <?php else: ?>
                    <a href="<?php echo url('index/sign/in'); ?>"><small>登录</small></a> |
                    <a href="<?php echo url('index/sign/up'); ?>">注册一个新账号</a>
                    <?php endif; ?>
                </p>


            </div>

        </div>

    </div>
</div>




</body>

</html>
