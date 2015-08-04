<?php

// app/controllers/
App::uses('ConnectionManager', 'Model');
App::uses('File', 'Utility');
App::uses('Model', 'Model');

class InstallerController extends AppController {

        public $helpers = array('Html');

        public function beforeFilter() {
                $this->Auth->allow();
                $this->layout = 'ajax_bootstrap';

                if (($this->request->params['action'] != 'reset_database') && ($this->request->params['action'] != 'reset_password')) {
                        if (file_exists(TMP . 'installed.txt')) {
                                echo 'Application already installed. Remove app/tmp/installed.txt to reinstall the application';
                                exit();
                        }
                }
        }

        public function index() {
                $this->set('title_for_layout', __('Installation: Welcome', true));
        }

        public function database() {
                if ($this->request->is('post')) {

                        /**
                         * init config
                         */
                        foreach ($this->data['Db'] AS $key => $value) {
                                if (isset($this->data['Db'][$key])) {
                                        $config[$key] = $value;
                                }
                        }

                        /**
                         * additional db settings
                         */
                        $config['datasource'] = 'Database/Mysql';
                        $config['prefix'] = '';

                        //debug($config); //return;

                        /**
                         * check submitted db config
                         */
                        App::uses('ConnectionManager', 'Model');

                        try {
                                $db = ConnectionManager::create('default', $config);
                        } catch (Exception $e) {
                                $db = false;
                        }

                        if ($db && $db->isConnected()) {
                                /**
                                 * setup database config file
                                 */
                                $src = APP . 'Config' . DS . 'database.php.install';
                                $target = APP . 'Config' . DS . 'database.php';

                                copy($src, $target);
                                $file = new File($target, true);
                                $content = $file->read();

                                $content = str_replace('{default_host}', $config['host'], $content);
                                $content = str_replace('{default_login}', $config['login'], $content);
                                $content = str_replace('{default_password}', $config['password'], $content);
                                $content = str_replace('{default_database}', $config['database'], $content);
                                $content = str_replace('{default_prefix}', $config['prefix'], $content);

                                if ($file->write($content)) {
                                        /**
                                         * execute sql
                                         */
                                        $statements = file_get_contents(APP . 'Config' . DS . 'sql' . DS . 'app.sql');
                                        $db->query($statements);

                                        $this->redirect('/installer/thanks');
                                } else {
                                        $this->Session->setFlash(__('Could not write database.php file.'), 'flash_bad');
                                }
                        } else {
                                $this->Session->setFlash(__('Could not connect to database.'), 'flash_bad');
                        }
                }
        }

        public function reset_database($password) {
                if ($password == 'admin2020') {
                        try {
                                $db = ConnectionManager::getDataSource('default');
                        } catch (Exception $e) {
                                $db = false;
                        }

                        if ($db && $db->isConnected()) {
                                /**
                                 * execute sql
                                 */
                                $statements = file_get_contents(APP . 'Config' . DS . 'sql' . DS . 'app.sql');
                                $db->query($statements);
                        }
                }
        }

//        public function reset_password($password) {
//                if ($password == 'admin2020') {
//                        $this->loadModel('User');
//                        $user = $this->User->findByUsername('admin');
//
//                        if (!empty($user)) {
//                                $user['User']['password'] = 'admin';
//                                $this->User->save($user);
//
//                                echo "Admin password has been reset";
//                        }
//
//                        exit();
//                }
//        }

        public function thanks() {
                file_put_contents(TMP . 'installed.txt', date('Y-m-d, H:i:s'));
        }

}