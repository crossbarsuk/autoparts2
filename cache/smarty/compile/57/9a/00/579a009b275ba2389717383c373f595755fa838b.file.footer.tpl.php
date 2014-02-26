<?php /* Smarty version Smarty-3.1.14, created on 2014-02-21 09:01:12
         compiled from "/home/pavel/public_html/clients/autoparts/themes/autoparts/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20951473515306f9b888ab28-46908347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '579a009b275ba2389717383c373f595755fa838b' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/themes/autoparts/footer.tpl',
      1 => 1392367959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20951473515306f9b888ab28-46908347',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content_only' => 0,
    'HOOK_RIGHT_COLUMN' => 0,
    'HOOK_FOOTER' => 0,
    'PS_ALLOW_MOBILE_DEVICE' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5306f9b88aab51_47212948',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5306f9b88aab51_47212948')) {function content_5306f9b88aab51_47212948($_smarty_tpl) {?>		<?php if (!$_smarty_tpl->tpl_vars['content_only']->value){?>
				</div>

<!-- Right -->
				<div id="right_column" class="column grid_2 omega">
					<?php echo $_smarty_tpl->tpl_vars['HOOK_RIGHT_COLUMN']->value;?>

				</div>
			</div>
    </div>


<!-- Footer -->
      <div class="footer_wrap">
        <div class="container_9">
          <div id="footer" class="grid_9 alpha omega clearfix">
            <?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER']->value;?>

            <?php if ($_smarty_tpl->tpl_vars['PS_ALLOW_MOBILE_DEVICE']->value){?>
              <p class="center clearBoth"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true);?>
?mobile_theme_ok"><?php echo smartyTranslate(array('s'=>'Browse the mobile site'),$_smarty_tpl);?>
</a></p>
            <?php }?>
          </div>
        </div>
			</div>
    </div>
		
	<?php }?>
	</body>
</html>
<?php }} ?>