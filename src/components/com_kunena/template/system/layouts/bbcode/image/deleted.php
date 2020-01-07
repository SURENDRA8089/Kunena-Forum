<?php
/**
 * Kunena Component
 *
 * @package         Kunena.Template.Aurelia
 * @subpackage      BBCode
 *
 * @copyright       Copyright (C) 2008 - 2020 Kunena Team. All rights reserved.
 * @license         https://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link            https://www.kunena.org
 **/

namespace Joomla\Component\Kunena;

defined('_JEXEC') or die();

use function defined;

$title    = $this->title;
$url      = $this->url;
$filename = $this->filename;
$size     = $this->size;
?>
<div class="kmsgattach">
	<h4>
		<?php echo $title; ?>
	</h4>
</div>
