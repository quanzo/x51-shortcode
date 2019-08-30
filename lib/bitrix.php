<?php
$objShortcode = \x51\classes\shortcode\Shortcode::getInstance();
//(\x51\classes\shortcode\Shortcode::getInstance())->add('username', function ($arParams) { �� �������� � php 5.6
$objShortcode->add('username', function ($arParams) {
	global $USER;

	if ($USER->IsAuthorized()) {
		$n = $USER->GetFullName();
		if (!$n) {
			$n = $USER->GetLogin();
		}
		return $n;
	} else {
		return 'Guest';
	}
});

//(\x51\classes\shortcode\Shortcode::getInstance())->add('login', function ($arParams) { �� �������� � php 5.6
$objShortcode->add('login', function ($arParams) {
	global $USER;
	if ($USER->IsAuthorized()) {
		return $USER->GetLogin();
	} else {
		return 'Guest';
	}
});