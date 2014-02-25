<!-- MODULE Ajax login form -->
<div class="login_form block" id="informations_block_left_1">
  <p class="title_block">{l s='Вход в систему' mod='ajaxloginform'}</p>
  <div id="login_errors" class="error" style="display: none"></div>
  <form class="std" id="ajax_login_form" method="post" action="http://auto.int/index.php?controller=authentication">
    <div class="form_content clearfix">
      <p class="text">
        <label for="ajax_email">{l s='Email' mod='ajaxloginform'}</label>
        <input type="text" class="account_input" value="" name="email" id="ajax_email">
      </p>
      <p class="text">
        <label for="ajax_passwd">{l s='Passw' mod='ajaxloginform'}</label>
        <input type="password" class="account_input clearfix" value="" name="passwd" id="ajax_passwd">
      </p>
      <a href="#" id="SubmitLogin" name="SubmitLogin" class="button" onclick="ajaxLogin($('#ajax_login_form'), $('#ajax_email'), $('#ajax_passwd'), $('#login_errors'));"/>{l s='Log in'}</a>
      
      {*<p class="submit">
        <input type="hidden" value="http://auto.int/index.php?controller=order&amp;step=1&amp;multi-shipping=0" name="back" class="hidden">					<input type="submit" value="{l s='Login' mod='ajaxloginform'}" class="button" name="SubmitLogin" id="SubmitLogin">
        <a href="#" id="SubmitLogin" name="SubmitLogin" class="login_button" onclick="ajaxLogin($('#{$login_form_id}'), $('#email_login'), $('#passwd_login'), $('#login_errors'));"/>{l s='Log in'}</a>
      </p>*}
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

    {literal}
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
    {/literal}

    $.post("{$link->getPageLink('authentication', true)}", data, function(data){
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

  var sErrorMes = "{l s='There is %d error'}";
  var sErrorsMes = "{l s='There are %d errors'}";

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

