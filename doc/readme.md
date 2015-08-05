# Bundled Mitre targets

 The editor used by Ctrl-e is configured from the Preferences screen. The environment variable $VISUAL is consulted when no editor has been configured.
 
**Table of Contents**

- [Contribute to Spacemacs](#contribute-to-spacemacs)
    - [Pull Request Guidelines](#pull-request-guidelines)
    - [Submitting a configuration layer](#submitting-a-configuration-layer)
    - [Submitting a banner](#submitting-a-banner)
    - [Credits](#credits)

###  Overview

```
redis.info             Show the system info for the redis container 
```

###  Default build targets
  
Show the latest watchdog errors

```xml
  <!-- ## Import build files -->
  <import file="${project.basedir}/build.config.xml"/>
  <import file="${project.basedir}/build.db.xml"/>
  <import file="${project.basedir}/build.sftp.xml"/>
  <import file="${project.basedir}/build.watchdog.xml"/>
```

###  Adding build targets

#### Create a build.*.xml

Use a descriptive name for the collection of targets

#### Add the new targets to the main build

The main build file is `build.xml`. For clarity we recommend adding any new dependcies to the
build files section.

```
<!-- ## Import build files -->
  <import file="${project.basedir}/build.config.xml"/>
  <import file="${project.basedir}/build.db.xml"/>
  <import file="${project.basedir}/build.sftp.xml"/>
  <import file="${project.basedir}/build.watchdog.xml"/>
 ``` 
#### Verify the targets were correctly added
 
Run the install list command to see a list of available targets

```
./vendor/bin/phing -l
Default target:
------------------------------------------------------------------------------- 

Main targets:
-------------------------------------------------------------------------------
 base.build           Base build to clean and install the logger
 base.clean           Clean the cache and artificats
 base.install         Install dependencies and create directories
