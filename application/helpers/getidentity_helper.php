<?php

/**
 * Helpher untuk menampilkan identitas aplikasi
 *
 * @package CodeIgniter
 * @category Helpers
 * @author Ardi Tri Heru (arditriheruh@gmail.com)
 * @link https://github.com/arditriheru
 */

if (!function_exists('getTopTitle')) {
	function getTopTitle()
	{
		$getTopTitle = "GateLaw :: eQuiva";
		return $getTopTitle;
	}
}


if (!function_exists('getTitle')) {
	function getTitle()
	{
		$getTitle = "E Q U I V A";
		return $getTitle;
	}
}

if (!function_exists('getCopyright')) {
	function getCopyright()
	{
		$getCopyright = "<strong>&#169; " . date('Y') . "<a href='https://arditriheru.com' target='blank'> IT Fakultas Hukum UII </a></strong>v1.0";
		return $getCopyright;
	}
}

if (!function_exists('getVersion')) {
	function getVersion()
	{
		$getVersion = "<a href='https://arditriheru.com' style='color:grey' target='blank'>Dev. Ardi Tri Heru</a>";
		return $getVersion;
	}
}
