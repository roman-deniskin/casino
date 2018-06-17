<?php
namespace Route_resolver;

class Route_resolver {
	static private $requestUri;
    static private $projectPageConfig = [];
    static private $routeParams;
    static private $layout;
    static private $notFoundPage;
    static private $layoutWrapper;

	public function __construct() {
        self::$notFoundPage = '../view/pages/404.phtml';
        self::$layoutWrapper = '../view/layout.phtml';
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
            //Здесь вызывается страница 404
			self::$routeParams = [
				'viewUri' => self::$notFoundPage
			];
		} elseif (array_key_exists ('controller', self::$routeParams)) {
            self::callController(self::$routeParams['controller'], self::$routeParams['action']);
        }
        $auth = new \Vendor\Authentification\Authentification;
        $userAuth = $auth->checkAuthorize();
        if ($userAuth == false && array_key_exists('private_page',self::$routeParams)) {
            Header("Location: /");
        }
	}
    
    public static function callController(/*BaseController*/ $controller = null, $actionMethod = null) {
        $controllerInstance = new self::$routeParams['controller'] ?: new $controller;//Каждый контроллер возвращает ViewConfig
        $routeParams = $controllerInstance($actionMethod);
        self::routeResolve($routeParams);
    }
	
	public static function getLayout($layout = null) {
        self::$layout = (self::$layout != null) ? $layout : self::$layoutWrapper;
        return self::$layout;
	}

    public function getPageContent() {
        require_once self::$routeParams['viewUri'];
    }

    public static function renderer() {
        self::$layout = self::getLayout();
        require_once self::$layout;
    }
}

$vm = new Route_resolver();