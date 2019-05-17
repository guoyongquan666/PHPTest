<?php /*a:1:{s:65:"/usr/local/nginx/html/tp5/application/index/view/company/yelp.php";i:1558053604;}*/ ?>

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
                    <h5>点评岗位<small</small></h5>
                </div>
                <div class="ibox-content">
                    <form method="post" action="" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">岗位名称</label>
                            <div class="col-sm-10">
                                <input autocomplete="off" disabled type="text" value="<?php echo htmlentities($info['name']); ?>" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">工资</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="请输入您在该岗位的工资水平（税前）" autocomplete="off" name="salary" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">评分</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="请输入一个0-10之间的整数" autocomplete="off" name="score" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>



                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <input type="hidden" name="job_id" value="<?php echo htmlentities($info['id']); ?>">
                                <button class="btn btn-primary" type="submit">确认添加</button>
                                <button class="btn btn-white" type="reset">取消</button>
                            </div>
                        </div>
                    </form>


                    <div id="main" style="width: 600px;height:400px;"></div>
                </div>
            </div>
        </div>
    </div>


</div>





<!-- 全局js -->
<script src="/static/ui/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/ui/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/static/library/echarts/dist/echarts.js"></script>


<script>

    var data = '<?php echo $salary; ?>';

    console.log(data);

    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));

    // 指定图表的配置项和数据
    option = {
        title : {
            text: '该职位薪资分布情况',
            subtext: '',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            data: ['3K以内','3K-5K','5K-8K','8K-12K','12K以上']
        },
        series : [
            {
                name: '薪资水平',
                type: 'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data: JSON.parse(data)
                ,
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };



    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>


</body>

</html>
