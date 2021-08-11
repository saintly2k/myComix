<?php
include("config.php");
include("function.php");

$version = json_decode(file_get_contents("version.json"), true);
$server_version =  json_decode(file_get_contents("https://raw.githubusercontent.com/imueRoid/myComix/master/version.json"), true); 

#if($server_version['index'] > $version['index'] || $server_version['viewer'] > $version['viewer']) {
Import the echo "Update File".<br><br>";

$new_file = file_get_contents ("https://codeload.github.com/imueRoid/myComix/zip/master");
$fail = 0;
if($new_file === false) {
echo "Failed to import update file.<br>";
echo "Please try again in a second.
} else {
echo "Update File [br] Capacity: ".strlen ($new_file)." byte, hash: ". hash ("sha1", $new_file)."
$write_file = file_put_contents ("./update.zip", $new_file);
echo "Recorded File [br] Capacity: ".. write_file."byte, hash: ". hash ("sha1", file_get_contents ("./update.zip).";
if($write_file != strlen($new_file) file_get_contents: [*]
echo "Failed to record the update file to the server.<br>";
echo "Please try again in a second.
} else {
$zip = new ZipArchive;
if ($zip->open('update.zip') === TRUE) {
for($i = 1; $i < $zip->numFiles; $i++) {
$file_name = str_replace($zip->getNameIndex(0), "", $zip->getNameIndex($i));
if(is_file("config.php") && $file_name == "config.php") {
echo "config.php files will not be replaced.<br>";
} else {
$update_temp = $zip->getFromIndex($i);
echo $file_name." File Hash: ".hash ("sha1", $update_temp)", ";.
$write_file = file_put_contents($file_name, $update_temp);
echo "Hash of the recorded file: ".hash ("sha1", file_get_contents ($file_name);

if(hash("sha1", file_get_contents($file_name)) == hash("sha1", $update_temp)){
echo " — OK <br>";
} else {
echo " — Fail <br>";
$fail++;
Section
Section
Section
$zip->close();
unlink("update.zip");
} else {
echo 'Failed to decompress update file. Please try again in a second.
Section
Section
Section


#} if($server_version['index'] < $version['index'] && $server_version['viewer'] < $version['viewer']) {
The Dong-A Ilbo, Wednesday, Wednesday, and Wednesday,	echo.<br>";
#.
if($fail > 0) {
echo "One or more files write failed. Check your authority."
Section
Back to echo.</a>"
?>
