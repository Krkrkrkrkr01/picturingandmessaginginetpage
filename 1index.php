<!DOCTYPE html>
<html>
<body>

<form action="1upload.php" method="post" enctype="multipart/form-data">
    File to upload:
    <p></p>
    <input type="file" name="fileToUpload" id="fileToUpload"/>
    <p></p>
    <input type="submit" value="Upload file" name="submit" />

</form>

<p></p>
<p></p>

<p>Files in /files :</p>
<?php

$dirs = array_filter(glob('*'), 'is_dir');
$fexists=false;
foreach ($dirs as $k=>$v) {
   if($v=="files") $fexists=true;
}

if($fexists==false) {
   mkdir("files", 0755);
}

$files1 = scandir("files");

if(count($files1)==2) {
  echo "None";
}

for($i=2; $i<count($files1); $i++) {
    echo "<p>".$files1[$i]."</p>";
}
?>
</body>
</html>
