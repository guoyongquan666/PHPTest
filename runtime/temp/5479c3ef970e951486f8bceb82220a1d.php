<?php /*a:1:{s:63:"/usr/local/nginx/html/tp5/application/index/view/index/show.php";i:1558063444;}*/ ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>企业详情</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link href="/static/ui/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/ui/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="/static/ui/css/animate.css" rel="stylesheet">
    <link href="/static/ui/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/static/library/um/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
</head>

<body class="gray-bg">
<div class="row">
    <div class="">
        <div class="wrapper wrapper-content animated fadeInUp">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="m-b-md">
                                <h2><?php echo htmlentities($info['name']); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <dl class="dl-horizontal">

                                <dt>联系电话：</dt>
                                <dd><?php echo htmlentities($info['phone']); ?></dd>
                                <dt>企业类型：</dt>
                                <dd>
                                    <?php switch($info['sort']): case "0": ?>民营企业<?php break; case "1": ?>国有企业<?php break; case "2": ?>外资企业<?php break; case "3": ?>合资企业<?php break; case "4": ?>其它<?php break; ?>
                                    <?php endswitch; ?>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-sm-7" id="cluster_info">
                            <dl class="dl-horizontal">
                                <dt>员工人员：</dt>
                                <dd>
                                    <?php switch($info['scale']): case "0": ?>10人以下<?php break; case "1": ?>10-20人<?php break; case "2": ?>21-50人<?php break; case "3": ?>51-100人<?php break; case "4": ?>101-1000人<?php break; case "5": ?>1000人以上<?php break; ?>
                                    <?php endswitch; ?>
                                </dd>
                                <dt>男女比例：</dt>
                                <dd>
                                    <?php switch($info['sex_ratio']): case "0": ?>男多女少<?php break; case "1": ?>男少女多<?php break; case "2": ?>旗鼓相当<?php break; ?>
                                    <?php endswitch; ?>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <dl class="dl-horizontal">
                                <dt>地址：</dt>
                                <dd>
                                    <?php echo htmlentities($info['address']); ?>
                                </dd>

                                <dt>企业介绍：</dt>
                                <dd>
                                    <?php echo htmlentities($info['introduce']); ?>
                                </dd>
                            </dl>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <dl class="dl-horizontal">
                                <dt>企业标签：</dt>
                                <dd>
                                    <?php foreach($tagList as $key=>$vo): ?>
                                    <a class="label label-default" href=""><i class="fa fa-tag"></i> <?php echo htmlentities($vo['name']); ?></a>
                                    <?php endforeach; ?>
                                    <button type="button" class="btn-primary add-tag btn btn-xs">添加标签</button>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row m-t-sm">
                        <div class="col-sm-12">
                            <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li>
                                                <a href="project_detail.html#tab-1" data-toggle="tab">热门评论</a>
                                            </li>
                                            <li class="">
                                                <a href="project_detail.html#tab-2" data-toggle="tab">公司领导</a>
                                            </li>

                                            <li class="">
                                                <a href="project_detail.html#tab-3" data-toggle="tab">公司职位</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="feed-activity-list">
                                                <?php foreach($interview_list as $key=>$vo): ?>
                                                <div class="feed-element">
                                                    <a href="profile.html#" class="pull-left">
                                                        <?php if(($vo['author']['avatar'])): ?>
                                                        <img alt="image" class="img-circle" src="/static/<?php echo htmlentities($vo['author']['avatar']); ?>">
                                                        <?php else: ?>
                                                        <img alt="image" class="img-circle" src="/static/image/avatar.jpg">
                                                        <?php endif; ?>
                                                    </a>
                                                    <div class="media-body ">
                                                        <div class="m-b-sm"><?php echo $vo['content']; ?></div>
                                                        <small class="text-muted"><?php echo htmlentities($vo['create_time']); ?> 来自 <span><?php echo htmlentities($vo['author']['nickname']); ?></span></small>
                                                        <div class="actions">
                                                            <a data-id="<?php echo htmlentities($vo['id']); ?>" class="btn btn-xs ding <?php if(($vo['dingx'])): ?> btn-warning <?php else: ?> btn-white <?php endif; ?>"><i class="fa fa-thumbs-up"></i> 赞 </a>
                                                            <span><?php echo htmlentities($vo['ding']); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>

                                                <?php echo $page; ?>
                                            </div>

                                            <form action="<?php echo url('index/Index/add_interview'); ?>" method="post">
                                                <div class="form-group">
                                                    <div>
                                                        <textarea rows="16" name="content" style="height: 200px;" id="editor1" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <input type="hidden" name="id" value="<?php echo htmlentities($info['id']); ?>">
                                                        <button class="btn btn-primary btn-xs" type="submit">确认添加</button>
                                                    </div>
                                                </div>
                                            </form>


                                        </div>
                                        <div class="tab-pane" id="tab-2">

                                            <!--                                            <table class="table table-striped">-->
                                            <!--                                                <thead>-->
                                            <!--                                                <tr>-->
                                            <!--                                                    <th>状态</th>-->
                                            <!--                                                    <th>标题</th>-->
                                            <!--                                                    <th>开始时间</th>-->
                                            <!--                                                    <th>结束时间</th>-->
                                            <!--                                                    <th>说明</th>-->
                                            <!--                                                </tr>-->
                                            <!--                                                </thead>-->
                                            <!--                                                <tbody>-->
                                            <!--                                                <tr>-->
                                            <!--                                                    <td>-->
                                            <!--                                                        <span class="label label-primary"><i class="fa fa-check"></i> 已完成</span>-->
                                            <!--                                                    </td>-->
                                            <!--                                                    <td>-->
                                            <!--                                                        文档在线预览功能-->
                                            <!--                                                    </td>-->
                                            <!--                                                    <td>-->
                                            <!--                                                        11月7日 22:03-->
                                            <!--                                                    </td>-->
                                            <!--                                                    <td>-->
                                            <!--                                                        11月7日 20:11-->
                                            <!--                                                    </td>-->
                                            <!--                                                    <td>-->
                                            <!--                                                        <p class="small">-->
                                            <!--                                                            已经测试通过-->
                                            <!--                                                        </p>-->
                                            <!--                                                    </td>-->
                                            <!---->
                                            <!--                                                </tr>-->
                                            <!--                                                <tr>-->
                                            <!--                                                    <td>-->
                                            <!--                                                        <span class="label label-primary"><i class="fa fa-check"></i> 解决中</span>-->
                                            <!--                                                    </td>-->
                                            <!--                                                    <td>-->
                                            <!--                                                        会员登录-->
                                            <!--                                                    </td>-->
                                            <!--                                                    <td>-->
                                            <!--                                                        11月7日 22:03-->
                                            <!--                                                    </td>-->
                                            <!--                                                    <td>-->
                                            <!--                                                        11月7日 20:11-->
                                            <!--                                                    </td>-->
                                            <!--                                                    <td>-->
                                            <!--                                                        <p class="small">-->
                                            <!--                                                            测试中-->
                                            <!--                                                        </p>-->
                                            <!--                                                    </td>-->
                                            <!---->
                                            <!--                                                </tr>-->
                                            <!--                                                <tr>-->
                                            <!--                                                    <td>-->
                                            <!--                                                        <span class="label label-primary"><i class="fa fa-check"></i> 解决中</span>-->
                                            <!--                                                    </td>-->
                                            <!--                                                    <td>-->
                                            <!--                                                        会员积分-->
                                            <!--                                                    </td>-->
                                            <!--                                                    <td>-->
                                            <!--                                                        11月7日 22:03-->
                                            <!--                                                    </td>-->
                                            <!--                                                    <td>-->
                                            <!--                                                        11月7日 20:11-->
                                            <!--                                                    </td>-->
                                            <!--                                                    <td>-->
                                            <!--                                                        <p class="small">-->
                                            <!--                                                            未测试-->
                                            <!--                                                        </p>-->
                                            <!--                                                    </td>-->
                                            <!---->
                                            <!--                                                </tr>-->
                                            <!---->
                                            <!---->
                                            <!--                                                </tbody>-->
                                            <!--                                            </table>-->

                                            <!--                                            <div class="hr-line-dashed"></div>-->

                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>姓名</th>
                                                    <th>性别</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if($leaders): foreach($leaders as $v): ?>
                                                <tr>

                                                    <td>
                                                        <?php echo htmlentities($v['name']); ?>
                                                    </td>
                                                    <td>
                                                        <?php if(($v['sex'] == 1)): ?>男
                                                        <?php else: ?>女<?php endif; ?>
                                                    </td>


                                                </tr>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
                                            <form action="<?php echo url('index/Company/add_leader'); ?>" method="post" class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">姓名</label>
                                                    <div class="col-sm-10">
                                                        <input autocomplete="off" type="text" name="name" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="hr-line-dashed"></div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">性别</label>
                                                    <div class="col-sm-10">
                                                        <input type="radio" value="1" name="sex"> 男
                                                        <input type="radio" value="0" name="sex"> 女
                                                    </div>
                                                </div>

                                                <div class="hr-line-dashed"></div>

                                                <div class="form-group">
                                                    <div class="col-sm-4 col-sm-offset-2">
                                                        <input type="hidden" name="company_id" value="<?php echo htmlentities($info['id']); ?>">
                                                        <button class="btn btn-primary" type="submit">确认添加</button>
                                                    </div>
                                                </div>


                                            </form>

                                        </div>
                                        <div class="tab-pane" id="tab-3">

                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>职位名称</th>
                                                    <th>操作</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if($job): foreach($job as $v): ?>
                                                <tr>

                                                    <td>
                                                        <?php echo htmlentities($v['name']); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo url('index/Company/yelp', ['id'=>$v['id']]); ?>">点评</a>
                                                    </td>


                                                </tr>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>

                                            <form action="<?php echo url('index/Company/add_job'); ?>" method="post" class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">职位名称</label>
                                                    <div class="col-sm-10">
                                                        <input autocomplete="off" type="text" name="name" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="hr-line-dashed"></div>

                                                <div class="form-group">
                                                    <div class="col-sm-4 col-sm-offset-2">
                                                        <input type="hidden" name="company_id" value="<?php echo htmlentities($info['id']); ?>">
                                                        <button class="btn btn-primary" type="submit">确认添加</button>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- 全局js -->
<script src="/static/ui/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/ui/js/bootstrap.min.js?v=3.3.6"></script>

<script src="/static/library/um/umeditor.config.js"></script>
<script src="/static/library/um/umeditor.js"></script>

</body>
<script type="text/javascript">
    var ue = UM.getEditor('editor1', {
        // toolbar:['source', 'italic', 'underline',
        //     'formatmatch', 'blockquote','preview', 'horizontal', 'fontfamily',
        //     'fontsize', 'insertimage','link','forecolor',
        // ]
    });
</script>

<script>

    $('.ding').click(function () {

        var i = $(this);
        var id = i.attr('data-id');

        $.post('<?php echo url("index/Index/ding"); ?>', {id:id}, function (e) {
            if (e.code) {

                if (e.data) {
                    //取消赞成功
                    i.next().html(parseInt(i.next().html()) - 1);
                    i.removeClass('btn-warning').addClass('btn-white');
                }else{
                    //点赞成功
                    i.next().html(parseInt(i.next().html()) + 1);
                    i.removeClass('btn-white').addClass('btn-warning');
                }



            }else {
                alert(e.msg);
            }
        })




    })


    $('.add-tag').click(function () {

        var i = $(this);
        var tag = prompt('请输您要添加的标签');

        // if (tag.length < 2 || tag.length > 10){
        //     alert('标签名称长度应在2-10位之间');
        //     return false;
        // }

        var company_id = '<?php echo htmlentities($info['id']); ?>';

        $.post('<?php echo url("index/Index/add_tag"); ?>', {tagName:tag, id:company_id}, function (e) {
            console.log(e);
            if (e.code){
                // location.reload();
                var str = '<a class="label label-default" href=""><i class="fa fa-tag"></i> '+tag+'</a> ';
                i.before(str);
            }else{
                alert(e.msg);
            }

        })


    })


</script>


</html>
