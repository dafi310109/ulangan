<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'PindangPatin::index');
$routes->get('pindang-patin', 'PindangPatin::index');
$routes->get('pindang-patin/create', 'PindangPatin::create');
$routes->post('pindang-patin/store', 'PindangPatin::store');
$routes->get('pindang-patin/edit/(:num)', 'PindangPatin::edit/$1');
$routes->post('pindang-patin/update/(:num)', 'PindangPatin::update/$1');
$routes->get('pindang-patin/delete/(:num)', 'PindangPatin::delete/$1');
