# Drupal watchdog build targets

 The editor used by Ctrl-e is configured from the Preferences screen. The environment variable $VISUAL is consulted when no editor has been configured.
 
**Table of Contents**

- [Contribute to Spacemacs](#contribute-to-spacemacs)
    - [Pull Request Guidelines](#pull-request-guidelines)
    - [Submitting a configuration layer](#submitting-a-configuration-layer)
    - [Submitting a banner](#submitting-a-banner)
    - [Credits](#credits)

###  Overview

```
wd.clear             Clear the watchdog table of all entries
wd.show              Show the latest watchdog errors
```

###  wd.show 
  
Show the latest watchdog errors

```xml
  <target name="wd.show" 
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
  
###  wd.clear  

Clear the watchdog table of all entries

```xml
<target name="wd.clear"
          description="Clear the watchdog table of all entries">
          <echo msg=" " />
          <echo msg="Clear the watchdog table of all entries" />
          <echo msg=" " />
    <exec command="${drush.bin} ${drush.target} wd-del all -y"
          passthru="true"
          checkreturn="true" />
  </target>
```
 
