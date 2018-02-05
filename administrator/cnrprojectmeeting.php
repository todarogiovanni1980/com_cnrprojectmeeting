<?php
/**
 * @version    CVS: 2.4
 * @package    Com_Cnrprojectmeeting
 * @author     Todaro Giovanni <giovanni.todaro@itd.cnr.it>
 * @copyright  Copyright (C) 2014. Tutti i diritti riservati.
 * @license    GNU General Public License versione 2 o successiva; vedi LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_cnrprojectmeeting'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Cnrprojectmeeting', JPATH_COMPONENT_ADMINISTRATOR);
JLoader::register('CnrprojectmeetingHelper', JPATH_COMPONENT_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'cnrprojectmeeting.php');

$controller = JControllerLegacy::getInstance('Cnrprojectmeeting');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
