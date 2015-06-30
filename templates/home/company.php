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
    <?php var_dump($business) ?>
    <div class="am-g" style="padding-top: 5px;background-color: #e1e0e0">
        <div class="am-u-sm-3">
            <img class="am-img-thumbnail am-radius am-img-responsive"
                 src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/1000/h/1000/q/80"/>
        </div>
        <div class="am-u-sm-9">
            <div class="am-g am-g-collapse">
                <div class="am-u-sm-10"><?= $business['name'] ?></div>
                <div class="am-u-sm-2">&nbsp;&nbsp;<span class="am-badge am-badge-success am-text-xs"
                                                                                            style="padding: 0.2em 0.2em"><?= isset($business['identification']) ? $business['identification'] : '未认证' ?></span></div>
            </div>
            <dl class="am-text-xs am-link-muted am-margin-vertical-xs">
                <dd>
                    <span>人气：<?= isset($business['popular']) ? $business['popular'] : 0 ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>案例：<?= isset($business['case']) ? $business['case'] : 0 ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>咨询人数：<?= isset($business['consult']) ? $business['consult'] : 0 ?></span>
                </dd>
                <dd>服务区域：<?= isset($business['area']) ? $business['area'] : '未填写' ?></dd>
                <dd>地址：<?= isset($business['address']) ? $business['address'] : '未填写' ?></dd>
            </dl>
        </div>
    </div>
</section>
<section class="am-panel am-panel-default">
    <header class="am-panel-hd">
        <div class="am-titlebar am-titlebar-default" data-am-widget="titlebar">
            <h2 class="am-titlebar-title ">公司简介</h2>
            <nav class="am-titlebar-nav">
                <a class="am-btn">编辑</a>
                <a href="#more" class="am-btn">详情 &raquo;</a>
            </nav>
        </div>
    </header>
    <main class="am-panel-bd am-text-sm">
        <p><?= isset($business['description']) ? $business['description'] : '暂未填写' ?></p>
    </main>
</section>
<section class="am-panel am-panel-default">
    <header class="am-panel-hd">
        <div class="am-titlebar am-titlebar-default" data-am-widget="titlebar">
            <h2 class="am-titlebar-title ">企业证书</h2>
            <nav class="am-titlebar-nav">
                <a class="am-btn">编辑</a>
                <a href="#more" class="am-btn">详情 &raquo;</a>
            </nav>
        </div>
    </header>
    <main class="am-panel-bd">
        <ul class="am-avg-sm-3 am-thumbnails">
            <li><img class="am-img-responsive am-thumbnail" src="http://s.amazeui.org/media/i/demos/bing-1.jpg"/></li>
            <li><img class="am-img-responsive am-thumbnail" src="http://s.amazeui.org/media/i/demos/bing-2.jpg"/></li>
            <li><img class="am-img-responsive am-thumbnail" src="http://s.amazeui.org/media/i/demos/bing-3.jpg"/></li>
        </ul>
    </main>
</section>
<section class="am-panel am-panel-default">
    <header class="am-panel-hd">
        <div class="am-titlebar am-titlebar-default" data-am-widget="titlebar">
            <h2 class="am-titlebar-title ">公司案例</h2>
            <nav class="am-titlebar-nav">
                <a class="am-btn">编辑</a>
                <a href="#more" class="am-btn">详情 &raquo;</a>
            </nav>
        </div>
    </header>
    <main class="am-panel-bd">
        <ul class="am-avg-sm-3 am-thumbnails">
            <li><img class="am-img-responsive am-thumbnail" src="http://s.amazeui.org/media/i/demos/bing-1.jpg"/></li>
            <li><img class="am-img-responsive am-thumbnail" src="http://s.amazeui.org/media/i/demos/bing-2.jpg"/></li>
            <li><img class="am-img-responsive am-thumbnail" src="http://s.amazeui.org/media/i/demos/bing-3.jpg"/></li>
        </ul>
    </main>
</section>
<section class="am-panel am-panel-default">
    <header class="am-panel-hd">
        <div class="am-titlebar am-titlebar-default" data-am-widget="titlebar">
            <h2 class="am-titlebar-title ">近期活动</h2>
            <nav class="am-titlebar-nav">
                <a class="am-btn">编辑</a>
                <a href="#more" class="am-btn">详情 &raquo;</a>
            </nav>
        </div>
    </header>
    <main class="am-panel-bd am-text-sm">
        <p class="line-clamp">
            活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容</p>
    </main>
</section>
<?= $this->fetch('widget/footer.php') ?>
<? //= $this->fetch('widget/script.php') ?>
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