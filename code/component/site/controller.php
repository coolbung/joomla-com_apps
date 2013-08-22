<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Contact Component Controller
 *
 * @package     Joomla.Site
 * @subpackage  com_contact
 * @since       1.5
 */
class AppsController extends JControllerLegacy
{
	/**
	 * Method to display a view.
	 *
	 * @param   boolean			If true, the view output will be cached
	 * @param   array  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  JController		This object to support chaining.
	 * @since   1.5
	 */
	public function display($cachable = false, $urlparams = false)
	{
		$cachable = true;
		$noforceraw = array();
		
		// Set the default view name and format from the Request.
		$vName = $this->input->get('view', 'dashboard');
		$this->input->set('view', $vName);

		// Majority views will be raw, lets make it easy & error proof on the client side
		if (!in_array($vName, $noforceraw)) {
			$this->input->set('format', 'raw');
		}

		parent::display($cachable, $urlparams);

		return $this;
	}
}
