<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CMain $APPLICATION
 */

?>

<?php if (!(new CUser)->IsAuthorized()): ?>
<section class="main__container">
	<h1 class="main__heading">Family Tree</h1>
	<div class="main__tabs-nav">
		<button  class="main__tabs-button main__tabs-button_login _active" data-tab="tab_1"><?= GetMessage('UP_FAMILY_TREE_BUTTON_SIGN_IN_TAB') ?></button>
		<button class="main__tabs-button main__tabs-button_register" data-tab="tab_2"><?= GetMessage('UP_FAMILY_TREE_BUTTON_REGISTER_TAB') ?></button>
	</div>
	<?php
		$APPLICATION->IncludeComponent("bitrix:system.auth.form", "", ["SHOW_ERRORS" => "Y"]);
		$APPLICATION->IncludeComponent("bitrix:system.auth.registration", "", ["SHOW_ERRORS" => "Y"]);
	?>
</section>
<?php endif; ?>
