<?php
require_once('./include/inc.ilias_version.php');
require_once('./Services/Component/classes/class.ilComponent.php');

/**
 * Class ctrlmm
 *
 * @author  Fabian Schmid <fs@studer-raimann.ch>
 * @version 1.0.0
 */
class ctrlmm {

	const ILIAS_43 = 43;
	const ILIAS_44 = 44;
	const ILIAS_50 = 50;
	const MIN_ILIAS_VERSION = self::ILIAS_43;


	/**
	 * @return int
	 */
	public static function getILIASVersion() {
		if (ilComponent::isVersionGreaterString(ILIAS_VERSION_NUMERIC, '4.9.999')) {
			return self::ILIAS_50;
		}
		if (ilComponent::isVersionGreaterString(ILIAS_VERSION_NUMERIC, '4.3.999')) {
			return self::ILIAS_44;
		}
		if (ilComponent::isVersionGreaterString(ILIAS_VERSION_NUMERIC, '4.2.999')) {
			return self::ILIAS_43;
		}

		return 0;
	}


	/**
	 * @return bool
	 */
	public static function isILIASSupported() {
		return self::getILIASVersion() >= self::MIN_ILIAS_VERSION;
	}


	/**
	 * @return bool
	 */
	public static function is44() {
		return self::getILIASVersion() >= self::ILIAS_44;
	}


	/**
	 * @return bool
	 */
	public static function is43() {
		return self::getILIASVersion() >= self::ILIAS_43;
	}


	/**
	 * @return bool
	 */
	public static function is50() {
		return self::getILIASVersion() >= self::ILIAS_50;
	}
}

?>