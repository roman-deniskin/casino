<?php
namespace Route_resolver;

use Controller\BaseController\BaseController;

class Route_resolver {
	static private $requestUri;
    static private $projectPageConfig = [];
    static private $routeParams;
    static private $layout;

	public function __construct() {
		self::$requestUri = $_SERVER['REQUEST_URI'];
		self::$projectPageConfig = new Routes_config;
        self::getViewModel();
	}
	
	public static function getViewModel() {
		self::$routeParams = self::$projectPageConfig->getPageConfig(self::$requestUri);
		if (empty(self::$routeParams)) {
			self::$routeParams = [
				'viewUri' => '../view/pages/404.phtml'
			];
		} elseif (array_key_exists ('controller', self::$routeParams)) {
            self::callController(self::$routeParams['controller']);
        }
	}
    
    public static function callController(BaseController $controller) {
        self::$routeParams = return new self::$routeParams['controller'];//Каждый контроллер возвращает ViewConfig
        self::getViewModel();
        exit;
    }
	
	public static function setLayout($layout) {
        self::$layout ? $layout : '../view/layout.php';
	}

    public function getPageContent() {
        return require_once self::$routeParams['viewUri'];
    }

    public static function renderer() {
        $vm = require_once '../view/layout.php';
        //require_once self::$viewModel['viewUri'];
        echo $vm;
    }
}

$vm = new Route_resolver();
$vm->renderer();