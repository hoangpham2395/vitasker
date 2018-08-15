<?php 

function getConfig($key, $default = null) 
{
	return (!empty(Config::get('config.' . $key))) ? Config::get('config.' . $key) : $default;
}
?>