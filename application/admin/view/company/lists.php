
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
                            {volist name="list" id="vo"}
                            <tr>
                                <td>{$vo.name}</td>
                                <td>{$vo.phone}</td>
                                <td>
                                    {switch $vo.sex_ratio}
                                    {case 0}男多女少{/case}
                                    {case 1}男少女多{/case}
                                    {case 2}旗鼓相当{/case}
                                    {/switch}

                                </td>
                                <td>
                                    {switch $vo.scale}
                                    {case 0}10人以下{/case}
                                    {case 1}10-20人{/case}
                                    {case 2}21-50人{/case}
                                    {case 3}51-100人{/case}
                                    {case 4}101-1000人{/case}
                                    {case 5}1000人以上{/case}
                                    {/switch}
                                </td>
                                <td>
                                    {switch $vo.sort}
                                    {case 0}民营企业{/case}
                                    {case 1}国有企业{/case}
                                    {case 2}外资企业{/case}
                                    {case 3}合资企业{/case}
                                    {case 4}其它{/case}
                                    {/switch}
                                </td>
                                <td>
                                    <a class="del" href="{:url('admin/Company/del', ['id'=>$vo['id']])}">
                                        <i class="fa fa-close text-danger"></i>
                                    </a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{:url('admin/Company/mod', ['id'=>$vo['id']])}">
                                        <i class="fa fa-edit text-navy"></i>
                                    </a>
                                </td>
                            </tr>
                            {/volist}
                            </tbody>
                        </table>

                        {$list|raw}
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
