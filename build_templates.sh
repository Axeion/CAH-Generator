#!/bin/bash
#0
# Quick & Dirty - Take an icon, make the assets needed for the tool from it
#                                                                 rotate 17degrees     l/r  u/d
# convert img/white.png -units PixelsPerInch -density 1200 -draw "rotate 17 image over 1622,3495 1,0 '$icon'" img/$prefix-white.png																							   

icon='img/icons/devil.png'
prefix='devil'

while getopts ":hi:p:" opt; do
  case $opt in
    h)
      echo "-i path to icon"
      echo "-p prefix for output files"
	  exit 0
      ;;
    i)
      icon=$OPTARG
      ;;
    p)
      prefix=$OPTARG
      ;;
    \?)
      echo "Invalid option: -$OPTARG" >&2
      exit 1
      ;;
    :)
      echo "-$OPTARG requires an argument" >&2
      exit 1
      ;;
  esac
done

if [[ -n "$icon" && -n "$prefix" ]]
	then 
		convert img/white.png -units PixelsPerInch -density 1200 -draw "rotate 17 image over 1719,3494 0,0 '$icon'" img/$prefix-white.png
		convert img/black.png -units PixelsPerInch -density 1200 -draw "rotate 17 image over 1722,3495 0,0 '$icon'" img/$prefix-black.png
		convert img/black-mechanic-p2.png -units PixelsPerInch -density 1200 -draw "rotate 17 image over 1722,3495 0,0 '$icon'" img/$prefix-black-mechanic-p2.png
		convert img/black-mechanic-d2p3.png -units PixelsPerInch -density 1200 -draw "rotate 17 image over 1722,3495 0,0 '$icon'" img/$prefix-black-mechanic-d2p3.png
		convert img/black-mechanic-gears.png -units PixelsPerInch -density 1200 -draw "rotate 17 image over 1722,3495 0,0 '$icon'" img/$prefix-black-mechanic-gears.png
fi 