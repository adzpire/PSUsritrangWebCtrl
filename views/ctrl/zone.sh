#!/bin/bash

TEMP2="/tmp/mystart-temp2.$$"

ZONEDIR="/var/lib/tftpboot"

ZONELIST=$(ls -d ${ZONEDIR}/zone*|sed -s "s;${ZONEDIR}/;;g")
# echo " "  > ${TEMP2}
	# for ID in ${ZONELIST} ; do
	  # NUM=$(echo "${ID}"|sed -s "s/zone//")
	  # ID1=$(grep zonename /etc/dhcp/dhcpd.conf | grep ${ID}= | cut -d= -f2-)
			# if [ -z ${ID1} ] ;then
					# ID1=${ID}
			# else
					# ID1=${ID1}
			# fi
	  # echo "${NUM}" "${ID1}" >> ${TEMP2}
	# done
echo $ZONELIST