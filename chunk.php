<?php
$path = "http://4khooneh.org/film/honarestan/roozbehyeganeh/tarahiyeweb/part1/part1t720.mp4";

// the file name of the download, change this if needed
$public_name = basename($path);

// get the file's mime type to send the correct content type header
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime_type = finfo_file($finfo, $path);

// send the headers
header("Content-Disposition: attachment; filename=$public_name;");
header("Content-Type: $mime_type");
header('Content-Length: ' . filesize($path));

// stream the file
$fp = fopen($path, 'rb');
fpassthru($fp);
exit;
?>