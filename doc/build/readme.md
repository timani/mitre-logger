# Logger build targets

 The editor used by Ctrl-e is configured from the Preferences screen. The environment variable $VISUAL is consulted when no editor has been configured.
 
**Table of Contents**

- [Contribute to Spacemacs](#contribute-to-spacemacs)
    - [Pull Request Guidelines](#pull-request-guidelines)
    - [Submitting a configuration layer](#submitting-a-configuration-layer)
    - [Submitting a banner](#submitting-a-banner)
    - [Credits](#credits)

###  Overview

```
logger.analyze       Analyze and generate a report for the build
logger.app           Aggregate the logs from the application containers
logger.collect-logs  Collect all the service and server logs for a site
logger.db            Aggregate the logs from the database containers
logger.logs          Aggregate the SFTP logs and call logger targets for the app, db and redis containers
logger.redis         Aggregate the logs from the redis containers
```

###  logger.analyze
  
Analyze and generate a report for the build

```xml
  <target name="logger.analyze"
    description="Analyze and generate a report for the build" >
    <echo msg=""/>
    <echo msg="Running analysis on nginx access logs..." />
    <exec
      command="goaccess -p ${goaccess.config} -f build/logs/appserver/nginx-access.log -a > ${reports.dir}/report.html"
      logoutput="true"/>
      <echo msg="" />
      <echo msg="Generating MySQL slow log report..." />
      <phingcall target="db.pt-query-digest" />
      <echo msg="" />
      <echo msg="Formatting report..." />
    </target>
```
  
###  logger.app 

Aggregate the logs from the application containers

```xml
<target name="logger.app"
      description="Aggregate the logs from the application containers" >
      <phingcall target="wd.show" />
</target>
```
  
###  logger.collect-logs

Collect all the service and server logs for a site

```xml
  <target name="logger.collect-logs"
    description="Collect all the service and server logs for a site">
    <parallel threadCount="${logger.threads}">
      <phingcall target="logger.app" />
      <phingcall target="logger.db" />
      <phingcall target="logger.redis" />
    </parallel>
    <phingcall target="logger.logs" />
  </target>
```
  
###  logger.collect-logs

Collect all the service and server logs for a site

```xml
  <target name="logger.collect-logs"
    description="Collect all the service and server logs for a site">
    <parallel threadCount="${logger.threads}">
      <phingcall target="logger.app" />
      <phingcall target="logger.db" />
      <phingcall target="logger.redis" />
    </parallel>
    <phingcall target="logger.logs" />
  </target>
```

###  logger.collect-logs

Collect all the service and server logs for a site

```xml
  <target name="logger.collect-logs"
    description="Collect all the service and server logs for a site">
    <parallel threadCount="${logger.threads}">
      <phingcall target="logger.app" />
      <phingcall target="logger.db" />
      <phingcall target="logger.redis" />
    </parallel>
    <phingcall target="logger.logs" />
  </target>
```

###  logger.logs

Collect all the service and server logs for a site

```xml
  <target name="logger.logs"
    description="Aggregate the SFTP logs from the the app, db and redis containers" >
    <lookup type="appserver" env="${logger.env}" uuid="${logger.uuid}"/>
    <lookup type="dbserver" env="${logger.env}" uuid="${logger.uuid}"/>
    <lookup type="redis" env="${logger.env}" uuid="${logger.uuid}"/>
    <parallel threadCount="${logger.threads}">
      <phingcall target="sftp.app" />
      <phingcall target="sftp.db" />
    </parallel>
  </target>
```
  
###  logger.redis

Aggregate the logs from the redis containers

```xml
<target name="logger.redis"
  description="Aggregate the logs from the redis containers" >
  <echo msg="Redis CLI info." />
  <exec command="redis-cli -h ${redis.host} -p ${redis.port} -a ${redis.password} info" logoutput="true"/>
</target>
```
