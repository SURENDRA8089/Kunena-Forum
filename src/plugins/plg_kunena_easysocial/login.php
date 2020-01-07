<?php
/**
 * @package        EasySocial
 * @copyright      Copyright (C) 2010 - 2014 Stack Ideas Sdn Bhd. All rights reserved.
 * @license        GNU/GPL, see LICENSE.php
 * EasySocial is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

namespace Joomla\Component\Kunena;

defined('_JEXEC') or die('Unauthorized Access');

use Joomla\CMS\Component\ComponentHelper;
use function defined;

/**
 * @package     Kunena
 *
 * @since   Kunena 6.0
 */
class KunenaLoginEasySocial
{
	/**
	 * @var     null
	 * @since   Kunena 6.0
	 */
	protected $params = null;

	/**
	 * KunenaLoginEasySocial constructor.
	 *
	 * @param   object  $params params
	 *
	 * @since   Kunena 6.0
	 */
	public function __construct($params)
	{
		$this->params = $params;
	}

	/**
	 * @return  mixed
	 *
	 * @since   Kunena 6.0
	 */
	public function getLoginURL()
	{
		return FRoute::dashboard();
	}

	/**
	 * @return  mixed
	 *
	 * @since   Kunena 6.0
	 */
	public function getLogoutURL()
	{
		return FRoute::dashboard();
	}

	/**
	 * @return  null
	 *
	 * @since   Kunena 6.0
	 */
	public function getRegistrationURL()
	{
		$usersConfig = ComponentHelper::getParams('com_users');

		if ($usersConfig->get('allowUserRegistration'))
		{
			return FRoute::registration();
		}

		return null;
	}
}
