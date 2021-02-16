#!/bin/bash
# pom 6-12-56
#--------------------------------
# stop dns select zone
file1=/etc/dhcp/dhcpd.conf
myarea=$3
#cp $file1 $file1.$(date +%F-%H%M%S)
a=$(grep -n -B10 $myarea/ $file1 | grep -v '#' | grep domain-name-servers | cut -d\- -f1)

## Edit by Amatawit CoE Phuket ##
if [ ! -z "$a" ]
then
sed -i "$a s/^/#123amazon/g" $file1
#sudo service isc-dhcp-server restart
fi
## Edit by Amatawit CoE Phuket ##

#dialog --backtitle $0 --title "stop dns $myarea" --textbox $file1 50 80

#----------------------------
clear
FILE2=$2    #$2 = all client
USER1=Administrator
DASH1=$(perl -e "printf '-' x 80")
for IP1 in $(cat ${FILE2} | awk '{print $1}')
   do
#--------------------
 echo ${DASH1}
 echo "$0 ${IP1}"
         ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no                 ${USER1}@${IP1} "ipconfig /renew" > /dev/null 2>&1 &
 echo "$0 ${IP1} finish  "
 echo ${DASH1}
#--------------------
   done

