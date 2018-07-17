<?php

use App\Models\Setting;

function lang()
{
	return App::getlocale();
}

function og($object, $key, $default = null)
{
	$value = object_get($object, $key, $default);

	return !empty($value) ? $value : $default;
}

function get_setting($key, $lang = false, $default = null)
{
	$setting = new Setting();

	$value = $setting->where('key', $key)->first();

	if ($lang && $value) {
		$value = $value->translate($lang);

		return $value ? $value->locale_value : $default;
	}

	if ($value && $value->translations->count()) {
		return $value ? $value->translate(lang())->locale_value : $default;
	}

	return $value ? $value->value : $default;
}