<?php /*a:1:{s:65:"/usr/local/nginx/html/tp5/application/index/view/index/search.php";i:1557825831;}*/ ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>"<?php echo htmlentities($keyword); ?>"的搜索结果</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="/static/ui/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/ui/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/static/ui/css/animate.css" rel="stylesheet">
    <link href="/static/ui/css/style.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="search-form">
                        <form action="<?php echo url('index/Index/search'); ?>" method="get">
                            <div class="input-group">
                                <input type="text" value="<?php echo htmlentities($keyword); ?>" placeholder="" name="wd" class="form-control input-lg">
                                <div class="input-group-btn">
                                    <button class="btn btn-lg btn-primary" type="submit">
                                        搜索
                                    </button>
                                </div>
                            </div>
                            <small>
                                <span>为您找到相关结果约<?php echo htmlentities($num); ?>个</span>
                                <span><a href="<?php echo url('index/Index/add'); ?>">未找到，创建它?</a></span>
                            </small>

                        </form>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <?php if(is_array($newList) || $newList instanceof \think\Collection || $newList instanceof \think\Paginator): $i = 0; $__LIST__ = $newList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="search-result">
                        <h3><a href="<?php echo url('index/Index/show', ['id'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a></h3>
                        <a href="<?php echo url('index/Index/show', ['id'=>$vo['id']]); ?>" class="search-link"><?php echo url('index/Index/show', ['id'=>$vo['id']], true, true); ?></a>
                        <p>
                            <?php echo htmlentities($vo['introduce']); ?>
                        </p>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                    <div class="text-center">
                        <div class="btn-group">
                            <?php echo $list; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
