# Mitre Logger [![Build Status](https://secure.travis-ci.org/rspec/rspec-expectations.svg?branch=master)](http://travis-ci.org/rspec/rspec-expectations) [![Code Climate](https://codeclimate.com/github/rspec/rspec-expectations.svg)](https://codeclimate.com/github/rspec/rspec-expectations)

This is an example of integrating a PHP application with the Jenkins PHP template (http://jenkins-php.org/). 
Read more at http://systemsarchitect.net/continuous-integration-for-php-with-jenkins/

Requirements
------------

This role requires Ansible 1.4 or higher and tested platforms are listed in the metadata file.

Role Variables
--------------

The role uses the following variables:

 - **php_fpm_pools**: The list a pools for php-fpm, each pools is a hash with
   a name entry (used for filename), all the other entries in the hash are pool
   directives (see http://php.net/manual/en/install.fpm.configuration.php).
 - **php_fpm_pool_defaults**: A list of default directives used for all php-fpm pools
   (see http://php.net/manual/en/install.fpm.configuration.php).
 - **php_fpm_apt_packages**: The list of packages to be installed by the
  ```apt```, defaults to ```[php5-fpm]```.
   module.

## Install

Want to run against the `master` branch? You'll need to include the dependent
RSpec repos as well. Add the following to your `Gemfile`:

This project can be checked out with Composer.

```
"require": {
    "jorgegc/phing-drush": "*"
}
```
Install the dependencies with Composer
```
php composer.phar install
```

Run the install list command to see a list of available options
```
./vendor/bin/phing -l
Default target:
-------------------------------------------------------------------------------
 logger.collect-logs  Collect all the service and server logs for a site

Main targets:
-------------------------------------------------------------------------------
 base.build           Base build to clean and install the logger
 base.clean           Clean the cache and artificats
 base.install         Install dependencies and create directories
 db.kill-queries      Kill long running queries @TODO
 db.processlist       Show the full MySQL processlist.
 db.pt-query-digest   Analyze MySQL slow logs with the pt-query-digest
 db.status            Show InnoDB engine status
 logger.analyze       Analyze and generate a report for the build
 logger.app           Aggregate the logs from the application containers
 logger.collect-logs  Collect all the service and server logs for a site
 logger.db            Aggregate the logs from the database containers
 logger.logs          Aggregate the SFTP logs from the the app, db and redis containers
 logger.redis         Aggregate the logs from the redis containers
 sftp.app             Collect the latest logs from the application containers
 sftp.db              Collect the latest logs from the database containers
 sftp.redis           Collect the latest logs from the redis containers
 wd.clear             Clear the watchdog table of all entries
 wd.show              Show the latest watchdog errors
```


