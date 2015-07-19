
# SFTP build targets

 The editor used by Ctrl-e is configured from the Preferences screen. The environment variable $VISUAL is consulted when no editor has been configured.
 
**Table of Contents**

- [Contribute to Spacemacs](#contribute-to-spacemacs)
    - [Pull Request Guidelines](#pull-request-guidelines)
    - [Submitting a configuration layer](#submitting-a-configuration-layer)
    - [Submitting a banner](#submitting-a-banner)
    - [Credits](#credits)

###  Overview

```
 db.kill-queries      Kill long running queries @TODO
 db.processlist       Show the full MySQL processlist.
 db.pt-query-digest   Analyze MySQL slow logs with the pt-query-digest
 db.status            Show InnoDB engine status
```
###  sftp.app
  
Collect the latest logs from the application containers

```xml
  <target name="sftp.app" 
    description="Collect the latest logs from the application containers">
      <echo msg=" " />
      <echo msg="Collect the latest logs for ${logger.env} application containers" />
      <echo msg=" " />
      <mkdir dir="${project.basedir}/build/logs/appserver"/>
      <exec command="sftp -o Port=2222 ${logger.env}.${logger.uuid}@appserver.${logger.env}.${logger.uuid}.drush.in:logs/*.log build/logs/appserver" logoutput="true"/>
      <echo msg=" " />
      <echo msg="File transfer complete." />
      <echo msg=" " />
  </target>
```

###  sftp.db
  
Collect the latest logs from the database containers

```xml
<target name="sftp.db"
    description="Collect the latest logs from the database containers">
      <echo msg=" " />
      <echo msg="Collect the latest logs for ${logger.env} database containers" />
      <echo msg=" " />
      <mkdir dir="${project.basedir}/build/logs/db"/>
      <exec command="sftp -o Port=2222 ${logger.env}.${logger.uuid}@dbserver.${logger.env}.${logger.uuid}.drush.in:logs/*.log build/logs/db" logoutput="true"/>
      <echo msg=" " />
      <echo msg="File transfer complete." />
      <echo msg=" " />
  </target>
```
###  sftp.redis
  
Collect the latest logs from the redis containers

```xml
  <target name="sftp.redis"
      description="Collect the latest logs from the redis containers">
      <echo msg=" " />
      <echo msg="Collect the latest logs from the redis containers" />
      <echo msg=" " />
    <exec command="sftp -o Port=2222 ${logger.env}.${logger.uuid}@redisserver.${logger.env}.${logger.uuid}.drush.in:logs/*.log build/logs/redis" logoutput="true"
        passthru="true"
        checkreturn="true" />
    </target>
``` 
