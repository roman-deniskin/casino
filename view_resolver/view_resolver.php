<?php
class routesConfig {
	private $projectPageConfig = [
		'/' => [
			'viewUri' => '../view/pages/index.phtml'
		],
	];
	
	public static function getPageConfig () {
		return $self::projectPageConfig;
	}
}

class viewResolver {
	private $requestUri;
	private $projectPageConfig;
	private $viewModel;
	
	public function __construct {
		$self::requestUri = $_SERVER['REQUEST_URI'];
		$self::projectPageConfig = routesConfig::getPageConfig();
		$self::getPage();
	}
	
	public static function getViewModel() {
		$self::viewModel = $projectPageConfig[$self::requestUri];
		if (empty($self::viewModel)) {
			$self::viewModel = [
				'viewUri' => '../view/pages/404.phtml'
			];
		}
	}
	
	public static function getController() {
		
	}
	

$layout = '../view/layout.php';

$vm = require_once '../view/layout.php';//Задаём шаблон
$page = require_once $page['viewUri'];//передаём вью
echo $vm;
}