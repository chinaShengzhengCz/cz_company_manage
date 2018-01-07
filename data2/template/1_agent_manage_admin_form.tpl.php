<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./source/plugin/agent_manage_admin/template/css/initial_style.css" type="text/css" media="all">
    <link rel="stylesheet" href="./source/plugin/agent_manage_admin/template/dict/bootstrap/css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="./source/plugin/agent_manage_admin/template/dict/select2/select2.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="./source/plugin/agent_manage_admin/template/css/agent_manage_common.css" type="text/css" media="all">
    <style>
        input, textarea, .uneditable-input,select {
            width: 50%
        }
        a {
            color: #4d89cd;
        }
    </style>
</head>
<body>
<form id="add_form" method="post" autocomplete="off" action="plugin.php?id=agent_manage_admin:add_agent_page">
    <div>
        <label>合伙人名称</label><input class="form-control" type="text" name="co_name" value="<?php if(!empty($agent_data)) { ?><?php echo $agent_data['full_name'];?><?php } ?>" required/>
    </div>
    <div>
        <label>等级</label><input class="form-control" type="number" name="co_level" value="<?php if(!empty($agent_data)) { ?><?php echo $agent_data['co_level'];?><?php } ?>" required/>
    </div>
    <div>
        <label>保证金</label><input class="form-control" type="number" name="ensure_money" value="<?php if(!empty($agent_data)) { ?><?php echo $agent_data['ensure_money'];?><?php } else { ?>0<?php } ?>"/>
    </div>
    <div>
        <label>手机号</label><input class="form-control" type="text" name="tel" required value="<?php if(!empty($agent_data)) { ?><?php echo $agent_data['tel'];?><?php } else { } ?>"/>
    </div>
    <div>
        <label>用户id</label><input class="form-control" type="text" name="uid" required value="<?php if(!empty($agent_data)) { ?><?php echo $agent_data['uid'];?><?php } else { } ?>"/>
    </div>
    <div>
        <label>邀请人uid</label><input class="form-control" type="text" name="up_uid" required value="<?php if(!empty($agent_data)) { ?><?php echo $agent_data['up_uid'];?><?php } else { } ?>"/>
    </div>
    <input type="hidden" name="oper" value="<?php if(!empty($agent_data)) { ?>edit<?php } else { ?>add<?php } ?>"/>
    <input type="hidden" name="" value="<?php if(!empty($agent_data)) { ?><?php echo $agent_data[''];?><?php } ?>"/>
    <input type="submit" value="提交"/>
</form>
<script src="./source/plugin/agent_manage_admin/template/dict/jquery/jquery.min.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
<script src="./source/plugin/agent_manage_admin/template/js/form.js" type="text/javascript"></script>

</body>
</html>
