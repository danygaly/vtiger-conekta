<?php
/* Smarty version 3.1.39, created on 2024-04-18 19:40:25
  from 'C:\xampp2\htdocs\vtigercrm\layouts\v7\modules\Install\InstallPreProcess.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_66216919ec6788_64062392',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99b5695a0232b465bdc3f3c0ee692b7a08079a08' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Install\\InstallPreProcess.tpl',
      1 => 1669872319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66216919ec6788_64062392 (Smarty_Internal_Template $_smarty_tpl) {
?>
<input type="hidden" id="module" value="Install" />
<input type="hidden" id="view" value="Index" />
<div class="container-fluid page-container">
	<div class="row">
		<div class="col-sm-6">
			<div class="logo">
				<img src="<?php echo vimage_path('logo.png');?>
"/>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="head pull-right">
				<h3><?php echo vtranslate('LBL_INSTALLATION_WIZARD','Install');?>
</h3>
			</div>
		</div>
	</div>
<?php }
}
