<?php if (!defined('THINK_PATH')) exit();?>
   <head>
    <meta charset="utf-8">
</head>
 <?php if($data): ?><table  border="1">
   <tr>
       <td>id</td>
       <td>公司名</td>
       <td>公司地址</td>
       <td>公司主营</td>
       <td>联系人</td>
       <td>手机号</td>
       <td>邮箱</td>
       <td>时间</td>
       <td>操作</td>
   </tr>
    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
        <td><?php echo ($v["id"]); ?></td>
        <td><?php echo ($v["name"]); ?></td>
        <td><?php echo ($v["dz"]); ?></td>
        <td><?php echo ($v["zy"]); ?></td>
        <td><?php echo ($v["lxr"]); ?></td>
        <td><?php echo ($v["sjh"]); ?></td>
        <td><?php echo ($v["email"]); ?></td>
        <td><?php echo (date('Y年m月d日 H时I分s秒',$v["time"])); ?></td>
        <td><a href="/jiamen.php?m=home&c=Index&a=del&id=<?php echo ($v["id"]); ?>" onclick="return confirm('你真的要删除吗？')? true :false">删除</a></td>
    </tr><?php endforeach; endif; ?>
    </table><?php endif; ?>