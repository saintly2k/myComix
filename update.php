<?php
include("config.php");
include("function.php");

$version = json_decode(file_get_contents("version.json"), true);
$server_version =  json_decode(file_get_contents("https://raw.githubusercontent.com/saintly2k/myComix_ENGLISH/master/version.json"), true); 

#if($server_version['index'] > $version['index'] || $server_version['viewer'] > $version['viewer']) {
	echo "Import the update file. <br><br>";

	$new_file = file_get_contents("https://codeload.github.com/saintly2k/myComix_ENGLISH/zip/master");
$fail = 0;
	if($new_file === false) {
		echo "Failed to import update file. <br>";
		echo "Please try again after a while. <br>";
	} else {
		echo "Update <br> Status: ".strlen($new_file)."byte, hash: ".hash("sha1", $new_file)."<br>";
		$write_file = file_put_contents("./update.zip", $new_file);
		echo "Recorded Files <br> Status: ".$write_file."byte, hash: ".hash("sha1", file_get_contents("./update.zip"))."<br>";
		if($write_file != strlen($new_file) || hash("sha1", file_get_contents("./update.zip")) != hash("sha1", $new_file))  {
			echo "Failed to log the update file to the server. <br>";
			echo "Please try again after a while. <br>";
		} else {
			$zip = new ZipArchive;
			if ($zip->open('update.zip') === TRUE) {
				for($i = 1; $i < $zip->numFiles; $i++) {
					$file_name = str_replace($zip->getNameIndex(0), "", $zip->getNameIndex($i));
					if(is_file("config.php") && $file_name == "config.php") {
						echo "Do not replace the config.php file. <br>";
					} else {
						$update_temp = $zip->getFromIndex($i);
						echo $file_name." File Hash: ".hash("sha1", $update_temp).", ";
						$write_file = file_put_contents($file_name, $update_temp);
						echo " File Hash: ".hash("sha1", file_get_contents($file_name));
						
						if(hash("sha1", file_get_contents($file_name)) == hash("sha1", $update_temp)){
							echo " -------------- OK! <br>";
						} else {
							echo " -------------- Fail <br>";
							$fail++;
						}
					}
				}
					$zip->close();
					unlink("update.zip");
			} else {
				echo 'Failed to decompress update file. Please try again after a while. <br>';
			}
		}
	}
	
		
#} if($server_version['index'] < $version['index'] && $server_version['viewer'] < $version['viewer']) {
#	echo "No updates are required. <br>";
#}
if($fail > 0) {
	echo "One or more files write failed. Please check your authorization.";
}
echo "<br><br><a href=index.php>Go back home.</a>"
?>
