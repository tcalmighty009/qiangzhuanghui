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
    <?php if (isset($flash['error']) and $flash['error']): ?>
        <div class="am-alert am-alert-warning" data-am-alert>
            <button type="button" class="am-close">&times;</button>
            <p>电话已被注册，请重新填写</p>
        </div>
    <?php endif ?>
    <form id="vld-msg" method="post" action="/common/regOne" class="am-form am-form-horizontal">
        <div class="am-form-group">
            <label class="am-u-sm-3 am-form-label">手机号：</label>
            <div class="am-u-sm-9">
                <input type="text" name="phone" pattern="^[1][3587]\d{9}$" placeholder="输入手机号" data-validation-message="只支持中国境内电话号码" required>
            </div>
        </div>
        <span>短信验证码将发送至该手机号，请认真填写</span>
        <button type="submit" class="am-btn am-btn-primary am-btn-block">下一步</button>
    </form>
</section>
<?= $this->fetch('widget/footer.php') ?>

<?= $this->fetch('widget/script.php') ?>
<script type="text/javascript">
    $(function() {
        $('#vld-msg').validator({
            onValid: function(validity) {
                $(validity.field).closest('.am-form-group').find('.am-alert').hide();
            },

            onInValid: function(validity) {
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
