# Database build targets

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
###  db.kill-queries
  
Kill long running queries @TODO

```xml
<!-- ## Targets -->
<target name="db.processlist"
        description="Show the full MySQL processlist.">
        <echo msg=" " />
        <echo msg="Show the full MySQL processlist" />
        <echo msg=" " />
  <exec command="${drush.bin} ${drush.target} sqlq 'show full processlist \G' ${drush.strict} "
        passthru="true"
        checkreturn="true" />
</target>
```

###  db.status
  
Show InnoDB engine status

```xml
<target name="db.status"
        description="Show InnoDB engine status">
        <echo msg=" " />
        <echo msg="Show the InnoDB engine status" />
        <echo msg=" " />
  <exec command="${drush.bin} ${drush.target} sqlq 'show engine innodb status \G' ${drush.strict}"
        passthru="true"
        checkreturn="true" />
</target>
```
###  db.pt-query-digest
  
Analyze MySQL slow logs with the pt-query-digest

```xml
    <target name="db.pt-query-digest"
            description="Analyze MySQL slow logs with the pt-query-digest">
            <echo msg=" " />
            <echo msg="Analyze MySQL slow logs with the pt-query-digest." />
            <echo msg=" " />
      <exec command="pt-query-digest ${db.slow-log}"
            passthru="true"
            checkreturn="true" />
    </target>
```
###  db.kill-queries
  
Kill long running queries 

```xml
  <target name="db.kill-queries"
          description="Kill long running queries @TODO">
          <echo msg=" " />
          <echo msg="Kill long running queries" />
          <echo msg=" " />
    <exec command="${drush.bin} ${drush.target} sqlq 'explain ${qid}' ${drush.strict} "
          passthru="true"
          checkreturn="true" />
  </target>
``` 
