<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */

if (!file_exists(TMP.'installed.txt')) {
        Router::connect('/', array('controller' => 'installer'));
} else {
        Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
}

    
/* Route example */
//Router::connect('/dashboard', array('controller' => 'system', 'action' => 'dashboard', 'admin' => true));
Router::connect('/register', array('controller' => 'users', 'action' => 'register'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
Router::connect('/terms',   array('controller' => 'pages', 'action' => 'terms'  ));
Router::connect('/about',   array('controller' => 'pages', 'action' => 'about'  ));
Router::connect('/contact', array('controller' => 'pages', 'action' => 'contact'));
Router::connect('/privacy', array('controller' => 'pages', 'action' => 'privacy'));

Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
