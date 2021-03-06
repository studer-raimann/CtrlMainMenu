<?php

namespace srag\Plugins\CtrlMainMenu\AdvancedSelectionListDropdown;

use ctrlmmEntryGUI;
use ilAdvancedSelectionListGUI;
use ilTemplate;
use srag\Plugins\CtrlMainMenu\Config\ilCtrlMainMenuConfig;
use srag\Plugins\CtrlMainMenu\Menu\ctrlmmMenu;

/* Copyright (c) 1998-2010 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * ctrlmmEntryAdvancedSelectionListDropdownGUI
 *
 * @package srag\Plugins\CtrlMainMenu\AdvancedSelectionListDropdow
 *
 * @author  Timon Amstutz <timon.amstutz@ilub.unibe.ch>
 * @author  Fabian Schmid <fs@studer-raimann.ch>
 *
 * @version 2.0.02
 *
 */
abstract class ctrlmmEntryAdvancedSelectionListDropdownGUI extends ctrlmmEntryGUI {

	/**
	 * @var ilAdvancedSelectionListGUI
	 */
	protected $selection = NULL;
	/**
	 * @var ilTemplate
	 */
	protected $html;


	/**
	 * @return string
	 */
	public function renderEntry($entry_div_id = '') {
		unset($entry_div_id);
		$this->selection = new ilAdvancedSelectionListGUI();

		$this->selection->setSelectionHeaderClass(($this->entry->isActive() ? ilCtrlMainMenuConfig::getConfigValue(ilCtrlMainMenuConfig::F_CSS_ACTIVE) : ilCtrlMainMenuConfig::getConfigValue(ilCtrlMainMenuConfig::F_CSS_INACTIVE)));

		$this->selection->setSelectionHeaderSpanClass('MMSpan');
		$this->selection->setHeaderIcon('down_arrow_dark');

		$this->selection->setItemLinkClass('small');
		$this->selection->setUseImages(false);

		$this->customizeAdvancedSelectionList();

		$this->html = self::plugin()->template('tpl.admin_entry.html', false, false);
		$this->html->setVariable('TITLE', $this->entry->getTitle());
		$this->html->setVariable('DROPDOWN', $this->selection->getHTML());
		$this->html->setVariable('CSS_PREFIX', ctrlmmMenu::getCssPrefix());

		$this->overrideContent();

		return $this->html->get();
	}


	protected function overrideContent() {
	}


	/**
	 *
	 */
	abstract protected function customizeAdvancedSelectionList();
}
