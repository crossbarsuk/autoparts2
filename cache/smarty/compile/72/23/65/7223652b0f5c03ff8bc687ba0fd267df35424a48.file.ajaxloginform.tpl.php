<?php /* Smarty version Smarty-3.1.14, created on 2014-02-21 10:03:02
         compiled from "/home/pavel/public_html/clients/autoparts/modules/ajaxloginform/ajaxloginform.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116201207953070836bdef11-97327490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7223652b0f5c03ff8bc687ba0fd267df35424a48' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/modules/ajaxloginform/ajaxloginform.tpl',
      1 => 1392807757,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116201207953070836bdef11-97327490',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53070836c25711_57070012',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53070836c25711_57070012')) {function content_53070836c25711_57070012($_smarty_tpl) {?><!-- MODULE Ajax login form -->
<div class="login_form block" id="informations_block_left_1">
  <p class="title_block"><?php echo smartyTranslate(array('s'=>'Вход в систему','mod'=>'ajaxloginform'),$_smarty_tpl);?>
</p>
  <div id="login_errors" class="error" style="display: none"></div>
  <form class="std" id="ajax_login_form" method="post" action="http://auto.int/index.php?controller=authentication">
    <div class="form_content clearfix">
      <p class="text">
        <label for="ajax_email"><?php echo smartyTranslate(array('s'=>'Email','mod'=>'ajaxloginform'),$_smarty_tpl);?>
</label>
        <input type="text" class="account_input" value="" name="email" id="ajax_email">
      </p>
      <p class="text">
        <label for="ajax_passwd"><?php echo smartyTranslate(array('s'=>'Passw','mod'=>'ajaxloginform'),$_smarty_tpl);?>
</label>
        <input type="password" class="account_input clearfix" value="" name="passwd" id="ajax_passwd">
      </p>
      <a href="#" id="SubmitLogin" name="SubmitLogin" class="button" onclick="ajaxLogin($('#ajax_login_form'), $('#ajax_email'), $('#ajax_passwd'), $('#login_errors'));"/><?php echo smartyTranslate(array('s'=>'Log in'),$_smarty_tpl);?>
</a>
      
      
      <a class="lost_password" rel="nofollow" title="Восстановить пароль" href="http://auto.int/index.php?controller=password">Забыли пароль?</a>
    </div>
  </form>
</div>

<script>
  function ajaxLogin(form, mail_element, password_element, error_element, showErrorCounter) {
    showErrorCounter = showErrorCounter || false;

//    var validator = form.validate();
    var mail = mail_element.val();
    var password = password_element.val();
    var valid = true;

    
    /*if (mail.length < 6 || !checkLatinDigitSymbol(mail)) {
      mail_element.rules("add", {required: true});
      validator.element(mail_element);
      mail_element.rules("remove", "required");
      valid = false;
    }
    if (password.length < 5 || password.length > 15 || !checkLatinDigitSymbol(password)) {
      password_element.rules("add", {required: true});
      validator.element(password_element);
      password_element.rules("remove", "required");
      valid = false;
    }*/

    if (!valid) {
      return;
    }

    var data = {email: mail, passwd: password, ajax: 1, SubmitLogin: 1};
    

    $.post("<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('authentication',true);?>
", data, function(data){
      var result = JSON.parse(data);
      if (result.hasError) {
        refreshErrors(error_element, result.errors, showErrorCounter);
      } else {
        var back = getURLParameter('back');
        if (back) {
          window.location = back;
        } else {
          window.location.reload(true);
        }
      }
    });
  }

  function getURLParameter(name) {
    return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
  }

  var sErrorMes = "<?php echo smartyTranslate(array('s'=>'There is %d error'),$_smarty_tpl);?>
";
  var sErrorsMes = "<?php echo smartyTranslate(array('s'=>'There are %d errors'),$_smarty_tpl);?>
";

  String.prototype.format = function(){
    var a = this, b;
    for(b in arguments){
      a = a.replace(/%[a-z]/,arguments[b]);
    }
    return a; // Make chainable
  };

  function refreshErrors(error_element, errors, showCounter) {
    showCounter = showCounter || false;
    if (errors.length) {
      var html = '';
      if (showCounter) {
        html += '<p>' + (errors.length > 1 ? sErrorsMes.format(errors.length) : sErrorMes.format(errors.length)) + '</p>';
      }
      html += '<ol>';
      for (var i = 0; i < errors.length; ++i) {
        html += '<li>' + errors[i] + '</li>';
      }
      html += '</ol>'
      error_element.html(html);
      error_element.show();
    }
  }
</script>
<!-- /MODULE Ajax login form -->

<?php }} ?>