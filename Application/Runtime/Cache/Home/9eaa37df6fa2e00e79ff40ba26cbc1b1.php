<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>test模板</title>
	<link rel="stylesheet" type="text/css" href="/TPproject/Public/css/table.css">
</head>
<body>
	<table>
		<th width="25%">姓名</th>
		<th width="25%">年龄</th>
		<th width="25%">薪酬</th>
		<th width="25%">日期</th>
		<tbody>
			<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$re): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ((isset($re['name']) && ($re['name'] !== ""))?($re['name']):"未设置"); ?></td>
					<td><?php echo ((isset($re['age']) && ($re['age'] !== ""))?($re['age']):"未设置"); ?></td>
					<td><?php echo ((isset($re['salary']) && ($re['salary'] !== ""))?($re['salary']):"未设置"); ?></td>
					<td><?php echo ((isset($re['changeDate']) && ($re['changeDate'] !== ""))?($re['changeDate']):"未设置"); ?></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>

	<div class='page'>
		<?php echo ($page); ?>
	</div>
	
</body>
</html>