<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');
$routes->get('oracle', 'Home::oracle');
$routes->get('contact', 'Home::contact');
$routes->get('services', 'Home::services');
$routes->get('applicationservice', 'Home::applicationservice');
$routes->get('demoservice', 'Home::demoservice');
