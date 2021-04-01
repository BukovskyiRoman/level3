#!/bin/sh
mysqldump -ubuka -pbuka books-bd > /usr/share/nginx/html/mybooks.ua/backup/dump-$(date +"%d.%m.%y").sql
