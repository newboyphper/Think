<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bootstrap Admin</title>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/stylesheets/theme.css">
        <link rel="stylesheet" href="__PUBLIC__/font-awesome/css/font-awesome.css">
        <script src="__PUBLIC__/jquery-1.8.1.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="__PUBLIC__/layer/layer.min.js"></script>
        <script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src='__PUBLIC__/layer/extend/layer.ext.js'></script>

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
        <link rel="shortcut icon" href="__PUBLIC__/assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="__PUBLIC__/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="__PUBLIC__/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="__PUBLIC__/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="__PUBLIC__/assets/ico/apple-touch-icon-57-precomposed.png">
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
                <div class="dialog span4">
                    <div class="block">
                        <div class="block-heading">忘记密码<font>（输入注册时填写的用户名和邮箱）</font></div>
                        <div class="block-body">
                            <form name="signin" id="form1" method="post" action="{:U('Login/wjpas')}">
                                <label>用户名</label>
                                <input type="text" class="span12" name="user_name" value="" id="num">
                                <label>邮箱</label>
                                <input type="text" class="span12" name="email" value="" id="email">
                                <label>新密码</label>
                                <input type="password" class="span12" name="user_pwd" value="" id="psw">
                                <button type="submit" target-form="form1" class="am-btn am-btn-primary am-btn-block ajax-post" style="display:none;">提交</button>
                                <button type="button" onclick="sub(this.form, this)" class="btn btn-primary pull-right" >提交</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript" src="__PUBLIC__/Js/login.js"></script>
            <script type="text/javascript">
                                    function sub(o) {
                                        //表单验证部分
                                        if ($("#num").val() == "") {
                                            layer.alert('用户名不能为空');
                                            $("#num").focus();
                                            return false;
                                        }
                                        if ($("#email").val() == "") {
                                            layer.alert('邮箱不能为空');
                                            $("#email").focus();
                                            return false;
                                        }
                                        if ($("#psw").val() == "") {
                                            layer.alert('新密码不能为空');
                                            $("#psw").focus();
                                            return false;
                                        }
                                        $(".ajax-post").trigger('click');
                                    }
            </script>
    </body>
</html>