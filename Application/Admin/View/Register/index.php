<!DOCTYPE html><html><head>   <title>用户信息表</title></head><body>  
        <h1>用户信息表</h1>  
        <table border="1">        
            <tr>          
                <th>ID</th>
                <th>用户名</th>
                <th>意向课程</th>
                <th colspan="2">操作</th>       
            </tr>     
            <volist name='users' id='u'>          
                <form action="{:U('admin/register/update')}" method="post">                
                    <if condition="$i%2 neq 0">
                        <tr bgcolor="#CCCCCC"></if>
                    <!--根据项数的奇偶，设置表格行的背景颜色-->                
                    <if condition="$i%2 eq 0"><tr bgcolor="#FFFF00"></if>
                    <td>{$i}</td>                    
                    <td><input type="text" name="username" value="{$u.register_name}"/></td>                    
                    <td><input type="text" name="password" value="{$u.class_name}"/></td>                    
                    <td><button onclick="javascript:window.location.href = '__SELF__/register/delete/id/{$u.id}'">删除</button></td><!--此按钮与表单无关-->                    
                    <input type="hidden" name="id" value="{$u.id}"/>
                    <td><input type="submit" value="修改"></td>                
                    </tr>           
                </form>       
            </volist> 
        </table>     
        <a  href="{:U('home/index/signup')}"  target='black' >添加用户</a>   

    </body>
</html> 