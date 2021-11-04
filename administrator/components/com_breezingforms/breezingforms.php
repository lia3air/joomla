<?php
/**
 * @package     BreezingForms
 * @author      Markus Bopp
 * @link        https://www.crosstec.org
 * @license     GNU/GPL
*/
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

if(!defined('DS')){
    define('DS', DIRECTORY_SEPARATOR);
}

jimport('joomla.version');
$version = new JVersion();

if(version_compare($version->getShortVersion(), '3.0', '>=')){

    $controller = JControllerLegacy::getInstance('Breezingforms');
    $controller->execute('');
    $controller->redirect();

}

require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_breezingforms'.DS.'admin.breezingforms.php');

if(version_compare($version->getShortVersion(), '3.2', '>=')) {

	if( JFactory::getApplication()->getTemplate() == 'isis' ) {

		JFactory::getDocument()->addScript( JUri::root( true ) . '/administrator/components/com_breezingforms/assets/js/custom.js' );
		JFactory::getDocument()->addStyleSheet( JUri::root( true ) . '/administrator/components/com_breezingforms/assets/css/custom.css' );

	}
}

JFactory::getDocument()->addStyleSheet(JUri::root(true) .'/administrator/components/com_breezingforms/assets/font-awesome/css/font-awesome.css');

if(version_compare($version->getShortVersion(), '3.0', '>=')){

    $recs        = JRequest::getVar('act','') == 'managerecs' || JRequest::getVar('act','') == 'recordmanagement' || JRequest::getVar('act','') == '';
    $mgforms     = JRequest::getVar('act','') == 'manageforms' || JRequest::getVar('act','') == 'easymode' || JRequest::getVar('act','') == 'quickmode';
    $mgscripts   = JRequest::getVar('act','') == 'managescripts';
    $mgpieces    = JRequest::getVar('act','') == 'managepieces';
    $mgintegrate = JRequest::getVar('act','') == 'integrate';
    $mgmenus     = JRequest::getVar('act','') == 'managemenus';
    $mgconfig    = JRequest::getVar('act','') == 'configuration';

    $add = '';
    if($recs) $add        = ': ' . JText::_('COM_BREEZINGFORMS_MANAGERECS');
    if($mgforms) $add     = ': ' . JText::_('COM_BREEZINGFORMS_MANAGEFORMS');
    if($mgscripts) $add   = ': ' . JText::_('COM_BREEZINGFORMS_MANAGESCRIPTS');
    if($mgpieces) $add    = ': ' . JText::_('COM_BREEZINGFORMS_MANAGEPIECES');
    if($mgintegrate) $add = ': ' . JText::_('COM_BREEZINGFORMS_INTEGRATOR');
    if($mgmenus) $add     = ': ' . JText::_('COM_BREEZINGFORMS_MANAGEMENUS');
    if($mgconfig) $add    = ': ' . JText::_('COM_BREEZINGFORMS_CONFIG');

    $app = JFactory::getApplication();
    $app->JComponentTitle = "BreezingForms" . $add;
    if(version_compare($version->getShortVersion(), '3.2', '>=')){
        $app->JComponentTitle = "<h1 class=\"page-title\">BreezingForms" . $add . '</h1>';
    }
}