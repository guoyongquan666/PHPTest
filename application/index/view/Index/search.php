
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>"{$keyword}"的搜索结果</title>
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
                        <form action="{:url('index/Index/search')}" method="get">
                            <div class="input-group">
                                <input type="text" value="{$keyword}" placeholder="" name="wd" class="form-control input-lg">
                                <div class="input-group-btn">
                                    <button class="btn btn-lg btn-primary" type="submit">
                                        搜索
                                    </button>
                                </div>
                            </div>
                            <small>
                                <span>为您找到相关结果约{$num}个</span>
                                <span><a href="{:url('index/Index/add')}">未找到，创建它?</a></span>
                            </small>

                        </form>
                    </div>
                    <div class="hr-line-dashed"></div>

                    {volist name="newList" id="vo"}
                    <div class="search-result">
                        <h3><a href="{:url('index/Index/show', ['id'=>$vo['id']])}">{$vo.name|raw}</a></h3>
                        <a href="{:url('index/Index/show', ['id'=>$vo['id']])}" class="search-link">{:url('index/Index/show', ['id'=>$vo['id']], true, true)}</a>
                        <p>
                            {$vo.introduce}
                        </p>
                    </div>
                    <div class="hr-line-dashed"></div>
                    {/volist}

                    <div class="text-center">
                        <div class="btn-group">
                            {$list|raw}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
