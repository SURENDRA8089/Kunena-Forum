<?php
/**
 * Kunena Component
 *
 * @package         Kunena.Template.Aurelia
 * @subpackage      Layout.User
 *
 * @copyright       Copyright (C) 2008 - 2020 Kunena Team. All rights reserved.
 * @license         https://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link            https://www.kunena.org
**/

namespace Joomla\Component\Kunena;

defined('_JEXEC') or die();

use Joomla\CMS\Language\Text;
use function defined;

?>
<h3>
	<?php echo $this->headerText; ?>
</h3>

<table class="table table-bordered table-striped table-hover">
	<thead>
	<tr>
		<th class="col-md-1 center">
			#
		</th>
		<th class="col-md-4">
			<?php echo Text::_('COM_KUNENA_BAN_BANNEDUSER'); ?>
		</th>
		<th class="col-md-3">
			<?php echo Text::_('COM_KUNENA_BAN_BANNEDFROM'); ?>
		</th>
		<th class="col-md-2">
			<?php echo Text::_('COM_KUNENA_BAN_STARTTIME'); ?>
		</th>
		<th class="col-md-2">
			<?php echo Text::_('COM_KUNENA_BAN_EXPIRETIME'); ?>
		</th>
	</tr>
	</thead>
	<tbody>
	<?php
	if ($this->userBans)
		:
		$i = 0;

		foreach ($this->userBans as $banInfo)
			:
			$bantext = $banInfo->blocked
				? Text::_('COM_KUNENA_BAN_UNBLOCK_USER')
				: Text::_('COM_KUNENA_BAN_UNBAN_USER');
			?>
			<tr>
				<td class="center">
					<?php echo ++$i; ?>
				</td>
				<td>
					<?php echo $banInfo->getUser()->getLink(); ?>
				</td>
				<td>
					<?php echo $banInfo->blocked
						? Text::_('COM_KUNENA_BAN_BANLEVEL_JOOMLA')
						: Text::_('COM_KUNENA_BAN_BANLEVEL_KUNENA'); ?>
				</td>
				<td>
					<?php echo $banInfo->getCreationDate()->toKunena('datetime'); ?>
				</td>
				<td>
					<?php echo $banInfo->isLifetime()
						? Text::_('COM_KUNENA_BAN_LIFETIME')
						: $banInfo->getExpirationDate()->toKunena('datetime'); ?>
				</td>
			</tr>
		<?php endforeach; ?>

	<?php else

		:
		?>
		<tr>
			<td colspan="5">
				<?php echo Text::_('COM_KUNENA_BAN_NO_BANNED_USERS'); ?>
			</td>
		</tr>
	<?php endif; ?>

	</tbody>
</table>
