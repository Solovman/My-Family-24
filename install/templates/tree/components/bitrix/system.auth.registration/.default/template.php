<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}

?>
<div class="bx-auth container">
<?
if (!empty($arParams["~AUTH_RESULT"]))
{
	ShowMessage($arParams["~AUTH_RESULT"]);
}
?>
<?if($arResult["SHOW_EMAIL_SENT_CONFIRMATION"]):?>
	<p><?echo GetMessage("AUTH_EMAIL_SENT")?></p>
<?endif;?>

<?if(!$arResult["SHOW_EMAIL_SENT_CONFIRMATION"] && $arResult["USE_EMAIL_CONFIRMATION"] === "Y"):?>
	<p><?echo GetMessage("AUTH_EMAIL_WILL_BE_SENT")?></p>
<?endif?>
<noindex>

<?if($arResult["SHOW_SMS_FIELD"] == true):?>

<form method="post" action="<?=$arResult["AUTH_URL"]?>" name="regform">
<input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />
<table class="data-table bx-registration-table">
	<tbody>
		<tr>
			<td><span class="starrequired">*</span><?echo GetMessage("main_register_sms_code")?></td>
			<td><input size="30" type="text" name="SMS_CODE" value="<?=htmlspecialcharsbx($arResult["SMS_CODE"])?>" autocomplete="off" /></td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<td></td>
			<td><input type="submit" name="code_submit_button" value="<?echo GetMessage("main_register_sms_send")?>" /></td>
		</tr>
	</tfoot>
</table>
</form>

<script>
new BX.PhoneAuth({
	containerId: 'bx_register_resend',
	errorContainerId: 'bx_register_error',
	interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
	data:
		<?=CUtil::PhpToJSObject([
			'signedData' => $arResult["SIGNED_DATA"],
		])?>,
	onError:
		function(response)
		{
			var errorDiv = BX('bx_register_error');
			var errorNode = BX.findChildByClassName(errorDiv, 'errortext');
			errorNode.innerHTML = '';
			for(var i = 0; i < response.errors.length; i++)
			{
				errorNode.innerHTML = errorNode.innerHTML + BX.util.htmlspecialchars(response.errors[i].message) + '<br>';
			}
			errorDiv.style.display = '';
		}
});
</script>

<div id="bx_register_error" style="display:none"><?ShowError("error")?></div>

<div id="bx_register_resend"></div>

<?elseif(!$arResult["SHOW_EMAIL_SENT_CONFIRMATION"]):?>

<form id="tab_2" class="main__form main__tabs-item" method="post" action="<?=$arResult["AUTH_URL"]?>" name="bform" enctype="multipart/form-data">
	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="REGISTRATION" />

<table class="data-table bx-registration-table">
	<tbody>
		<tr>
			<td class="main__title-input"><?=GetMessage("AUTH_NAME")?></td>
			<td class="main__container-input">
				<span class="main__icon-input-reg">
					<svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle cx="12" cy="6" r="4" stroke="#37a969" stroke-width="1.5"/>
						<path d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z" stroke="#37a969" stroke-width="1.5"/>
					</svg>
				</span>
				<input type="text" name="USER_NAME" maxlength="50" value="<?=$arResult["USER_NAME"]?>" class="bx-auth-input main__input-form" />
			</td>
		</tr>
		<tr>
			<td class="main__title-input"><?=GetMessage("AUTH_LAST_NAME")?></td>
			<td class="main__container-input">
				<span class="main__icon-input-reg">
					<svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle cx="12" cy="6" r="4" stroke="#37a969" stroke-width="1.5"/>
						<path d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z" stroke="#37a969" stroke-width="1.5"/>
					</svg>
				</span>
				<input type="text" name="USER_LAST_NAME" maxlength="50" value="<?=$arResult["USER_LAST_NAME"]?>" class="bx-auth-input main__input-form" />
			</td>
		</tr>
		<tr>
			<td class="main__title-input"><span class="starrequired">*</span><?=GetMessage("AUTH_LOGIN_MIN")?></td>
			<td class="main__container-input">
				<span class="main__icon-input-reg">
					<svg width="20px" height="20px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
						<circle cx="512" cy="512" r="512" style="fill:#37a969"/>
						<path d="m458.15 617.7 18.8-107.3a56.94 56.94 0 0 1 35.2-101.9V289.4h-145.2a56.33 56.33 0 0 0-56.3 56.3v275.8a33.94 33.94 0 0 0 3.4 15c12.2 24.6 60.2 103.7 197.9 164.5V622.1a313.29 313.29 0 0 1-53.8-4.4zM656.85 289h-144.9v119.1a56.86 56.86 0 0 1 35.7 101.4l18.8 107.8A320.58 320.58 0 0 1 512 622v178.6c137.5-60.5 185.7-139.9 197.9-164.5a33.94 33.94 0 0 0 3.4-15V345.5a56 56 0 0 0-16.4-40 56.76 56.76 0 0 0-40.05-16.5z" style="fill:#fff"/>
					</svg>
				</span>
				<input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["USER_LOGIN"]?>" class="bx-auth-input main__input-form" />
			</td>
		</tr>
		<tr>
			<td class="main__title-input"><span class="starrequired">*</span><?=GetMessage("AUTH_PASSWORD_REQ")?></td>
			<td class="main__container-input">
				<span class="main__icon-input-reg">
					<svg fill="#000000" width="20px" height="20px" viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg">
						<defs>
							<style>
							  .cls-1 {
								  fill: none;
							  }
							</style>
						</defs>
						<path fill="#37a969" d="M21,2a8.9977,8.9977,0,0,0-8.6119,11.6118L2,24v6H8L18.3881,19.6118A9,9,0,1,0,21,2Zm0,16a7.0125,7.0125,0,0,1-2.0322-.3022L17.821,17.35l-.8472.8472-3.1811,3.1812L12.4141,20,11,21.4141l1.3787,1.3786-1.5859,1.586L9.4141,23,8,24.4141l1.3787,1.3786L7.1716,28H4V24.8284l9.8023-9.8023.8472-.8474-.3473-1.1467A7,7,0,1,1,21,18Z"/>
						<circle fill="#37a969" cx="22" cy="10" r="2"/>
						<rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32"/>
					</svg>
				</span>
				<input type="password" name="USER_PASSWORD" maxlength="255" value="<?=$arResult["USER_PASSWORD"]?>" class="bx-auth-input main__input-form" autocomplete="off" />
			</td>
		</tr>
		<tr>
			<td class="main__title-input"><span class="starrequired">*</span><?=GetMessage("AUTH_CONFIRM")?></td>
			<td class="main__container-input">
				<span class="main__icon-input-reg">
					<svg fill="#000000" width="20px" height="20px" viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg">
						<defs>
							<style>
							  .cls-1 {
								  fill: none;
							  }
							</style>
						</defs>
						<path fill="#37a969" d="M21,2a8.9977,8.9977,0,0,0-8.6119,11.6118L2,24v6H8L18.3881,19.6118A9,9,0,1,0,21,2Zm0,16a7.0125,7.0125,0,0,1-2.0322-.3022L17.821,17.35l-.8472.8472-3.1811,3.1812L12.4141,20,11,21.4141l1.3787,1.3786-1.5859,1.586L9.4141,23,8,24.4141l1.3787,1.3786L7.1716,28H4V24.8284l9.8023-9.8023.8472-.8474-.3473-1.1467A7,7,0,1,1,21,18Z"/>
						<circle fill="#37a969" cx="22" cy="10" r="2"/>
						<rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32"/>
					</svg>
				</span>
				<input type="password" name="USER_CONFIRM_PASSWORD" maxlength="255" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" class="bx-auth-input main__input-form" autocomplete="off" />
			</td>
		</tr>

<?if($arResult["EMAIL_REGISTRATION"]):?>
		<tr>
			<td class="main__title-input"><?if($arResult["EMAIL_REQUIRED"]):?><span class="starrequired">*</span><?endif?><?=GetMessage("AUTH_EMAIL")?></td>
			<td class="main__container-input">
				<span class="main__icon-input-reg">
					<svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 5.25L3 6V18L3.75 18.75H20.25L21 18V6L20.25 5.25H3.75ZM4.5 7.6955V17.25H19.5V7.69525L11.9999 14.5136L4.5 7.6955ZM18.3099 6.75H5.68986L11.9999 12.4864L18.3099 6.75Z" fill="#37a969"/>
					</svg>
				</span>
				<input type="text" name="USER_EMAIL" maxlength="255" value="<?=$arResult["USER_EMAIL"]?>" class="bx-auth-input main__input-form" />
			</td>
		</tr>
<?endif?>


<?// ********************* User properties ***************************************************?>
<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
	<tr><td colspan="2"><?=trim($arParams["USER_PROPERTY_NAME"]) <> '' ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?></td></tr>
	<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
	<tr><td><?if ($arUserField["MANDATORY"]=="Y"):?><span class="starrequired">*</span><?endif;
		?><?=$arUserField["EDIT_FORM_LABEL"]?>:</td><td>
			<?$APPLICATION->IncludeComponent(
				"bitrix:system.field.edit",
				$arUserField["USER_TYPE"]["USER_TYPE_ID"],
				array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "bform"), null, array("HIDE_ICONS"=>"Y"));?></td></tr>
	<?endforeach;?>
<?endif;?>
		<tr>
			<td>
				<?$APPLICATION->IncludeComponent("bitrix:main.userconsent.request", "",
					array(
						"ID" => COption::getOptionString("main", "new_user_agreement", ""),
						"IS_CHECKED" => "Y",
						"AUTO_SAVE" => "N",
						"IS_LOADED" => "Y",
						"ORIGINATOR_ID" => $arResult["AGREEMENT_ORIGINATOR_ID"],
						"ORIGIN_ID" => $arResult["AGREEMENT_ORIGIN_ID"],
						"INPUT_NAME" => $arResult["AGREEMENT_INPUT_NAME"],
						"REPLACE" => array(
							"button_caption" => GetMessage("AUTH_REGISTER"),
							"fields" => array(
								rtrim(GetMessage("AUTH_NAME"), ":"),
								rtrim(GetMessage("AUTH_LAST_NAME"), ":"),
								rtrim(GetMessage("AUTH_LOGIN_MIN"), ":"),
								rtrim(GetMessage("AUTH_PASSWORD_REQ"), ":"),
								rtrim(GetMessage("AUTH_EMAIL"), ":"),
							)
						),
					)
				);?>
			</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="2">
				<input class="main__button-form" type="submit" name="Register" value="<?=GetMessage("AUTH_REGISTER")?>" />
			</td>
		</tr>
	</tfoot>
</table>
</form>

<script type="text/javascript">
document.bform.USER_NAME.focus();
</script>

<?endif?>

</noindex>
</div>