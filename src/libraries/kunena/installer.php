<?php
/**
 * Kunena Component
 *
 * @package        Kunena.Framework
 *
 * @copyright      Copyright (C) 2008 - 2020 Kunena Team. All rights reserved.
 * @license        https://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link           https://www.kunena.org
 **/

namespace Joomla\Component\Kunena;

defined('_JEXEC') or die();

use Joomla\CMS\Factory;
use function defined;

/**
 * Class KunenaInstaller
 *
 * @since   Kunena 6.0
 */
class KunenaInstaller
{
	/**
	 * @var     array
	 * @since   Kunena 6.0
	 */
	protected static $downgrade = ['3.1' => '3.0.95'];

	/**
	 * @var     null
	 * @since   Kunena 6.0
	 */
	protected static $tables = null;

	/**
	 * Check if we are allowed to downgrade from the new to the old version.
	 *
	 * @param   string  $version  version
	 *
	 * @return  boolean|void  True if version can be safely downgraded.
	 *
	 * @since   Kunena 6.0
	 */
	public static function canDowngrade($version)
	{
		if ($version == '@' . 'kunenaversion' . '@')
		{
			return true;
		}

		foreach (self::$downgrade as $major => $minor)
		{
			if (version_compare($version, $major, "<"))
			{
				continue;
			}

			if (version_compare($version, $minor, ">="))
			{
				return true;
			}
		}

		return;
	}

	/**
	 * Get Kunena database schema version.
	 *
	 * @return  string  Version number or null.
	 *
	 * @since   Kunena 6.0
	 */
	public static function getSchemaVersion()
	{
		// Check if Kunena can be found from the database.
		if (!self::detectTable('kunena_version'))
		{
			return false;
		}

		// Get installed version.
		$db    = Factory::getDBO();
		$query = $db->getQuery(true);
		$query->select('version')
			->from($db->quoteName('#__kunena_version'))
			->where($db->quoteName('state') . "=''")
			->order($db->quoteName('id') . ' DESC');
		$query->setLimit(1);
		$db->setQuery($query);
		$version = $db->loadResult();

		return $version;
	}

	/**
	 * Detect if table exists in the database.
	 *
	 * @param   string  $table   Table name to be found.
	 * @param   string  $prefix  Database prefix.
	 * @param   bool    $reload  Reload all tables.
	 *
	 * @return  boolean  True if the table exists in the database.
	 *
	 * @since   Kunena 6.0
	 */
	public static function detectTable($table, $prefix = '#__', $reload = false)
	{
		$db = Factory::getDBO();

		if (self::$tables === null || $reload)
		{
			$list = $db->getTableList();

			self::$tables = [];

			foreach ($list as $item)
			{
				self::$tables[$item] = false;
			}
		}

		if ($prefix == '#__')
		{
			$prefix = $db->getPrefix();
		}

		$table = $prefix . $table;

		return isset(self::$tables[$table]);
	}

	/**
	 * Get column type in the table.
	 *
	 * @param   string   $table   Table name to be found.
	 * @param   string   $column  Table column to be searched.
	 * @param   string   $prefix  Database prefix.
	 * @param   boolean  $reload  Reload all tables.
	 *
	 * @return  boolean|null Column type or NULL if either table or column does not exist.
	 *
	 * @since   Kunena 6.0
	 */
	public static function getTableColumn($table, $column, $prefix = '#__', $reload = false)
	{
		if (!self::detectTable($table, $prefix, $reload))
		{
			return false;
		}

		$db = Factory::getDBO();

		if ($prefix == '#__')
		{
			$prefix = $db->getPrefix();
		}

		$table = $prefix . $table;

		if (!isset(self::$tables[$table]['columns']))
		{
			self::$tables[$table]['columns'] = $db->getTableColumns($table);
		}

		return isset(self::$tables[$table]['columns'][$column]) ? self::$tables[$table]['columns'][$column] : null;
	}
}
