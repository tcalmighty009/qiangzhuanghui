<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/4/28
 * Time: 8:33
 * @var $this Slim\View
 */
defined('BASE_ROOT') OR exit('No direct script access allowed');
?>
<!doctype html>
<html class="no-js">
<head>
    <?= $this->fetch('widget/head.php') ?>
    <link rel="stylesheet" href="/assets/css/amazeui.min.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <style type="text/css">
        body {
            padding-bottom: 80px;
        }
    </style>
</head>
<body>
<?= $this->fetch('widget/ie9.php') ?>
<header id="doc-dropdown-justify" data-am-widget="header" class="am-header">
    <?= $this->fetch('widget/header_left.php') ?>
    <?= $this->fetch('widget/header_right.php') ?>
</header>
<?= $this->fetch('widget/header_nav.php') ?>
<?= $this->fetch('widget/header_title.php') ?>
<section>
    <div class="am-g" style="padding: 10px 0;background-color: #e1e0e0">
        <div class="am-u-sm-3">
            <img class="am-circle am-img-responsive"
                 src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/1000/h/1000/q/80"/>
        </div>
        <div class="am-u-sm-9">
            <dl style="margin-bottom: 0px;">
                <dt>欢迎你！yijia001</dt>
                <dd style="color: #dc514c"><span class="am-icon-smile-o am-icon-color-danger">&nbsp;</span>你有152条未读消息！
                </dd>
            </dl>
        </div>
    </div>
    <div class="am-panel-group" id="accordion">
        <?= $this->fetch('widget/collection.php') ?>
        <?= $this->fetch('widget/tender.php') ?>
        <?= $this->fetch('widget/message.php') ?>
    </div>
</section>
<div class="am-g" style="position: fixed;bottom: 38px;z-index: 3;width: 100%">
    <div class="am-u-sm-4" style="padding: 0px">
        <a class="am-btn am-btn-success am-btn-block" href="/user/business">我的业务</a>
    </div>
    <div class="am-u-sm-4" style="padding: 0px">
        <a type="button" class="am-btn am-btn-warning am-btn-block">发布楼盘</a>
    </div>
    <div class="am-u-sm-4" style="padding: 0px">
        <a type="button" class="am-btn am-btn-primary am-btn-block">发布招标</a>
    </div>
</div>
<?= $this->fetch('widget/footer.php') ?>
<?= $this->fetch('widget/script.php') ?>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/amazeui.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#vld-msg').validator({
            onValid: function (validity) {
                $(validity.field).closest('.am-form-group').find('.am-alert').hide();
            },

            onInValid: function (validity) {
                var $field = $(validity.field);
                var $group = $field.closest('.am-form-group');
                var $alert = $group.find('.am-alert');
                // 使用自定义的提示信息 或 插件内置的提示信息
                var msg = $field.data('validationMessage') || this.getValidationMessage(validity);

                if (!$alert.length) {
                    $alert = $('<div class="am-alert am-alert-danger"></div>').hide().
                        appendTo($group);
                }

                $alert.html(msg).show();
            }
        });
    });
</script>
</body>
</html>