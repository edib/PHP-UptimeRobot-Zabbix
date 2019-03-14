PHP Wrapper For UptimeRobot.com monitoring for Zabbix
==============

* Forked from https://github.com/ckdarby/
* This is a basic PHP wrapper for https://uptimerobot.com/api

## Prerequisites
* Configure the $config apiKey
* Must be running PHP >= 5.4 and php-curl
* Format will be JSON & there will be no JSONCallback

## How to
* Copy this directory to somewhere that Zabbix agent can access.
* Add the following lines to zabbix-agent.conf
* Restart the Zabbix-Agent.

```Zabbix-Agent
# Discovery rule
UserParameter=uptimerobot.list,php /{{my_dir}}/uptimeRobot.php

# Item Prototype
UserParameter=uptimerobot.state[*],php /{{my_dir}}/uptimeRobot.php "$1"
```

* Zabbix Template included in the directory. Import that into Zabbix.
