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
        self::routeResolve();
	}
	
	public static function routeResolve($routeParams = null) {
        if (empty($routeParams))
		    self::$routeParams = self::$projectPageConfig->getPageConfig(self::$requestUri);
		else {
            self::$routeParams = $routeParams;
        }
        if (empty(self::$routeParams)) {
			self::$routeParams = [
				'viewUri' => '../view/pages/404.phtml'
			];
		} elseif (array_key_exists ('controller', self::$routeParams)) {
            if (!array_key_exists('method', self::$routeParams))
                self::callController(self::$routeParams['controller']);
        }
        $auth = new \Vendor\Authentification\Authentification;
        $userAuth = $auth->checkAuthorize();
        if ($userAuth == false && array_key_exists('private_page',self::$routeParams)) {
            Header("Location: /");
        }
	}
    
    public static function callController(/*BaseController*/ $controller = null) {
        if ($controller == null)
            $controllerInstance = new self::$routeParams['controller']();//Каждый контроллер возвращает ViewConfig
        else
            $controllerInstance = new $controller();
        $routeParams = $controllerInstance();
        self::routeResolve($routeParams);
    }
	
	public static function getLayout($layout = null) {
        return (self::$layout != null) ? $layout : '../view/layout.php';
	}

    public function getPageContent() {
        return require_once self::$routeParams['viewUri'];
    }

    public static function renderer() {
        $vm = '';
        self::$layout = self::getLayout();
        $vm = require_once self::$layout;
        echo $vm;
    }
}

$vm = new Route_resolver();
$vm->renderer();