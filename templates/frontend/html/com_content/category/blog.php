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

JHtml::_('behavior.caption');

$dispatcher = JEventDispatcher::getInstance();

$this->category->text = $this->category->description;
$dispatcher->trigger('onContentPrepare', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$this->category->description = $this->category->text;

$results = $dispatcher->trigger('onContentAfterTitle', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$afterDisplayTitle = trim(implode("\n", $results));

$results = $dispatcher->trigger('onContentBeforeDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$beforeDisplayContent = trim(implode("\n", $results));

$results = $dispatcher->trigger('onContentAfterDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$afterDisplayContent = trim(implode("\n", $results));

?>


<main >
    <?php if ($this->category->description) : ?>
    <section class="section">

        <div class="background"></div>
        <div class="main-container ">
            <div class="side-infos">
                <div class=" paddingleft">
                    <h2> <?php echo $this->escape($this->params->get('page_heading')); ?> </h2>
                    <p> <?php echo $this->category->description ?> </p>
                </div>
                <div class="bubble">
                    <?php if (!empty($this->lead_items)) : ?>
                        <div class="items-leading clearfix">
                            <?php foreach ($this->lead_items as &$item) : ?>
                                <div class="leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>"
                                     itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
                                    <?php
                                    $this->item = &$item;
                                    echo $this->loadTemplate('austellung');
                                    ?>
                                </div>
                                <?php $leadingcount++; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </div>
                

            </div>
            <div class="main scroll">
                <div class="padding">
                    <?php if (!empty($this->lead_items)) : ?>
                        <div class="items-leading clearfix">
                            <?php foreach ($this->lead_items as &$item) : ?>
                                <div class="paddingright box leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>"
                                     itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
                                    <?php
                                    $this->item = &$item;
                                    echo $this->loadTemplate('item');
                                    ?>
                                </div>
                                <?php $leadingcount++; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>


    </section>
    <?php endif; ?>
    <?php if (!$this->category->description) : ?>
    <?php if (!empty($this->lead_items)) : ?>

        <div class="main-container-2">
            <div class="quiz-card-mini">
                <?php if (!empty($this->lead_items)) : ?>
                    <div class="items-leading clearfix">
                        <?php foreach ($this->lead_items as &$item) : ?>
                            <div class="leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>"
                                 itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
                                <?php
                                $this->item = &$item;
                                echo $this->loadTemplate('quiz');
                                ?>
                            </div>
                            <?php $leadingcount++; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>


        </div>
        <?php endif; ?>
    <?php endif; ?>


</main>
