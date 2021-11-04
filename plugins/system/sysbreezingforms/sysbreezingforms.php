<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.log
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Joomla! System Logging Plugin.
 *
 * @since  1.5
 */
class PlgSystemSysbreezingforms extends JPlugin
{

    public function onBeforeRender(){

        if(!file_exists(JPATH_ADMINISTRATOR . '/components/com_breezingforms/breezingforms.php')){ return; }

        $app = JFactory::getApplication();

        try {

            if( JFactory::getApplication()->isAdmin() &&
                (
                    (
                        $app->input->getString('option') == 'com_breezingforms' &&
                        $app->input->getString('act', '') != '' &&
                        $app->input->getString('act', '') != 'configuration'
                    )
                    ||
                    $app->input->getString('option') == 'com_installer' &&
                    $app->input->getString('view', '') == 'update'
                )
            ){

                $message = 'Please enter your update key in the BreezingForms configuration.<br />Without this key you won\'t be able to receive future upates.<br />You can get your personal update key at Crosstec.org in the My Account => My Downloads section after login.<br />If your membership is expired, you can renew it by <a style="font-weight: bold; text-decoration: underline;" target="_blank" href="https://crosstec.org/en/downloads/joomla-forms.html">purchasing a membership</a>.';

                $db = JFactory::getDbo();
                $db->setQuery("Select extra_query From #__update_sites Where `name` = 'BreezingForms Pro' And `type` = 'extension'");
                $query = $db->loadResult();

                $exp = explode('=', $query);
                if(isset($exp[1])) {
                    $exp = explode('-', $exp[1]);

                    if (is_numeric($exp[0])) {

                        if($exp[0] > 0) { // 0 = unlimited

                            $time = strtotime(JHTML::_('date', 'now', 'Y-m-d H:i:s', false));

                            if ($time > $exp[0]) {

                                $message = 'Your membership for the update key seems to be expired, you can renew it by <a style="font-weight: bold; text-decoration: underline;" target="_blank" href="https://crosstec.org/en/downloads/joomla-forms.html">purchasing a membership</a>.<br/>After purchase, please get the update key from My Account => My Downloads at Crosstec.org and enter it in the BreezingForms configuration.';

                                $query = '';
                            }
                        }

                    } else {

                        $query = '';
                    }

                }else{

                    $query = '';
                }

                if(trim($query) == '') {

                    $breaks2 = '';
                    $breaks = '';
                    if ($app->input->getString('option') == 'com_installer' &&
                        $app->input->getString('view', '') == 'update') {
                        $breaks = '<br /><h4>BreezingForms Pro</h4>';
                        $breaks2 = '<br /><br />';
                    }
                    JFactory::getApplication()->enqueueMessage($breaks . $message . $breaks2, 'warning');
                }
            }

        }catch(Exception $e){

        }catch(Error $e){

        }
    }

    public function onAfterRender()
    {

        if(!file_exists(JPATH_ADMINISTRATOR . '/components/com_breezingforms/breezingforms.php')){ return; }

        $app = JFactory::getApplication();

        if( $app->input->getString('option') == 'com_menus' && $app->input->getString('view') == 'items' ){

            $body = JResponse::getBody();
            $body = str_replace('&lt;img src=../administrator/components/com_breezingforms/images/icons/component-menu-icons/bf_icon.png width=23px; /&gt;', '', $body);
            $body = str_replace('&lt;img src=../administrator/components/com_breezingforms/images/icons/component-menu-icons/bf_icon.png width=23; /&gt;', '', $body);
            JResponse::setBody($body);
        }
    }
}
