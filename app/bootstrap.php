<?php
use Aptoma\Twig\Extension\MarkdownExtension;
use Aptoma\Twig\Extension\MarkdownEngine;

$app->register(
	new Silex\Provider\TwigServiceProvider(), array(
		'twig.path' => __DIR__ . '/views',
	)
);

$engine = new MarkdownEngine\MichelfMarkdownEngine();

$app['twig']->addExtension(new MarkdownExtension($engine));
