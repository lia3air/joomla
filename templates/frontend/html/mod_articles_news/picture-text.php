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
		<div class="grid2">
			<div class="picture-text-box">
			<img src="<?php echo($list[0]->jcfields[27]->rawvalue)?>" class="img-text">
			</div>
			<div class="picture-text-box-text">
			
				
				<h2 class="text"><?php echo($list[0]->jcfields[25]->rawvalue)?></h2>
				<p class="text"><?php echo($list[0]->jcfields[26]->rawvalue)?></p>
				
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