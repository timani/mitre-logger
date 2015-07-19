# Mitre Logger [![Build Status](https://secure.travis-ci.org/rspec/rspec-expectations.svg?branch=master)](http://travis-ci.org/rspec/rspec-expectations) [![Code Climate](https://codeclimate.com/github/rspec/rspec-expectations.svg)](https://codeclimate.com/github/rspec/rspec-expectations)

This is an example of integrating a PHP application with the Jenkins PHP template (http://jenkins-php.org/). 
Read more at http://systemsarchitect.net/continuous-integration-for-php-with-jenkins/

Requirements
------------

This role requires Ansible 1.4 or higher and tested platforms are listed in the metadata file.  

 - **sftp**: The list a pools for php-fpm, each pools is a hash with
   a name entry (used for filename), all the other entries in the hash are pool
   directives (see http://php.net/manual/en/install.fpm.configuration.php).
 - **goaccess**: The list a pools for php-fpm, each pools is a hash with
   a name entry (used for filename), all the other entries in the hash are pool
   directives (see http://php.net/manual/en/install.fpm.configuration.php).
 - **percona-toolkit**: The list a pools for php-fpm, each pools is a hash with
   a name entry (used for filename), all the other entries in the hash are pool
   directives (see http://php.net/manual/en/install.fpm.configuration.php).
 - **docker** _(optional)_: The list a pools for php-fpm, each pools is a hash with
   a name entry (used for filename), all the other entries in the hash are pool
   directives (see http://php.net/manual/en/install.fpm.configuration.php).
 - **docker-compose** _(optional)_: The list a pools for php-fpm, each pools is a hash with
   a name entry (used for filename), all the other entries in the hash are pool
   directives (see http://php.net/manual/en/install.fpm.configuration.php).

**Table of Contents**

- [Introduction](#introduction)
- [Features](#features)
    - [Batteries Included](#batteries-included)
    - [Nice UI](#nice-ui)
    - [Excellent ergonomics](#excellent-ergonomics)
    - [Convenient and Mnemonic Key Bindings](#convenient-and-mnemonic-key-bindings)
        - [Great [Documentation][DOCUMENTATION.MD]](#great-documentationdocumentationmd)
- [Prerequisites](#prerequisites)
    - [Emacs version](#emacs-version)
    - [OS X](#os-x)

## Install

Want to run against the `master` branch? You'll need to include the dependent
RSpec repos as well. Add the following to your `Gemfile`:

### Install with Composer

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
### Install with Docker
 
Start your image binding the external ports 8000 in all interfaces to your container:

```
 docker run -t -i -p 8000:8000 sculpin /bin/bash
```
### Install with docker-compose
 
Start your image binding the external ports 8000 in all interfaces to your container:

```yml
app:
   image: php
   links:
     - jenkins
  volume:
    - "./:/var/jenkins_home"
```

Start the mite-logger container
```
 docker-compose up -d
```

Verify the container is running
``` 
docker-compose ps
```


## Overview

On every machine you install asciinema recorder, you get a new, unique API token. This command connects this local token with your asciinema.org account, and links all asciicasts recorded on this machine with the account.

[![demo](https://asciinema.org/a/624fjx2rx7k3pctdozw7m8b24.png)](https://asciinema.org/a/624fjx2rx7k3pctdozw7m8b24?autoplay=1)

## How it works

On every machine you install asciinema recorder, you get a new, unique API token. This command connects this local token with your asciinema.org account, and links all asciicasts recorded on this machine with the account.

[![demo](http://www.scielo.br/img/revistas/jistm/v8n1/a05fig02.jpg)] 

## Configuration

On every machine you install asciinema recorder, you get a new, unique API token. This command connects this local token with your asciinema.org account, and links all asciicasts recorded on this machine with the account.

#### Logger Properties

The last line of the example expresses an expected outcome.

```xml 
  <property name="logger.uuid" value="9f605e3b-aa07-4302-8683-8dbbff6dd33f" />
  <property name="logger.env" value="dev" />
  <property name="logger.threads" value="2" />
  <property name="logger.reports.dir" value="${project.basedir}/build/reports"/>
```

#### Drush Properties

Those PRs are fast-forwarded whenever it's possible and cherry-picked otherwise (most likely they will be cherry-picked).

```xml 
  <property name="drush.target" value="@monolog-new-relic-d7.dev" />
  <property name="drush.bin"  value="${project.basedir}/vendor/bin/drush" />
```
#### Misc Properties

You'll need to include the dependent RSpec repos as well. 

```xml 
  <property name="dash.url" value="https://admin.dashboard.pantheon.io" />
  <property name="reports.dir" value="${project.basedir}/build/reports" />
  <property name="goaccess.config" value="${project.basedir}/config/.goaccess" />
```

## Usage

Run the install list command to see a list of available targets
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

## Support

Please [open an issue](https://github.com/fraction/readme-boilerplate/issues/new) for support.

## Contributing

Please contribute using [Github Flow](https://guides.github.com/introduction/flow/). Create a branch, add commits, and [open a pull request](https://github.com/fraction/readme-boilerplate/compare/).
