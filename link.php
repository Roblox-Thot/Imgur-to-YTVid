<?php

function CheckUser($header){
	$arr = array('DiscordBot', '+https://discordapp.com', 'electron', 	'discord', 'Firefox/38');
	foreach ($arr as &$value) {
		if (strpos($header, $value) !== false){
	    	return true;
		}
	}
	return false;
}

function GiveFile($file){
	if (file_exists($file))
	{
	    $size = getimagesize($file);

	    $fp = fopen($file, 'rb');

	    if ($size and $fp)
	    {
	        header('Content-Type: '.$size['mime']);
	        header('Content-Length: '.filesize($file));

	        fpassthru($fp);

	        exit;
	    }
	}
}

if ($_SERVER['QUERY_STRING'] != ""){
    $videoId = $_SERVER['QUERY_STRING'];
}else{
    $videoId = "9rWjIWBUfdk";
}

if (CheckUser($_SERVER['HTTP_USER_AGENT'])){
	#GiveFile('./image0.gif');
    header('Location: https://i.imgur.com' . $_SERVER['REQUEST_URI'], true, 301);
}else{

    // Redirect
    #header('Location: https://i.imgur.com' . $_SERVER['REQUEST_URI'], true, 301);
    header('Location: https://www.youtube.com/watch?v=' . $videoId);
}
?>