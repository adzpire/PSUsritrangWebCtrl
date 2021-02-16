#!/bin/bash

FILE2=$2
USER1=Administrator
DASH1=$(perl -e "printf '-' x 80")
for IP1 in $(cat ${FILE2} | awk '{print $1}')
   do
#--------------------
 echo ${DASH1}
 echo "$0 ${IP1}"
         ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no                 ${USER1}@${IP1} "shutdown -r -f -t $3" > /dev/null  2>&1 &
 echo "$0 ${IP1} finish  "
 echo ${DASH1}
#--------------------
   done