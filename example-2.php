<?php
/**
 * Another example (and best practice) on using Symfony Dependency Inject.
 *
 * In this example, we're going to define our services in a YAML file. This allows us to load the services using
 * Symfony's Config component. The functionality is exactly the same as in the first example. The only difference is
 * how we load our services.
 */
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

// Load Symfony's container and load the services from our services.yml file.
$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator(__DIR__));
$loader->load('services.yml');

// Now the only thing we need to do is ask our bartender for his favourite beer.
/** @var \Legovaer\SDIE\BarClient $barClient */
$barClient = $container->get('barclient');
$barClient->getBeer();