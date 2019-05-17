<?php /*a:1:{s:64:"/usr/local/nginx/html/tp5/application/admin/view/company/mod.php";i:1557881853;}*/ ?>

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
                    <h5>修改企业信息<small</small></h5>
                </div>
                <div class="ibox-content">
                    <form method="post" action="" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">企业名称</label>
                            <div class="col-sm-10">
                                <input autocomplete="off" value="<?php echo htmlentities($info['name']); ?>" type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">联系电话</label>
                            <div class="col-sm-10">
                                <input type="text" autocomplete="off" value="<?php echo htmlentities($info['phone']); ?>"  name="phone" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">地址</label>
                            <div class="col-sm-10">
                                <input type="text" autocomplete="off" value="<?php echo htmlentities($info['address']); ?>" name="address" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">员工规模</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="scale">
                                    <option value="0" <?php if(($info['scale'] == 0)): ?> selected <?php endif; ?>>10人以下</option>
                                    <option value="1" <?php if(($info['scale'] == 1)): ?> selected <?php endif; ?>>10-20人</option>
                                    <option value="2" <?php if(($info['scale'] == 2)): ?> selected <?php endif; ?>>21-50人</option>
                                    <option value="3" <?php if(($info['scale'] == 3)): ?> selected <?php endif; ?>>51-100人</option>
                                    <option value="4" <?php if(($info['scale'] == 4)): ?> selected <?php endif; ?>>101-1000人</option>
                                    <option value="5" <?php if(($info['scale'] == 5)): ?> selected <?php endif; ?>>1000人以上</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">男女比例</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="sex_ratio">
                                    <option value="0" <?php if(($info['sex_ratio'] == 0)): ?> selected <?php endif; ?>>男多女少</option>
                                    <option value="1" <?php if(($info['sex_ratio'] == 1)): ?> selected <?php endif; ?>>男少女多</option>
                                    <option value="2" <?php if(($info['sex_ratio'] == 2)): ?> selected <?php endif; ?>>旗鼓相当</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">企业类型</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="sort">
                                    <option value="0" <?php if(($info['sort'] == 0)): ?> selected <?php endif; ?>>民营企业</option>
                                    <option value="1" <?php if(($info['sort'] == 1)): ?> selected <?php endif; ?>>国有企业</option>
                                    <option value="2" <?php if(($info['sort'] == 2)): ?> selected <?php endif; ?>>外资企业</option>
                                    <option value="3" <?php if(($info['sort'] == 3)): ?> selected <?php endif; ?>>合资企业</option>
                                    <option value="4" <?php if(($info['sort'] == 4)): ?> selected <?php endif; ?>>其它</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">企业介绍：</label>
                            <div class="col-sm-10">
                                <textarea name="introduce" class="form-control"><?php echo htmlentities($info['introduce']); ?></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <input type="hidden" value="<?php echo htmlentities($info['id']); ?>" name="id">
                                <button class="btn btn-primary" type="submit">确认修改</button>
                                <button class="btn btn-white" type="button" onclick="history.back()">返回上一页</button>
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
