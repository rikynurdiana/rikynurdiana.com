### ============================================================================================

## HOW TO USE

After Pull This Repo

1 . create database. for the name use 'codeigniter'

2 . run database sql file on folder 'application/sql/ci3/'

3 . setting codeigniter 3 configuration in 'application/config/database.php'

        $db['default'] = array(
            'dsn'   => '',
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => 'root',
            'database' => 'codeigniter',
            'dbdriver' => 'mysqli',
            'dbprefix' => '',
            'pconnect' => FALSE,
            'db_debug' => (ENVIRONMENT !== 'production'),
            'cache_on' => FALSE,
            'cachedir' => '',
            'char_set' => 'utf8',
            'dbcollat' => 'utf8_general_ci',
            'swap_pre' => '',
            'encrypt' => FALSE,
            'compress' => FALSE,
            'stricton' => FALSE,
            'failover' => array(),
            'save_queries' => TRUE
        );

4 . seting your virtual hosts like this

    for ubuntu
        <VirtualHost ci3.dev:80>
            ServerAdmin webmaster@ci3.dev
            ServerName ci3.dev
            ServerAlias ci3.dev
            DocumentRoot "/path/to/project/CodeIgniter3"
            SetEnv APPLICATION_ENV "development"
               ErrorLog ${APACHE_LOG_DIR}/error.log
               CustomLog ${APACHE_LOG_DIR}/access.log combined
            <Directory "/path/to/project/CodeIgniter3">
                DirectoryIndex index.php
                Options Indexes FollowSymLinks
                AllowOverride all
                Require all granted
            </Directory>
        </VirtualHost>

5 . Done.. you can use this CodeIgniter 3 package.


## ACCESS THE ADMIN PAGE

1 . After setting all requirement, you can try to access http://ci3.dev/auth/dashboard

        user / email : admin@admin.com
        password     : password

2 . Done... you now can use CodeIgniter with Role And Permission

### Dont forget to make sure you have folder assets/uploads/ | give permission 777 |

### ============================================================================================

###################
What is CodeIgniter
###################

CodeIgniter is an Application Development Framework - a toolkit - for people
who build web sites using PHP. Its goal is to enable you to develop projects
much faster than you could if you were writing code from scratch, by providing
a rich set of libraries for commonly needed tasks, as well as a simple
interface and logical structure to access these libraries. CodeIgniter lets
you creatively focus on your project by minimizing the amount of code needed
for a given task.

*******************
Release Information
*******************

This repo contains in-development code for future releases. To download the
latest stable release please visit the `CodeIgniter Downloads
<https://codeigniter.com/download>`_ page.

**************************
Changelog and New Features
**************************

You can find a list of all changes for each release in the `user
guide change log <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/changelog.rst>`_.

*******************
Server Requirements
*******************

PHP version 5.5 or newer is recommended.

It should work on 5.2.4 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

************
Installation
************

Please see the `installation section <https://codeigniter.com/user_guide/installation/index.html>`_
of the CodeIgniter User Guide.

*******
License
*******

Please see the `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

*********
Resources
*********

-  `User Guide <https://codeigniter.com/docs>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community IRC <https://webchat.freenode.net/?channels=%23codeigniter>`_

Report security issues to our `Security Panel <mailto:security@codeigniter.com>`_
or via our `page on HackerOne <https://hackerone.com/codeigniter>`_, thank you.

***************
Acknowledgement
***************

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.