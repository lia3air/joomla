<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<main>
	<section class="section">
		<div class="grid">
			<div class="picture-text-box">
			<img src="<?php echo($list[0]->jcfields[21]->rawvalue)?>" class="img-list">
                <h2><?php echo($list[0]->jcfields[32]->rawvalue)?></h2>
				<p><?php echo($list[0]->jcfields[24]->rawvalue)?></p>
			</div>
			<div class="picture-text-box">
			<img src="<?php echo($list[0]->jcfields[20]->rawvalue)?>" class="img-list">
                <h2><?php echo($list[0]->jcfields[33]->rawvalue)?></h2>
				<p><?php echo($list[0]->jcfields[23]->rawvalue)?></p>
			</div>
			<div class="picture-text-box">
			<img src="<?php echo($list[0]->jcfields[19]->rawvalue)?>" class="img-list">
                <h2><?php echo($list[0]->jcfields[34]->rawvalue)?></h2>
				<p><?php echo($list[0]->jcfields[22]->rawvalue)?></p>
			</div>
		</div>
	</section>
</main>	


<!--
<div class="newsflash<?php echo $moduleclass_sfx; ?>">
	<?php foreach ($list as $item) : ?>
		<?php require JModuleHelper::getLayoutPath('mod_articles_news', '_item'); ?>
	<?php endforeach; ?>
</div>
	-->

