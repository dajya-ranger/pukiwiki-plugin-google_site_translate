<?php

/*
 * google_site_translate.inc.php
 *
 * Googleサイト翻訳プラグイン
 *
 * 作成者：オヤジ戦隊ダジャレンジャー(Twitter:@dajya_ranger_)
 * サイト：SEの良心（https://dajya-ranger.com/）
 *
 * 修正歴：
 *
 * Version 0.1.0
 * Date    2019/10/13
 * Update  
 * License The same as PukiWiki
 *
 */

function plugin_google_site_translate_params($lang_args) {
	// 翻訳言語パラメータ設定用
	$params = array();

	// 引数チェック＆パラメータ設定用
	$languages = array(
		'ja'	=> '日本語',
		'is'	=> 'アイスランド語',
		'ga'	=> 'アイルランド語',
		'az'	=> 'アゼルバイジャン語',
		'af'	=> 'アフリカーンス語',
		'am'	=> 'アムハラ語',
		'ar'	=> 'アラビア語',
		'sq'	=> 'アルバニア語',
		'hy'	=> 'アルメニア語',
		'it'	=> 'イタリア語',
		'yi'	=> 'イディッシュ語',
		'ig'	=> 'イボ語',
		'id'	=> 'インドネシア語',
		'cy'	=> 'ウェールズ語',
		'uk'	=> 'ウクライナ語',
		'uz'	=> 'ウズベク語',
		'ur'	=> 'ウルドゥ語',
		'et'	=> 'エストニア語',
		'eo'	=> 'エスペラント語',
		'nl'	=> 'オランダ語',
		'kk'	=> 'カザフ語',
		'ca'	=> 'カタルーニャ語',
		'gl'	=> 'ガリシア語',
		'kn'	=> 'カンナダ語',
		'el'	=> 'ギリシャ語',
		'ky'	=> 'キルギス語',
		'gu'	=> 'グジャラト語',
		'km'	=> 'クメール語',
		'ku'	=> 'クルド語',
		'hr'	=> 'クロアチア語',
		'xh'	=> 'コーサ語',
		'co'	=> 'コルシカ語',
		'sm'	=> 'サモア語',
		'jw'	=> 'ジャワ語',
		'ka'	=> 'ジョージア（グルジア）語',
		'sn'	=> 'ショナ語',
		'sd'	=> 'シンド語',
		'si'	=> 'シンハラ語',
		'sv'	=> 'スウェーデン語',
		'zu'	=> 'ズールー語',
		'gd'	=> 'スコットランド ゲール語',
		'es'	=> 'スペイン語',
		'sk'	=> 'スロバキア語',
		'sl'	=> 'スロベニア語',
		'sw'	=> 'スワヒリ語',
		'su'	=> 'スンダ語',
		'ceb'	=> 'セブアノ語',
		'sr'	=> 'セルビア語',
		'st'	=> 'ソト語',
		'so'	=> 'ソマリ語',
		'th'	=> 'タイ語',
		'tl'	=> 'タガログ語',
		'tg'	=> 'タジク語',
		'ta'	=> 'タミル語',
		'cs'	=> 'チェコ語',
		'ny'	=> 'チェワ語',
		'te'	=> 'テルグ語',
		'da'	=> 'デンマーク語',
		'de'	=> 'ドイツ語',
		'tr'	=> 'トルコ語',
		'ne'	=> 'ネパール語',
		'no'	=> 'ノルウェー語',
		'ht'	=> 'ハイチ語',
		'ha'	=> 'ハウサ語',
		'ps'	=> 'パシュト語',
		'eu'	=> 'バスク語',
		'haw'	=> 'ハワイ語',
		'hu'	=> 'ハンガリー語',
		'pa'	=> 'パンジャブ語',
		'hi'	=> 'ヒンディー語',
		'fi'	=> 'フィンランド語',
		'fr'	=> 'フランス語',
		'fy'	=> 'フリジア語',
		'bg'	=> 'ブルガリア語',
		'vi'	=> 'ベトナム語',
		'iw'	=> 'ヘブライ語',
		'be'	=> 'ベラルーシ語',
		'fa'	=> 'ペルシャ語',
		'bn'	=> 'ベンガル語',
		'pl'	=> 'ポーランド語',
		'bs'	=> 'ボスニア語',
		'pt'	=> 'ポルトガル語',
		'mi'	=> 'マオリ語',
		'mk'	=> 'マケドニア語',
		'mr'	=> 'マラーティー語',
		'mg'	=> 'マラガシ語',
		'ml'	=> 'マラヤーラム語',
		'mt'	=> 'マルタ語',
		'ms'	=> 'マレー語',
		'my'	=> 'ミャンマー語',
		'mn'	=> 'モンゴル語',
		'hmn'	=> 'モン語',
		'yo'	=> 'ヨルバ語',
		'lo'	=> 'ラオ語',
		'la'	=> 'ラテン語',
		'lv'	=> 'ラトビア語',
		'lt'	=> 'リトアニア語',
		'ro'	=> 'ルーマニア語',
		'lb'	=> 'ルクセンブルク語',
		'ru'	=> 'ロシア語',
		'en'	=> '英語',
		'ko'	=> '韓国語',
		'zh-CN'	=> '中国語（簡体）',
		'zh-TW'	=> '中国語（繁体）'
	);

	// 引数チェック
	if ( isset($lang_args[0]) && ($lang_args[0] != '') ) {
		foreach ($lang_args as $lang_key) {
			if (! (isset($languages[$lang_key])) ) {
				// 引数の翻訳言語が一致しない場合
				$params['_error'] = '引数の指定にエラーがあります: ' .  $lang_key;
				return $params;
			} else {
				// 翻訳言語パラメータにセット
				$params[$lang_key] = $languages[$lang_key];
			}
		}
	} else {
		// 引数による翻訳言語指定がない場合は全部
		$params = $languages;
	}

	return $params;
}

function plugin_google_site_translate_convert() {
	// ブロック型プラグイン
	// #google_site_translate([翻訳先言語1],[翻訳先言語2],･･･[翻訳先言語n])
	$args = func_get_args();
	$languages;

	// パラメータセット
	$params = plugin_google_site_translate_params($args);
	if (isset($params['_error']) && $params['_error'] != '') {
		// パラメータエラーがある場合
		return '#google_site_translate ' . $params['_error'];
	}

	// 翻訳言語セット
	foreach ($params as $key => $value) {
		$languages = $languages . $key . ',';
	}
	$languages = substr($languages, 0, strlen($languages) -1);

$html_code = <<< EOM
<style>
	#google_site_translate_element2 {
		font-size: 14px!important;
	}
	.goog-te-combo {
		margin: 4px 0;
		font-family: arial;
		font-size: 14px!important;
		width: 100%;
		vertical-align: baseline;
		border-radius: 5px;
	}
	select, input[type="color" i][list] {
		background-color: rgb(248, 248, 248);
		border-width: 1px;
		border-style: solid;
		border-color: rgb(166, 166, 166);
		border-image: initial;
		padding: 0;
	}
	select:not(:-internal-list-box) {
		overflow: visible !important;
	}
	select {
		-webkit-writing-mode: horizontal-tb !important;
		text-rendering: auto;
		color: black;
		letter-spacing: normal;
		word-spacing: normal;
		text-transform: none;
		text-indent: 0px;
		text-shadow: none;
		text-align: start;
		-webkit-appearance: menulist;
		align-items: center;
		white-space: pre;
		-webkit-rtl-ordering: logical;
		background-color: white;
		cursor: default;
		font: 400 13.3333px Arial;
	}
	.goog-logo-link, .goog-logo-link img {
		font-size: 14px;
		font-weight: bold;
		color: #444;
		text-decoration: none;
	}
</style>
<div id="google_site_translate_element2"></div>
<script type="text/javascript">
function googleTranslateElementInit2() {
	new google.translate.TranslateElement({
		pageLanguage: 'ja', includedLanguages: '{$languages}', autoDisplay: false}, 'google_site_translate_element2');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
<script type="text/javascript">
function GoogleTranslateGetCurrentLang() {
	var keyValue = document['cookie'].match('(^|;) ? googtrans = ([^;]*)(;|$)');
	return keyValue ? keyValue[2].split('/')[2] : null;
}
function GoogleTranslateFireEvent(element, event) {
	try {
		if(document.createEventObject) {
			var evt = document.createEventObject();
			element.fireEvent('on' + event, evt)
		} else {
			var evt=document.createEvent('HTMLEvents');
			evt.initEvent(event, true, true);
			element.dispatchEvent(evt)
		}
	}catch(e)
	{
	}
}
function doGoogleTranslate(lang_pair) {
	if (lang_pair.value) lang_pair = lang_pair.value;
	if (lang_pair == '') return;
	var lang=lang_pair.split('|')[1];
	if (GoogleTranslateGetCurrentLang() == null && lang == lang_pair.split('|')[0]) {
		return;
	}
	var teCombo;
	var sel = document.getElementsByTagName('select');
	for (var i=0; i < sel.length; i++) {
		if(/goog-te-combo/.test(sel[i].className)){
			teCombo = sel[i];
			break;
		}
	}
	if (document.getElementById('google_site_translate_element2') == null || document.getElementById('google_site_translate_element2').innerHTML.length==0 || teCombo.length==0 || teCombo.innerHTML.length == 0) {
		setTimeout(function(){doGoogleTranslate(lang_pair)}, 500);
	} else {
		teCombo.value = lang;
		GoogleTranslateFireEvent(teCombo, 'change');
		GoogleTranslateFireEvent(teCombo, 'change');
	}
}
</script>
EOM;

	return $html_code;
}

function plugin_google_site_translate_inline() {
	// インライン型プラグイン（&google_site_translate;）としては動作しない
	$args = func_get_args();
	return call_user_func_array('Do not use inline google_site_translate: ', $args);}

?>
