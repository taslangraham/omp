<?php

/**
 * @file classes/manager/form/setup/PressSetupStep4Form.inc.php
 *
 * Copyright (c) 2003-2008 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class PressSetupStep4Form
 * @ingroup manager_form_setup
 *
 * @brief Form for Step 4 of the press setup.
 */

// $Id$


import("manager.form.setup.PressSetupForm");

class PressSetupStep4Form extends PressSetupForm {
	/**
	 * Constructor.
	 */
	function PressSetupStep4Form() {
		parent::PressSetupForm(
			4,
			array(
				'disableUserReg' => 'bool',
				'allowRegReader' => 'bool',
				'allowRegAuthor' => 'bool',
				'allowRegReviewer' => 'bool',
				'restrictSiteAccess' => 'bool',
				'restrictMonographAccess' => 'bool',
				'monographEventLog' => 'bool',
				'monographEmailLog' => 'bool',
				'showGalleyLinks' => 'bool',
				'openAccessPolicy' => 'string',
				'enableAnnouncements' => 'bool',
				'enableAnnouncementsHomepage' => 'bool',
				'numAnnouncementsHomepage' => 'int',
				'announcementsIntroduction' => 'string',
				'volumePerYear' => 'int',
				'enableLockss' => 'bool',
				'lockssLicense' => 'string',
				'reviewerDatabaseLinks' => 'object',
				'enablePublicMonographId' => 'bool',
				'enablePublicGalleyId' => 'bool',
				'enablePublicSuppFileId' => 'bool',
				'enablePageNumber' => 'bool'
			)
		);
	}

	/**
	 * Get the list of field names for which localized settings are used.
	 * @return array
	 */
	function getLocaleFieldNames() {
		return array('pubFreqPolicy', 'openAccessPolicy', 'announcementsIntroduction', 'lockssLicense');
	}

	/**
	 * Assign form data to user-submitted data.
	 */
	function readInputData() {
		$this->readUserVars(array('newBookFileType', 'bookFileTypeSelect'));
		parent::readInputData();
	}

	/**
	 * Display the form
	 */
	function display() {
		$press =& Request::getPress();
		$templateMgr =& TemplateManager::getManager();
		$templateMgr->assign_by_ref('bookFileTypes', $press->getSetting('bookFileTypes'));
		parent::display();
	}
}

?>
