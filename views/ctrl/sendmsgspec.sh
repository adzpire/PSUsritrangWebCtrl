#!/bin/bash

TIME1=300
FILE2=$2
MESSAGE1=$(cat $4)
USER1=Administrator
DASH1=$(perl -e "printf '-' x 80")
for IP1 in $(cat ${FILE2} | awk '{print $1}')
   do
#--------------------
 echo ${DASH1}
 echo "$0 ${IP1}"
	ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no                 ${USER1}@${IP1} "shutdown -s -t '${TIME1}' /c '${MESSAGE1}' ; sleep 10 ; shutdown -a" > /dev/null 2>&1 &
 echo "$0 ${IP1} finish  "
 echo ${DASH1}
#--------------------
   done