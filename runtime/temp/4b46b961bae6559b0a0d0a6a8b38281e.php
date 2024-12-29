<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:83:"/www/wwwroot/appstore.nuosike.cn/public/../application/admin/view/category/add.html";i:1611390163;s:75:"/www/wwwroot/appstore.nuosike.cn/application/admin/view/layout/default.html";i:1583049508;s:72:"/www/wwwroot/appstore.nuosike.cn/application/admin/view/common/meta.html";i:1583049508;s:74:"/www/wwwroot/appstore.nuosike.cn/application/admin/view/common/script.html";i:1583049508;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG && !\think\Config::get('fastadmin.multiplenav')): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <form id="add-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="alert alert-warning-light">
        <?php echo __('Category warmtips'); ?>
    </div>

    <div class="form-group">
        <label for="c-type" class="control-label col-xs-12 col-sm-2"><?php echo __('Type'); ?>:</label>
        <div class="col-xs-12 col-sm-8">

            <select id="c-type" data-rule="required" class="form-control selectpicker" name="row[type]">
                <?php if(is_array($typeList) || $typeList instanceof \think\Collection || $typeList instanceof \think\Paginator): if( count($typeList)==0 ) : echo "" ;else: foreach($typeList as $key=>$vo): ?>
                <option value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',""))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label for="c-pid" class="control-label col-xs-12 col-sm-2"><?php echo __('Pid'); ?>:</label>
        <div class="col-xs-12 col-sm-8">

            <select id="c-pid" data-rule="required" class="form-control selectpicker" name="row[pid]">
                <?php if(is_array($parentList) || $parentList instanceof \think\Collection || $parentList instanceof \think\Paginator): if( count($parentList)==0 ) : echo "" ;else: foreach($parentList as $key=>$vo): ?>
                <option data-type="<?php echo $vo['type']; ?>" value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',""))): ?>selected<?php endif; ?>><?php echo $vo['name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label for="c-name" class="control-label col-xs-12 col-sm-2">应用名称</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-name" data-rule="required" class="form-control" name="row[name]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="c-nickname" class="control-label col-xs-12 col-sm-2">版本号</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-nickname" data-rule="required" class="form-control" name="row[nickname]" type="text" value="">
        </div>
    </div>

    <div class="form-group">
        <label for="c-image" class="control-label col-xs-12 col-sm-2">图标</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-image" class="form-control" size="35" name="row[image]" type="text" value="">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-image" class="btn btn-danger plupload" data-input-id="c-image" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-image" class="btn btn-primary fachoose" data-input-id="c-image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-image"></ul>
        </div>
    </div>
    <div class="form-group">
        <label for="c-keywords" class="control-label col-xs-12 col-sm-2">软件说明</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-keywords" class="form-control" name="row[keywords]" type="text" value="">
        </div>
    </div>

    <div class="form-group">
        <label for="c-weigh" class="control-label col-xs-12 col-sm-2"><?php echo __('Weigh'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-weigh" class="form-control" name="row[weigh]" type="number" value="0">
        </div>
    </div>


    <div class="form-group">
        <label for="c-bt1a" class="control-label col-xs-12 col-sm-2">安装包地址:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-bt1a" class="form-control" name="row[bt1a]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="c-bt1b" class="control-label col-xs-12 col-sm-2">按钮颜色</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-bt1b" class="form-control" name="row[bt1b]" type="text" value="">
        </div>
    </div>

    <div class="form-group">
        <label for="c-bt2a" class="control-label col-xs-12 col-sm-2">文件大小(Mb)</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-bt2a" class="form-control" name="row[bt2a]" type="text" value="">
        </div>
    </div>
 <div class="form-group">
        <label for="c-bt2b" class="control-label col-xs-12 col-sm-2">是否付费:</label>
        <div class="col-xs-12 col-sm-8">
            <select class="form-control"  name="row[bt2b]" >
			<option value="">免费</option>
            <option value="true">付费</option> 
            </select>
        </div>
        </div>
    <div class="form-group">
        <label for="c-beizhu" class="control-label col-xs-12 col-sm-2">备注:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-beizhu" class="form-control" name="row[beizhu]" type="text" value="">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[status]', ['normal'=>__('Normal'), 'hidden'=>__('Hidden')]); ?>
        </div>
    </div>
    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version']); ?>"></script>
    </body>
</html>