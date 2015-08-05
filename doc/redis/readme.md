# Redis build targets

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

###  redis.info
  
Show the latest watchdog errors

```xml
  <target name="redis.info" 
    description="Show the latest watchdog errors">
    <!--<watchdog save="false" count="100" type="" /> -->
    <echo msg=" " />
    <echo msg="Show the latest ${drush.ws.count} watchdog errors" />
    <echo msg=" " />
    <exec command="${drush.bin} ${drush.target} ws ${drush.strict} ${drush.ws.count}"
          passthru="true"
          checkreturn="true">
    </exec>
  </target>
```
   
