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

$attachment = $this->attachment;
?>
<div class="kmsgaudio">
	<?php echo $this->subLayout('Attachment/Item')->set('attachment', $attachment); ?>
</div>
