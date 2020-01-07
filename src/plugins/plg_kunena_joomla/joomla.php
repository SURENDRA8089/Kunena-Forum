<?php
/**
 * Kunena Plugin
 *
 * @package         Kunena.Plugins
 * @subpackage      Joomla
 *
 * @copyright       Copyright (C) 2008 - 2020 Kunena Team. All rights reserved.
 * @license         https://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link            https://www.kunena.org
 **/

namespace Joomla\Component\Kunena;

defined('_JEXEC') or die();

use Joomla\CMS\Plugin\CMSPlugin;
use function defined;

/**
 * Class plgKunenaJoomla
 *
 * @since   Kunena 6.0
 */
class plgKunenaJoomla extends CMSPlugin
{
	/**
	 * @param   object  $subject  subject
	 * @param   array   $config   config
	 *
	 * @since   Kunena 6.0
	 */
	public function __construct(&$subject, $config)
	{
		// Do not load if Kunena version is not supported or Kunena is offline
		if (!(class_exists('KunenaForum') && KunenaForum::isCompatible('4.0')))
		{
			return;
		}

		parent::__construct($subject, $config);

		$this->loadLanguage('plg_kunena_joomla.sys', JPATH_ADMINISTRATOR) || $this->loadLanguage('plg_kunena_joomla.sys', KPATH_ADMIN);
	}

	/**
	 * @return  KunenaAccessJoomla|void
	 *
	 * @since   Kunena 6.0
	 */
	public function onKunenaGetAccessControl()
	{
		if (!$this->params->get('access', 1))
		{
			return;
		}

		require_once __DIR__ . "/access.php";

		return new KunenaAccessJoomla($this->params);
	}

	/**
	 * @return  KunenaLoginJoomla|null
	 *
	 * @since   Kunena 6.0
	 */
	public function onKunenaGetLogin()
	{
		require_once __DIR__ . "/login.php";

		return new KunenaLoginJoomla($this->params);
	}
}
