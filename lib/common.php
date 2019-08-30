<?php
$shortcodes = \x51\classes\shortcode\Shortcode::getInstance();
$shortcodes->add('bold', function ($arParams, $content = ''){
    return '<strong>'.$content.'</strong>';
});

$shortcodes->add('day', function ($arParams) {
	return date('d');
});

$shortcodes->add('year', function ($arParams) {
	return date('Y');
});