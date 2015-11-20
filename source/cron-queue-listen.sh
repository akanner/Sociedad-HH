#!/bin/bash

SHELL=/bin/sh
PATH=/bin:/sbin:/usr/bin:/usr/sbin 


PIDOF=$(pidof -s php artisan queue:listen)
echo "pid $PIDOF"
if [ ! $PIDOF ]; then
    echo "starting queue:listen"
    cd /var/www/sociedadhh/source
    nohup php artisan queue:listen --queue=mails &
fi
