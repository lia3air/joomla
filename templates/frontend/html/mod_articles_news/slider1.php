<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$doc = JFactory::getDocument();
$doc->addCustomTag('<script src="templates/frontend/js/jquery.cycle2.js"></script>');

?>

<section class="slider-startseite cycle-slideshow <?php echo $moduleclass_sfx; ?>" data-cycle-slides="> article">
	<?php foreach ($list as $item) : ?>

		<article class="slide" >
			<h2><?php echo($item->title)?> </h2><br>
		</article>
		
	<?php endforeach; ?>
</section>

