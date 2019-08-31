#!/bin/bash
clear

echo
echo ----- Shortcode tests -----
echo 
phpunit --bootstrap ./bootstrap.php ShortcodeTest.php
