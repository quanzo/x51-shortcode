<?php
use \yii\helpers\Url;
use \yii\helpers\Html;
/*
[url path="/site/index" id="1"]Text[/url] => <a href="/site/index">Text</a>
[url path="/site/index" id="1"] => /site/index
*/
(\x51\classes\shortcode\Shortcode::getInstance())->add('url', function ($arParams, $content = ''){
    if (!empty($arParams['path'])) {
		$arUrl = [
			$arParams['path']
		];
		foreach ($arParams as $name => $val) {
			if ($name != 0 || $name != 'path') {
				$arUrl[$name] = $val;
			}
		}
		$href = Url::to($arUrl);
		if ($content) {
			return Html::a($content, $href);
		} else {
			return $href;
		}		
	}
	return '';
});