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
</head>
<body>
<?= $this->fetch('widget/ie9.php') ?>
<header id="doc-dropdown-justify" data-am-widget="header" class="am-header">
    <?= $this->fetch('widget/header_left.php') ?>
    <?= $this->fetch('widget/header_right.php') ?>
</header>
<?= $this->fetch('widget/header_nav.php') ?>
<?= $this->fetch('widget/header_title.php') ?>
<section style="margin-top: 10px">
    <?php if (isset($flash['business'])): ?>
        <div class="am-alert am-alert-warning" data-am-alert>
            <button type="button" class="am-close">&times;</button>
            <p>请选择你的业务分类</p>
        </div>
    <?php endif ?>
    <?php if (isset($flash['name'])): ?>
        <div class="am-alert am-alert-warning" data-am-alert>
            <button type="button" class="am-close">&times;</button>
            <p>请填写公司名称或者个人姓名,并不要少于2个字</p>
        </div>
    <?php endif ?>
    <?php if (isset($flash['area'])): ?>
        <div class="am-alert am-alert-warning" data-am-alert>
            <button type="button" class="am-close">&times;</button>
            <p>至少选择一个服务区域</p>
        </div>
    <?php endif ?>
    <?php if (isset($flash['type'])): ?>
        <div class="am-alert am-alert-warning" data-am-alert>
            <button type="button" class="am-close">&times;</button>
            <p>至少选择一种业务类型</p>
        </div>
    <?php endif ?>
    <?php if (isset($flash['error'])): ?>
        <div class="am-alert am-alert-warning" data-am-alert>
            <button type="button" class="am-close">&times;</button>
            <p><?= $flash['error'] ?></p>
        </div>
    <?php endif ?>
    <form id="vld-msg-alert" method="post" bg-action="formAction" action="/user/regBusiness" class="am-form">
        <fieldset>
            <div class="am-form-group">
                <h4 class="am-form-label">业务分类：</h4>
                <label class="am-radio-inline" style="margin-left: 8px">
                    <input type="radio" name="company-business" value="抢公司" data-am-ucheck required>抢公司
                </label>
                <label class="am-radio-inline">
                    <input type="radio" name="company-business" value="抢工长" data-am-ucheck>抢工长
                </label>
                <label class="am-radio-inline">
                    <input type="radio" name="company-business" value="抢设计" data-am-ucheck>抢设计
                </label>
                <label class="am-radio-inline">
                    <input type="radio" name="company-business" value="抢材料" data-am-ucheck>抢材料
                </label>
            </div>
            <div class="am-form-group">
                <label for="company-name">名称：</label>
                <input id="company-name" name="company-name" type="text" placeholder="填写公司名称或者个人姓名" minlength="2"
                       maxlength="32" required>
            </div>
            <div class="am-form-group">
                <h4 class="am-form-label">服务区域：</h4>
                <label class="am-checkbox-inline" style="margin-left: 10px">
                    <input name="company-area" type="checkbox" value="汉台区" data-am-ucheck minchecked="1" required>汉台区
                </label>
                <label class="am-checkbox-inline">
                    <input name="company-area" type="checkbox" value="南郑县" data-am-ucheck>南郑县
                </label>
                <label class="am-checkbox-inline">
                    <input name="company-area" type="checkbox" value="城固县" data-am-ucheck>城固县
                </label>
                <label class="am-checkbox-inline">
                    <input name="company-area" type="checkbox" value="洋县" data-am-ucheck>洋县
                </label>
                <label class="am-checkbox-inline">
                    <input name="company-area" type="checkbox" value="西乡县" data-am-ucheck>西乡县
                </label>
                <label class="am-checkbox-inline">
                    <input name="company-area" type="checkbox" value="勉县" data-am-ucheck>勉县
                </label>
                <label class="am-checkbox-inline">
                    <input name="company-area" type="checkbox" value="略阳县" data-am-ucheck>略阳县
                </label>
                <label class="am-checkbox-inline">
                    <input name="company-area" type="checkbox" value="镇巴县" data-am-ucheck>镇巴县
                </label>
                <label class="am-checkbox-inline">
                    <input name="company-area" type="checkbox" value="留坝县" data-am-ucheck>留坝县
                </label>
                <label class="am-checkbox-inline">
                    <input name="company-area" type="checkbox" value="佛坪县" data-am-ucheck>佛坪县
                </label>
            </div>
            <div class="am-form-group" bg-render="item in type">
                {{header}}<h4 class="am-form-label">业务类型：</h4>{{/header}}
                <label class="am-checkbox-inline" style="margin-left: 10px">
                    <input name="company-type" type="checkbox" value="{{:item}}" data-am-ucheck minchecked="1" required>{{:item}}
                </label>
            </div>
            <div class="am-form-group">
                <label for="company-name">地址：</label>
                <input id="company-name" name="company-address" type="text" required>
            </div>
            <div>
                <button type="submit" class="am-btn am-btn-primary am-btn-block">提交</button>
            </div>
        </fieldset>
    </form>
</section>
<?= $this->fetch('widget/footer.php') ?>
<?= $this->fetch('widget/script.php') ?>
<script src="/assets/js/bingo.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#vld-msg-alert').validator({
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
    var companyType = {
        company: ['装饰公司', '设计公司', '家政公司'],
        foreman: ['自装工长', '水电工长', '瓦工工长', '木工工长', '油漆工工长', '其他工长'],
        design: ['本地家装', '工装', '景观设计'],
        material: ['瓷砖', '木地板', '壁纸', '乳胶漆', '家具', '其他']
    };

    var formAction = bingo.action(function ($view, $model, $node) {
        $view.type = companyType.company;
        $node.find('input[type=radio]').change(function () {
            if (this.value == '抢公司') {
                $view.type = companyType.company;
            } else if (this.value == '抢工长') {
                $view.type = companyType.foreman;
            } else if (this.value == '抢设计') {
                $view.type = companyType.design;
            } else if (this.value == '抢材料') {
                $view.type = companyType.material;
            }
            $view.$update();
        });
    });
</script>
</body>
</html>
