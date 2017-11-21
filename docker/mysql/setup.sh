#!/bin/sh -e

service mysql start

for f in $*
do
	mysql < $f
done

service mysql stop