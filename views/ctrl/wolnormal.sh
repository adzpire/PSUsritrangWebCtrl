#9-11-56
#pom
mac1=$(awk '{print $2}'  ${2} | cut -d\= -f2)
wakeonlan $mac1
dialog --title "$0 finish" --textbox $2  20 80
