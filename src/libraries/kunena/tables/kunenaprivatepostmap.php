<?php
/**
 * Kunena Component
 *
 * @package       Kunena.Framework
 * @subpackage    Tables
 *
 * @copyright (C) 2008 - 2020 Kunena Team. All rights reserved.
 * @license       http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link          http://www.kunena.org
 **/

namespace Joomla\Component\Kunena;

defined('_JEXEC') or die();

use Joomla\Database\DatabaseDriver;
use function defined;

require_once __DIR__ . '/kunena.php';

/**
 * Kunena Private Message map to forum posts.
 * Provides access to the #__kunena_private_post_map table
 *
 * @since   Kunena 6.0
 */
class TableKunenaPrivatePostMap extends KunenaTable
{
	/**
	 * @var     boolean
	 * @since   Kunena 6.0
	 */
	protected $_autoincrement = false;

	/**
	 * @var     null
	 * @since   Kunena 6.0
	 */
	public $private_id = null;

	/**
	 * @var     null
	 * @since   Kunena 6.0
	 */
	public $message_id = null;

	/**
	 * TableKunenaPrivatePostMap constructor.
	 *
	 * @param   DatabaseDriver  $db database driver
	 *
	 * @since   Kunena 6.0
	 */
	public function __construct($db)
	{
		parent::__construct('#__kunena_private_post_map', ['private_id', 'message_id'], $db);
	}
}
