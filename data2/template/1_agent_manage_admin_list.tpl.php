<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./source/plugin/agent_manage_admin/template/css/initial_style.css" type="text/css" media="all">
    <link rel="stylesheet" href="./source/plugin/agent_manage_admin/template/dict/bootstrap/css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="./source/plugin/agent_manage_admin/template/dict/bootstrap-table/bootstrap-table.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="./source/plugin/agent_manage_admin/template/css/agent_manage_common.css" type="text/css" media="all">
    <style>
        .bootstrap-table {
            position: relative;
        }

        .table-responsive {
            left: 12%;
            position: relative;
            width: 85%;
        }
        .tree li span, ul li span{
            cursor: pointer;
        }
        #residedistrictbox,#showerror_residecity{
            display: inline;
        }
    </style>
</head>
<body>
<?php if(!empty($cate_html)) { ?>
<?php echo $cate_html;?>
<?php } ?>
<div id="ct" class="ct2_a wp cl">
    <div class="mn">
        <div class="table-responsive">
            <table id="company_list"></table>
        </div>


    </div>

    <div class="appl">
        <!--[diy=diysidetop]-->
        <div id="diysidetop" class="area"></div><!--[/diy]-->
        <!--[diy=diysidebottom]-->
        <div id="diysidebottom" class="area"></div><!--[/diy]-->
    </div>
</div>


<script src="./source/plugin/agent_manage_admin/template/dict/jquery/jquery.min.js" type="text/javascript"></script>
<script src="./source/plugin/agent_manage_admin/template/dict/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./source/plugin/agent_manage_admin/template/dict/bootstrap-table/bootstrap-table.min.js" type="text/javascript"></script>
<script src="./source/plugin/agent_manage_admin/template/dict/bootstrap-table/bootstrap-table-locale-all.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
<script src="static/js/common_extra.js" type="text/javascript"></script>
<script src="./source/plugin/agent_manage_admin/template/js/list.js" type="text/javascript"></script>
</body>
</html>