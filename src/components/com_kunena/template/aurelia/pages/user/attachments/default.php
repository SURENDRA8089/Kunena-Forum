<?php
/**
 * Kunena Component
 *
 * @package       Kunena.Template.Aurelia
 * @subpackage    Pages.User
 *
 * @copyright     Copyright (C) 2008 - 2020 Kunena Team. All rights reserved.
 * @license       https://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link          https://www.kunena.org
 **/

namespace Joomla\Component\Kunena;

defined('_JEXEC') or die();

use function defined;

$content = $this->execute('User/Attachments');

$this->addBreadcrumb($content->headerText, 'index.php?option=com_kunena&view=user&layout=attachments');

echo $content;
