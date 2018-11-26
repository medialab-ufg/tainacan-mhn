#!/bin/bash



# Configure aqui o caminho para a pasta wp-content do WordPress
WP_CONTENT_FOLDER=~/devel/sample-wp-content




cd /tmp 

wget http://tainacan.org/nightly-builds/tainacan-interface-nightly.zip

unzip tainacan-interface-nightly.zip
rm tainacan-interface-nightly.zip

wget https://github.com/medialab-ufg/tainacan-mhn/archive/master.zip -O tainacan-mhn-master.zip

unzip tainacan-mhn-master.zip
rm tainacan-mhn-master.zip

cd $WP_CONTENT_FOLDER

rm -r themes/tainacan-interface/*

cp -R /tmp/tainacan-interface/* themes/tainacan-interface/

rm -r themes/tainacan-mhn/*

cp -R /tmp/tainacan-mhn-master/* themes/tainacan-mhn/

rm -r /tmp/tainacan-mhn-master
rm -r /tmp/tainacan-interface
