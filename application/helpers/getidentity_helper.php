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
		$getTopTitle = "UndanganKu :: Digital Wedding Invitation";
		return $getTopTitle;
	}
}


if (!function_exists('getTitle')) {
	function getTitle()
	{
		$getTitle = "U N D A N G A N K U";
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
