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
    <?php if (isset($flash['validation']['code']) and !$flash['validation']['code']): ?>
        <div class="am-alert am-alert-warning" data-am-alert>
            <button type="button" class="am-close">&times;</button>
            <p>验证码错误，请重新填写</p>
        </div>
    <?php endif ?>
    <?php if (isset($flash['validation']['name']) and !$flash['validation']['name']): ?>
        <div class="am-alert am-alert-warning" data-am-alert>
            <button type="button" class="am-close">&times;</button>
            <p>用户名格式错误，请重新填写</p>
        </div>
    <?php endif ?>
    <?php if (isset($flash['validation']['password']) and !$flash['validation']['password']): ?>
        <div class="am-alert am-alert-warning" data-am-alert>
            <button type="button" class="am-close">&times;</button>
            <p>密码格式错误，请重新填写</p>
        </div>
    <?php endif ?>
    <?php if (isset($flash['validation']['error']) and $flash['validation']['error']): ?>
        <div class="am-alert am-alert-warning" data-am-alert>
            <button type="button" class="am-close">&times;</button>
            <p>用户名重复，请重新填写</p>
        </div>
    <?php endif ?>
    <form id="vld-msg" method="post" action="/common/regTo" class="am-form am-form-horizontal">
        <div class="am-form-group">
            <label class="am-u-sm-3 am-form-label">验证码：</label>

            <div class="am-u-sm-5">
                <input type="text" name="code" placeholder="输入验证码"
                       value="<?= isset($flash['form']['code']) ? $flash['form']['code'] : '' ?>"
                       data-validation-message="验证码不能为空" required>
            </div>
            <div class="am-u-sm-4"><a class="am-btn am-btn-danger am-btn-block" href="/common/regOne">重新获取</a></div>
        </div>
        <div class="am-form-group">
            <label class="am-u-sm-3 am-form-label">用户名：</label>

            <div class="am-u-sm-9">
                <input type="text" name="name" minlength="6" maxlength="15"
                       value="<?= isset($flash['form']['name']) ? $flash['form']['name'] : '' ?>"
                       placeholder="6-15位以字母开头由字母、数字、下划线组成"
                       pattern="^[a-zA-z][a-zA-Z0-9_]{5,14}$"
                       required>
            </div>

        </div>
        <div class="am-form-group">
            <label class="am-u-sm-3 am-form-label">设置密码：</label>

            <div class="am-u-sm-9">
                <input type="password" name="password" minlength="6" maxlength="20" placeholder="6-20位数字或字母组成"
                       value="<?= isset($flash['form']['password']) ? $flash['form']['password'] : '' ?>"
                       pattern="^[a-zA-Z0-9_]{6,20}$" required>
            </div>
        </div>
        <button type="submit" class="am-btn am-btn-primary am-btn-block">提交</button>
    </form>
</section>
<?= $this->fetch('widget/footer.php') ?>
<?= $this->fetch('widget/script.php') ?>
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
