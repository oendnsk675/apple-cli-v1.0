data=$1
cond=$2

N='\033[0m'
G='\033[0;32m'
O='\033[7;93m'
C="\033[1;36m"
R="\033[0;31m"

if [[ $cond == 'live' ]]; then
	echo -e " \x1b[0m${C}[ $cond ]  => $data |${O} Checker by osyi cozy${N}"
elif [[ $cond == 'die' ]]; then
	echo -e " \x1b[0m${R}[ $cond ]=> $data |${O} Checker by osyi cozy${N}"
elif [[ $cond == 'gettoken' ]]; then
	echo -e " \x1b[0m${C}${O} Get Token Apple Ini Akan Sedikit Lama, Tergantung Koneksi Wait...${N}\n"
elif [[ $cond == 'tokensuccess' ]]; then
	echo -e " \x1b[0m${C}${O} Token Success Terambil${N}"
elif [[ $cond == 'crack' ]]; then
	echo -e " \x1b[0m[${C} $cond ]  => $data |${O} Checker by osyi cozy${N}"
elif [[ $cond == 'unknown' ]]; then
	echo -e " \x1b[0m${R}[ $cond ]=> $data |${O} Checker by osyi cozy${N}"
elif [[ $cond == 'something' ]]; then
	echo -e " \x1b[0m${R}${O} Something Went Wrong${N}"
fi