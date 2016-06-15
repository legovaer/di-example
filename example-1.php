<?php
/**
 * Simplest example of Dependency Injection.
 *
 * This file displays you how easy DI works. We're going to register two new services to the Symfony container.
 * We're also adding a parameter, or an "injection" inside one of the classes.
 *
 * Note: This example is not actually quite a good proof of why one should use DI. We're only setting up a container
 * in one file, and we're re-using the same container in the same file.
 * If we would create a new file and load Symfony's container once again, you will notice that we will be able to access
 * all registered services without instanciating a new class. This is the power of Dependency Injection.
 */
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

// We need to register our bartender as a service which requires one argument: the bartender's favourite beer.
$container = new ContainerBuilder();
$container->setParameter('bartender.favourite', 'stella');
$container
  ->register('bartender', 'Legovaer\SDIE\BarTender')
  ->addArgument('%bartender.favourite%');

// Our BarClient class is making use of DI as well, it requires a bartender in order to get served.
// This registers our barclient as a serivce and adds the bartender (which we loaded in the code above) as an argument.
// This will allow us to use the BarTender class inside the constructor of the BarClient class.
$container
  ->register('barclient', 'Legovaer\SDIE\BarClient')
  ->addArgument(new Reference('bartender'));

// Now the only thing we need to do is ask our bartender for his favourite beer.
/** @var \Legovaer\SDIE\BarClient $barClient */
$barClient = $container->get('barclient');
$barClient->getBeer();

// We could'v make this shorter by using:
// $container->get('barclient')->getBeer()


