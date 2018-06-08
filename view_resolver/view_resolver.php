<?php
namespace View_resolver;

class View_resolver {
	static private $requestUri;
    static private $projectPageConfig = [];
    static private $viewModel;
    static private $layout;

	public function __construct() {
		self::$requestUri = $_SERVER['REQUEST_URI'];
		self::$projectPageConfig = new Routes_config;
        self::getViewModel();
	}
	
	public static function getViewModel() {
		self::$viewModel = self::$projectPageConfig->getPageConfig(self::$requestUri);
		if (empty(self::$viewModel)) {
			self::$viewModel = [
				'viewUri' => '../view/pages/404.phtml'
			];
		}
	}
	
	public static function setLayout($layout) {
        self::$layout ? $layout : '../view/layout.php';
	}

    public function getPageContent() {
        return require_once self::$viewModel['viewUri'];
    }

    public static function renderer() {
        $vm = require_once '../view/layout.php';
        //require_once self::$viewModel['viewUri'];
        echo $vm;
    }
}

$vm = new View_resolver();
$vm->renderer();