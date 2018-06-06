<?php
$requestUri = $_SERVER['REQUEST_URI'];

$projectPageConfig = [
	'/' => [
		'viewUri' => '../view/pages/index.php'
	],
];

$layout = '../view/layout.php';

$page = $projectPageConfig[$requestUri];
if (empty($page)) {
	$page = [
		'viewUri' => '../view/pages/404.php'
	];
}
$vm = require_once '../view/layout.php';//����� ������
$page = require_once $page['viewUri'];//������� ���
echo $vm;