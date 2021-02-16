#!/bin/bash

# if [ -z "${1}" ] ; then
  # echo "which zone?"
  # exit
# else
  # MYAREA="${1}"
# fi
MYAREA="${1}"
DIR1=/root/scripts
#VERSIONDATE=$(cat $DIR1/versionscripts.txt)
#DIALOGOPTS="--backtitle PSU12-Sritrang(${VERSIONDATE})-($0)-${MYAREA}"

TEMP1="/tmp/bootmenu-temp1.$$"
TEMP2="/tmp/bootmenu-temp2.$$"
TEMP3="/tmp/bootmenu-temp3.$$"
TEMP4="/tmp/bootmenu-temp4.$$"
TEMPALL="/tmp/bootmenu-temp*.$$"
LISTS="/etc/dhcp/dhcpd.conf"
TEMP5="/tmp/bootmenu-temp5.$$"
cat /dev/null > ${TEMP5}

# get PC list from DHCP
grep "host" ${LISTS}|grep -v "#"|grep "${MYAREA}" > ${TEMP2}
while read LINE ; do
  PCLIST=$(echo ${LINE}|awk '{print $8" "$2"="$6" off "}'|\
   sed "s/;//g"|sed "s/}//")
  echo ${PCLIST} >> ${TEMP4}
  PCMENU=$(echo "${PCMENU} ${PCLIST}")
done < ${TEMP2}

#echo $TEMP1
#echo $TEMP2
#echo $TEMP3
#echo $TEMP4.
# NAME[0]=$TEMP1
# NAME[1]=$TEMP2
# NAME[2]=$TEMP3
# NAME[3]=$TEMP4
# NAME[4]=$TEMPTEMPALL
# NAME[5]=$PCMENU
echo "$TEMP1<>"
echo "$TEMP2<>"
echo "$TEMP3<>"
echo "$TEMP4<>"
echo "$TEMPALL<>"
echo "$PCMENU"