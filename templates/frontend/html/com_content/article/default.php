<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params  = $this->item->params;
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = JFactory::getUser();
$info    = $params->get('info_block_position', 0);

// Check if associations are implemented. If they are, define the parameter.
$assocParam = (JLanguageAssociations::isEnabled() && $params->get('show_associations'));
JHtml::_('behavior.caption');

$currentDate       = JFactory::getDate()->format('Y-m-d H:i:s');
$isNotPublishedYet = $this->item->publish_up > $currentDate;
$isExpired         = $this->item->publish_down < $currentDate && $this->item->publish_down !== JFactory::getDbo()->getNullDate();

?>
<main>
<div class="container">
    <div class="quiz-card">
        
            <h1 class="item">
                <?php echo $this->escape($this->item->title); ?>

            </h1>
            <p class="item frage">
                <?php echo $this->escape($this->item->jcfields[14]->value); ?>
            </p>

            <div class="item">
                <input type="checkbox" id="scales" name="scales">
                <label>
                    <?php echo $this->escape($this->item->jcfields[9]->value); ?>
                </label>
            </div>
            <div class="item">
                <input type="checkbox" id="scales" name="scales">
                <label>
                    <?php echo $this->escape($this->item->jcfields[10]->value); ?>
                </label>
            </div>
            <div class="item">
                <input type="checkbox" id="scales" name="scales">
                <label>
                    <?php echo $this->escape($this->item->jcfields[11]->value); ?>
                </label>
            </div>
            <div class="item">
                <input type="checkbox" id="scales" name="scales">
                <label>
                    <?php echo $this->escape($this->item->jcfields[12]->value); ?>
                </label>
            </div>

        <meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>" />


        <?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '0')) || ($params->get('urls_position') == '0' && empty($urls->urls_position)))
            || (empty($urls->urls_position) && (!$params->get('urls_position')))) : ?>
            <?php echo $this->loadTemplate('links'); ?>
        <?php endif; ?>
        <?php if ($params->get('access-view')) : ?>
            <?php echo JLayoutHelper::render('joomla.content.full_image', $this->item); ?>
            <?php
            if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && !$this->item->paginationrelative) :
                echo $this->item->pagination;
            endif;
            ?>
            <?php if (isset ($this->item->toc)) :
                echo $this->item->toc;
            endif; ?>

            <?php if ($info == 1 || $info == 2) : ?>
                <?php if ($useDefList) : ?>
                    <?php // Todo: for Joomla4 joomla.content.info_block.block can be changed to joomla.content.info_block ?>
                    <?php echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'below')); ?>
                <?php endif; ?>
                <?php if ($params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
                    <?php $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
                    <?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
                <?php endif; ?>
            <?php endif; ?>

            <?php
            if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && !$this->item->paginationrelative) :
                echo $this->item->pagination;
                ?>
            <?php endif; ?>
            <?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '1')) || ($params->get('urls_position') == '1'))) : ?>
                <?php echo $this->loadTemplate('links'); ?>
            <?php endif; ?>
            <?php // Optional teaser intro text for guests ?>
        <?php elseif ($params->get('show_noauth') == true && $user->get('guest')) : ?>
            <?php echo JLayoutHelper::render('joomla.content.intro_image', $this->item); ?>
            <?php echo JHtml::_('content.prepare', $this->item->introtext); ?>
            <?php // Optional link to let them register to see the whole article. ?>
            <?php if ($params->get('show_readmore') && $this->item->fulltext != null) : ?>
                <?php $menu = JFactory::getApplication()->getMenu(); ?>
                <?php $active = $menu->getActive(); ?>
                <?php $itemId = $active->id; ?>
                <?php $link = new JUri(JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false)); ?>
                <?php $link->setVar('return', base64_encode(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language))); ?>

            <?php endif; ?>
        <?php endif; ?>
        <?php
        if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && $this->item->paginationrelative) :
            echo $this->item->pagination;
            ?>
        <?php endif; ?>
        <?php // Content is generated by content plugin event "onContentAfterDisplay" ?>
        <?php echo $this->item->event->afterDisplayContent; ?>
        

    </div>

    </div>  
    

         

</main>
