<?php
/**
 * @version 			SEBLOD 3.x More
 * @url				https://zhulinia.ru
 * @editor			Ilya A. Zhulin
 * @copyright		Copyright (C) 2022. All Rights Reserved.
 * @license 			GNU General Public License version 2 or later; see _LICENSE.php
 * */
defined('_JEXEC') or die;

JCckDev::initScript('live', $this->item);
?>

<div class="seblod">
	<?php echo JCckDev::renderLegend(JText::_('COM_CCK_CONSTRUCTION'), JText::_('PLG_CCK_FIELD_LIVE_' . $this->item->name . '_DESC')); ?>
    <ul class="adminformlist adminformlist-2cols">
		<?php
		echo JCckDev::renderForm('core_dev_text', '', $config, array('label' => 'Variable', 'storage_field' => 'variable', 'required' => 1));
		echo JCckDev::renderForm('core_dev_select', '', $config, array('label' => 'Source', 'selectlabel' => 'None', 'options' => 'Cookie=cookie||Session=session', 'bool8' => 0, 'storage_field' => 'source', 'required' => 1));
		?>
    </ul>
</div>