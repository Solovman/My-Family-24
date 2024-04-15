<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CMain $APPLICATION
 * @var array $arResult
 */

\Bitrix\Main\UI\Extension::load('up.account');
?>

<div class="container">
	<div class="profile">
		<div id="data-profile"></div>
		<form method="post">
			<label for="newName" class="font-account">Имя:</label>
			<input type="text" id="newName" name="newName"><br>

			<label for="newSurname" class="font-account">Фамилия:</label>
			<input type="text" id="newSurname" name="newSurname"><br>

			<label for="newPassword" class="font-account">Новый пароль:</label>
			<input type="password" id="newPassword" name="newPassword"><br>

			<input type="submit" value="Изменить">
		</form>
	</div>
</div>

<script>
	BX.ready(function ()
	{
		const account = new BX.Up.Tree.Account({
			rootNodeId: 'data-profile',
		});
	});
</script>