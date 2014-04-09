<?php

require __DIR__ . '/../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$app = new \Silex\Application();
$app['debug'] = true;

require __DIR__ . '/../app/bootstrap.php';

$app->get('/', function() use ($app) {
	return $app['twig']->render(
		'default.html.twig', [
			'title' => 'Adrian Palmer, Melbourne Web Developer',
		]
	);
});

$app->run();