<?php

use Bitrix\Main\ModuleManager;
use Bitrix\Main\Config\Option;

function __treeMigrate(int $nextVersion, callable $callback): void
{
	global $DB;
	$moduleId = 'up.tree';

	if (!ModuleManager::isModuleInstalled($moduleId))
	{
		return;
	}

	$currentVersion = (int)Option::get($moduleId, '~database_schema_version', 0);

	if ($currentVersion < $nextVersion)
	{
		include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/classes/general/update_class.php');
		$updater = new \CUpdater();
		$updater->Init('', 'mysql', '', '', $moduleId, 'DB');

		$callback($updater, $DB, 'mysql');
		Option::set($moduleId, '~database_schema_version', $nextVersion);
	}
}

__treeMigrate(2, static function ($updater, $DB)
{
	if ($updater->CanUpdateDatabase() && !$updater->TableExists('up_relation_married'))
	{
		$DB->query('CREATE TABLE up_relation_married (
					PERSON_ID INT NOT NULL ,
					PARTNER_ID INT NOT NULL ,
					PRIMARY KEY (PERSON_ID, PARTNER_ID)
			);');
	}
});

