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

jimport('joomla.application.component.controllerform');

/**
 * Meeting controller class.
 *
 * @since  1.6
 */
class CnrprojectmeetingControllerMeeting extends JControllerForm
{
	/**
	 * Constructor
	 *
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->view_list = 'meetings';
		parent::__construct();
	}
}
