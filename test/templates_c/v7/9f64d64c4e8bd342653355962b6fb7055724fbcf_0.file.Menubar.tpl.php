<?php
/* Smarty version 3.1.39, created on 2024-04-19 05:29:05
  from 'C:\xampp2\htdocs\vtigercrm\layouts\v7\modules\Vtiger\partials\Menubar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_66220121a10de2_26335233',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f64d64c4e8bd342653355962b6fb7055724fbcf' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Vtiger\\partials\\Menubar.tpl',
      1 => 1669872319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66220121a10de2_26335233 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['MENU_STRUCTURE']->value) {
$_smarty_tpl->_assignInScope('topMenus', $_smarty_tpl->tpl_vars['MENU_STRUCTURE']->value->getTop());
$_smarty_tpl->_assignInScope('moreMenus', $_smarty_tpl->tpl_vars['MENU_STRUCTURE']->value->getMore());?>

<div id="modules-menu" class="modules-menu">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SELECTED_CATEGORY_MENU_LIST']->value, 'moduleModel', false, 'moduleName');
$_smarty_tpl->tpl_vars['moduleModel']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['moduleName']->value => $_smarty_tpl->tpl_vars['moduleModel']->value) {
$_smarty_tpl->tpl_vars['moduleModel']->do_else = false;
?>
		<?php $_smarty_tpl->_assignInScope('translatedModuleLabel', vtranslate($_smarty_tpl->tpl_vars['moduleModel']->value->get('label'),$_smarty_tpl->tpl_vars['moduleName']->value));?>
		<ul title="<?php echo $_smarty_tpl->tpl_vars['translatedModuleLabel']->value;?>
" class="module-qtip">
			<li <?php if ($_smarty_tpl->tpl_vars['MODULE']->value == $_smarty_tpl->tpl_vars['moduleName']->value) {?>class="active"<?php } else { ?>class=""<?php }?>>
				<a href="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getDefaultUrl();?>
&app=<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
">
					<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getModuleIcon();?>

					<span><?php echo $_smarty_tpl->tpl_vars['translatedModuleLabel']->value;?>
</span>
				</a>
			</li>
		</ul>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php }
}
}
