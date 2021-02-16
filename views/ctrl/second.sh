#!/bin/bash

# if [ -z "${1}" ] ; then
  # echo "which zone?"
  # exit
# else
  # MYAREA="${1}"
# fi
TEMP1="${1}"
TEMP4="${2}"
TEMP5="${3}"
#while true; do
	for LINE in $(cat ${TEMP1}) ; 
	do
	  PC=$(echo ${LINE}|cut -d'"' -f 2)
	  #echo $PC
		a=${TEMP5}
		grep -w ${PC} ${TEMP4} >> $a
	done

#bash "/var/www/basic/views/site/third.sh" "Shutdown(windows)"  $a ${3}

#done
# rm -f ${TEMPALL}