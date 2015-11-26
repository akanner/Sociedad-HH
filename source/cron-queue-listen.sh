#!/bin/bash

SHELL=/bin/sh
PATH=/bin:/sbin:/usr/bin:/usr/sbin


PIDOF=$(pidof -s php queue:listen)
if [ ! $PIDOF ]; then
    echo "starting queue:listen"
    cd /var/www/sociedadhh/source
    nohup php -d register_argc_argv=On artisan queue:listen --queue=mails &
fi
