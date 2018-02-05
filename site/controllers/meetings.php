<?php
/**
 * @version    CVS: 2.4
 * @package    Com_Cnrprojectmeeting
 * @author     Todaro Giovanni <giovanni.todaro@itd.cnr.it>
 * @copyright  Copyright (C) 2014. Tutti i diritti riservati.
 * @license    GNU General Public License versione 2 o successiva; vedi LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Meetings list controller class.
 *
 * @since  1.6
 */
class CnrprojectmeetingControllerMeetings extends CnrprojectmeetingController
{
	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional
	 * @param   array   $config  Configuration array for model. Optional
	 *
	 * @return object	The model
	 *
	 * @since	1.6
	 */
	public function &getModel($name = 'Meetings', $prefix = 'CnrprojectmeetingModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}
}
