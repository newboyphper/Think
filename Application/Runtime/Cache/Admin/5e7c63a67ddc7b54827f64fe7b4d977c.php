<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html><head>   <title>用户信息表</title></head><body>  
        <h1>用户信息表</h1>  
        <table border="1">        
            <tr>          
                <th>ID</th>
                <th>用户名</th>
                <th>意向课程</th>
                <th colspan="2">操作</th>       
            </tr>     
            <?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?><form action="<?php echo U('admin/index/update');?>" method="post">                
                    <?php if($i%2 != 0): ?><tr bgcolor="#CCCCCC"><?php endif; ?>
                    <!--根据项数的奇偶，设置表格行的背景颜色-->                
                    <?php if($i%2 == 0): ?><tr bgcolor="#FFFF00"><?php endif; ?>
                    <td><?php echo ($i); ?></td>                    
                    <td><input type="text" name="username" value="<?php echo ($u["register_name"]); ?>"/></td>                    
                    <td><input type="text" name="password" value="<?php echo ($u["class_name"]); ?>"/></td>                    
                    <td><button onclick="javascript:window.location.href = '/index.php/admin//User/delete/id/<?php echo ($u["id"]); ?>'">删除</button></td><!--此按钮与表单无关-->                    
                    <input type="hidden" name="id" value="<?php echo ($u["id"]); ?>"/>
                    <td><input type="submit" value="修改"></td>                
                    </tr>           
                </form><?php endforeach; endif; else: echo "" ;endif; ?> 
        </table>     
        <h1>添加用户</h1>   
        <form action="/index.php/admin//User/create" method="post">     
            用户名：<input type="text" name="username" />
            密码：<input type="text" name="password" />
            <input type="submit" value="提交"> </form>    
    </body>
</html>