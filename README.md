# Mitre Logger [![Build Status](https://secure.travis-ci.org/rspec/rspec-expectations.svg?branch=master)](http://travis-ci.org/rspec/rspec-expectations) [![Code Climate](https://codeclimate.com/github/rspec/rspec-expectations.svg)](https://codeclimate.com/github/rspec/rspec-expectations)

A general purpose logging tool to get and analyze logs from Drupal and WordPress sites on Pantheon. Very unstable!

**Table of Contents**

- [Overview](#Overview)
- [Features](#features)
- [Requirements](#requirements)
- [Install](#install)
    - [Excellent ergonomics](#excellent-ergonomics)
    - [Convenient and Mnemonic Key Bindings](#convenient-and-mnemonic-key-bindings) 
- [Configuration](#configuration)
    - [Emacs version](#emacs-version) 

## Overview

On every machine you install asciinema recorder, you get a new, unique API token. This command connects this local token with your asciinema.org account, and links all asciicasts recorded on this machine with the account.

[![demo](https://asciinema.org/a/624fjx2rx7k3pctdozw7m8b24.png)](https://asciinema.org/a/624fjx2rx7k3pctdozw7m8b24?autoplay=1)

## Features

* Pantheon CLI support
  * Drush
  * wp-cli
* Download SFTP on multiple containers
* Percona toolkit MySQL query digest
* Generate log reports 
* Jenkins integration
* Docker Support
* Vagrant Support

Requirements
------------

This role requires Ansible 1.4 or higher and tested platforms are listed in the metadata file.  

 - **sftp**: Standard SFTP CLI access is required to use the Logger and the program will need to be installed.
 - **goaccess**: In order to perform nginx access log analysis with goaccess locally the logger will require
    the program to be installed.
 - **percona-toolkit**: In order to use the Percona toolkit MySQL query digest without Docker or Vagrant
   will require the Percona Toolkit to be installed.
 - **docker** _(optional)_: The basic Docker installation will include all of the requirements to 
   install and run the Logger.
 - **docker-compose** _(optional)_: The more adavanced Docker installation which includes Jenkins that provides
   a UI to run and manage jobs.

## Install

Want to run against the `master` branch? You'll need to include the dependent
RSpec repos as well. Add the following to your `Gemfile`:

###  Install with Composer

Clone the repository from github.

```bash
git clone https://github.com/timani/mitre-logger.git
```

Install the dependencies with Composer
```
composer install
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

## Configuration

On every machine you install asciinema recorder, you get a new, unique API token. This command connects this local token with your asciinema.org account, and links all asciicasts recorded on this machine with the account.

#### Required Properties

The following configuration properties must be set in the `build.properties.xml` file. 

```xml 
  <property name="logger.uuid" value="" />
  <!-- ## dev/test/live/<multidev> - Lowercase -->
  <property name="logger.env" value="" />
  <!-- ## <site-name> - Lowercase, Machine name -->
  <property name="logger.name" value="" />
  <!-- ## Terminus auth --> 
  <property name="terminus.session"  value="" />
  <!--  &&&&&&  OR  &&&&&& -->
  <property name="logger.user.email" value="" />
  <property name="logger.user.password" value="" />
```

#### Misc Properties

Miscelaneous configuration properties. 

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
 logger.collect-logs      Collect all the service and server logs for a site

Main targets:
-------------------------------------------------------------------------------
 base.auth                Authenticate with external services
 base.build               Base build to clean and install the logger
 base.clean               Clean the cache and artificats
 base.install             Install dependencies and create directories
 logger.collect-logs      Collect all the service and server logs for a site
 logger.db.kill-queries   Kill long running queries @TODO
 logger.db.processlist    Show InnoDB engine status
 logger.db.status         Show the full MySQL processlist.
 logger.drupal.wd.clear   Clear the watchdog table of all entries
 logger.drupal.wd.show    Show the latest watchdog errors
 logger.service.app       Aggregate the logs from the application containers
 logger.service.db        Aggregate the logs from the database containers
 logger.service.logs      Aggregate the service logs from the the app, db and redis containers
 logger.service.redis     Aggregate the logs from the redis containers
 logger.sftp.app          Collect the latest logs from the application containers
 logger.sftp.db           Collect the latest logs from the database containers
 logger.sftp.logs         Aggregate the SFTP logs from the the app, db and redis containers
 logger.sftp.redis        Collect the latest logs from the redis containers
 mitre_base.base.auth     Authenticate with external services
 mitre_base.base.build    Base build to clean and install the logger
 mitre_base.base.clean    Clean the cache and artificats
 mitre_base.base.install  Install dependencies and create directories
 report.analyze           Analyze all service and server logs
 report.mysql.slow        Analyze MySQL slow logs with the pt-query-digest
 report.mysql.status      Analyze MySQL engine status
 report.mysql.summary     Generate summary of MySQL reports
 report.nginx.access      Analyze Nginx access
 report.nginx.error       Analyze Nginx errors
 report.nginx.summary     Generate summary of Nginx reports
 report.php.error         Analyze PHP error log
 report.php.fpm-error     Analyze PHP-FPM error log
 report.php.slow          Analyze PHP slow log
 report.php.summary       Generate summary of PHP reports
 report.summary           Generate summary of all service and server logs
 terminus.auth            Authenticate user on Pantheon
 terminus.talk            General debugging
 terminus.wake            Wake a reaped environment

Subtargets:
-------------------------------------------------------------------------------
 cctarget
 ctarget
```

## Support

Please [open an issue](https://github.com/fraction/readme-boilerplate/issues/new) for support.
## Documentation

Take a look at the [documentation table of contents](dist/doc/TOC.md).
This documentation is bundled with the project, which makes it readily
available for offline reading and provides a useful starting point for
any documentation you want to write about your project.


## Contributing

Hundreds of developers have helped make the HTML5 Boilerplate what it is
today. Anyone and everyone is welcome to [contribute](CONTRIBUTING.md),
however, if you decide to get involved, please take a moment to review
the [guidelines](CONTRIBUTING.md):

* [Bug reports](CONTRIBUTING.md#bugs)
* [Feature requests](CONTRIBUTING.md#features)
* [Pull requests](CONTRIBUTING.md#pull-requests)


## License

The code is available under the [MIT license](LICENSE.txt).
