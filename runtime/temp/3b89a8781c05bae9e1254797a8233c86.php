<?php /*a:1:{s:66:"/usr/local/nginx/html/tp5/application/admin/view/company/lists.php";i:1557881838;}*/ ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title></title>
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
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>企业名称</th>
                                <th>电话</th>
                                <th>男女比例</th>
                                <th>企业规模</th>
                                <th>企业类型</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td><?php echo htmlentities($vo['name']); ?></td>
                                <td><?php echo htmlentities($vo['phone']); ?></td>
                                <td>
                                    <?php switch($vo['sex_ratio']): case "0": ?>男多女少<?php break; case "1": ?>男少女多<?php break; case "2": ?>旗鼓相当<?php break; ?>
                                    <?php endswitch; ?>

                                </td>
                                <td>
                                    <?php switch($vo['scale']): case "0": ?>10人以下<?php break; case "1": ?>10-20人<?php break; case "2": ?>21-50人<?php break; case "3": ?>51-100人<?php break; case "4": ?>101-1000人<?php break; case "5": ?>1000人以上<?php break; ?>
                                    <?php endswitch; ?>
                                </td>
                                <td>
                                    <?php switch($vo['sort']): case "0": ?>民营企业<?php break; case "1": ?>国有企业<?php break; case "2": ?>外资企业<?php break; case "3": ?>合资企业<?php break; case "4": ?>其它<?php break; ?>
                                    <?php endswitch; ?>
                                </td>
                                <td>
                                    <a class="del" href="<?php echo url('admin/Company/del', ['id'=>$vo['id']]); ?>">
                                        <i class="fa fa-close text-danger"></i>
                                    </a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="<?php echo url('admin/Company/mod', ['id'=>$vo['id']]); ?>">
                                        <i class="fa fa-edit text-navy"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>

                        <?php echo $list; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="/static/ui/js/jquery.min.js?v=2.1.4"></script>
<script>

    $('.del').click(function () {


        if (!confirm('您确认删除吗？')) {
            return false;
        }

    })


</script>

</html>
