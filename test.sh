#!/bin/bash

if [[ ! -e "bin" ]]; then
	echo "`date +%T` - [I] Creating bin folder..."
	mkdir bin
fi

if [[ ! -e "bin/phpunit" ]]; then
	echo "`date +%T` - [I] Downloading phpunit executable..."
	wget -O "bin/phpunit" "https://phar.phpunit.de/phpunit-9.phar"

	if [[ $? -eq 0 ]]; then
		echo "`date +%T` - [S] Successfully download 'phpunit'! Marking it as executable..."
		chmod +x "bin/phpunit"

		echo "`date +%T` - [S] Installing 'phpunit' dependencies..."
		sudo apt install php-xml php-mbstring

		if [[ ! $? -eq 0 ]]; then
			echo "`date +%T` - [X] Could not install PHP modules which 'phpunit' depends on! Please, install and enable 'xml' and 'mbstring'"
		fi
	else
		echo "`date +%T` - [X] Could not download 'phpunit'! Download it manually from 'https://phar.phpunit.de/phpunit-9.phar' and save it as './bin/phpunit', also marking it as executable."
		exit -1
	fi
fi

echo "`date +%T` - [S] Starting tests with phpunit"

./bin/phpunit --bootstrap autoload_classes.php unit_tests