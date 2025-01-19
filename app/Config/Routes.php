<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public Pages
$routes->get('/', 'Home::index'); // Home Page
$routes->get('products', 'PortfolioController::index'); // Products Page
$routes->get('portfolio', 'PortfolioController::index'); // Portfolio Page
$routes->get('cart', 'CartController::index'); // Cart Page

// Authentication
$routes->get('/login', 'AuthController::login', ['as' => 'login']);
$routes->post('/login', 'AuthController::attemptLogin');
$routes->get('/logout', 'AuthController::logout');

// Admin Role
$routes->group('admin', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('', 'Admin\Dashboard::index'); // Admin Dashboard
    $routes->get('user/manage', 'Admin\User::manage'); // User Management

    // Product Management
    $routes->get('product/create', 'Admin\Product::create');
    $routes->post('product/create', 'Admin\Product::create'); 
    $routes->get('product/display', 'Admin\Product::display');
    $routes->get('product/manage', 'Admin\Product::manage'); 
    $routes->get('product/edit/(:num)', 'Admin\Product::edit/$1'); // Edit Product
    $routes->post('product/update/(:num)', 'Admin\Product::update/$1'); // Update Product
    $routes->get('product/delete/(:num)', 'Admin\Product::delete/$1'); // Delete Product

    // Category Management
    $routes->get('category/manage', 'Admin\CategoryController::index'); // Manage Categories
    $routes->get('category/create', 'Admin\CategoryController::create'); // Add Category
    $routes->post('category/store', 'Admin\CategoryController::store'); // Save New Category
    $routes->get('category/edit/(:num)', 'Admin\CategoryController::edit/$1'); // Edit Category
    $routes->post('category/update/(:num)', 'Admin\CategoryController::update/$1'); // Update Category
    $routes->get('category/delete/(:num)', 'Admin\CategoryController::delete/$1'); // Delete Category

    // Blog Management
    $routes->get('blog/create', 'Admin\Blog::create');
    $routes->get('blog/manage', 'Admin\Blog::manage');

    // Reviews
    $routes->get('review/manage', 'Admin\Review::manage');

    // Search Feature
    $routes->get('search', 'Admin\Search::index');
});
