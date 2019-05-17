<?php /*a:1:{s:62:"/usr/local/nginx/html/tp5/application/index/view/index/add.php";i:1557544332;}*/ ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>添加企业信息</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/static/ui/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/ui/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/static/ui/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/static/ui/css/style.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="container wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>添加一个企业<small</small></h5>
                </div>
                <div class="ibox-content">
                    <form method="post" action="" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">企业名称</label>
                            <div class="col-sm-10">
                                <input autocomplete="off" type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">联系电话</label>
                            <div class="col-sm-10">
                                <input type="text" autocomplete="off" name="phone" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">地址</label>
                            <div class="col-sm-10">
                                <input type="text" autocomplete="off" name="address" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">员工规模</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="scale">
                                    <option value="0">10人以下</option>
                                    <option value="1">10-20人</option>
                                    <option value="2">21-50人</option>
                                    <option value="3">51-100人</option>
                                    <option value="4">101-1000人</option>
                                    <option value="5">1000人以上</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">男女比例</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="sex_ratio">
                                    <option value="0">男多女少</option>
                                    <option value="1">男少女多</option>
                                    <option value="2">旗鼓相当</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">企业类型</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="sort">
                                    <option value="0">民营企业</option>
                                    <option value="1">国有企业</option>
                                    <option value="2">外资企业</option>
                                    <option value="3">合资企业</option>
                                    <option value="4">其它</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">企业介绍：</label>
                            <div class="col-sm-10">
                                <textarea name="introduce" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">确认添加

                                </button>
                                <button class="btn btn-white" type="reset">
                                    <a href="<?php echo url('index'); ?>">取消</a>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- 全局js -->
<script src="/static/ui/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/ui/js/bootstrap.min.js?v=3.3.6"></script>



</body>

</html>
