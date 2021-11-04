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

		<div class="grid2 reverse top-margin">


            <div class="picture-text-box-header">


                <h1><?php echo($list[0]->jcfields[30]->rawvalue)?></h1>
                <h3><?php echo($list[0]->jcfields[31]->rawvalue)?></h3>
                <p><?php echo($list[0]->jcfields[29]->rawvalue)?></p>
                <a href="http://localhost:8888/index.php?option=com_content&view=category&layout=blog&id=10&Itemid=104"><button >
                    Virtuellen Rundgang starten
                </button></a>
            </div>
			<div class="picture-text-box">
			<img src="<?php echo($list[0]->jcfields[28]->rawvalue)?>" class="img-text">
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