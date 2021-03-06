<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>意向用户登记</title>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/Public/stylesheets/theme.css">
        <link rel="stylesheet" href="/Public/font-awesome/css/font-awesome.css">
        <script src="/Public/jquery-1.8.1.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="/Public/layer/min.js"></script>
        <script src="/Public/bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src='/Public/layer/extend/ext.js'></script>

        <!-- Demo page code -->

        <style type="text/css">
            #line-chart {
                height:300px;
                width:800px;
                margin: 0px auto;
                margin-top: 1em;
            }
            .brand { font-family: georgia, serif; }
            .brand .first {
                color: #ccc;
                font-style: italic;
            }
            .brand .second {
                color: #fff;
                font-weight: bold;
            }
            .block-heading font{
                font-weight: lighter;
                margin-left: 10px;
                font-size: 13px;
                color: #0088cc;
                font-family: serif;
            }
        </style>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="/Public/assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/Public/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/Public/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/Public/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/Public/assets/ico/apple-touch-icon-57-precomposed.png">
    </head>
    <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
    <!--[if IE 7 ]> <body class="ie ie7"> <![endif]-->
    <!--[if IE 8 ]> <body class="ie ie8"> <![endif]-->
    <!--[if IE 9 ]> <body class="ie ie9"> <![endif]-->
    <!--[if (gt IE 9)|!(IE)]><!-->
    <body> 
        <!--<![endif]-->   
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <ul class="nav pull-right">

                    </ul>
                    <a class="brand" href=""><span class="first">CSV</span> <span class="second">&nbsp;drawing &nbsp;tool</span></a>
                </div>
            </div>
        </div>


        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span4 offset4 dialog">
                    <div class="block">
                        <div class="block-heading">意向用户登记<font>带*的为必填项</font></div>
                        <div class="block-body">
                            <form name="signup" id="form1" method="post" action="<?php echo U('Index/signup');?>">

                                <label>*姓名</label>
                                <input type="text" class="span12" name='register_name' value="" id="name">
                                <label>*年龄</label>
                                <input type="text" class="span12" name="age" value="" id="psw">
                                <label>*电话，多个电话,用,分开</label>
                                <input type="text" class="span12" name="tels" value="" id="num">
                                <label>*预想报班级</label>
                                <select name="class_name" >
                                        <?php if(is_array($class_info)): foreach($class_info as $k=>$vo): ?><option><?php echo ($vo['class_name']); ?>--<?php echo ($class_style[$vo['style']]); ?></option><?php endforeach; endif; ?>
                                </select>
                                <label>附件信息</label>
                                <input type="text" class="span12" name='extend_msg' value="" id="name">
                                
                                <button type="submit" target-form="form1" class="am-btn am-btn-primary am-btn-block ajax-post" style="display:none;">提交</button>
                                <button type="button" onclick="sub(this.form, this)"class="btn btn-primary pull-right" >添加</button>
                                <!-- <a href="" class="btn btn-primary pull-right">注册</a> -->
                                <label class="remember-me"><input type="checkbox"> 我同意<a href="terms-and-conditions.php">该网站使用协议</a></label>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="/Public/Js/login.js"></script>
            <script type="text/javascript">
                                    function sub(o) {
                                        if ($("#num").val() == "") {
                                            alert('电话不能为空');
                                            $("#num").focus();
                                            return false;
                                        }
                                        if ($("#name").val() == "") {
                                            alert('姓名不能为空');
                                            $("#name").focus();
                                            return false;
                                        }
                                        if ($("#psw").val() == "") {
                                            alert('年龄不能为空');
                                            $("#psw").focus();
                                            return false;
                                        }
                                        //表单验证部分
                                        $(".ajax-post").trigger('click');
                                    }
            </script>
    </body>
</html>