<?php

include("func.php");

$array = explode('.', $_FILES["fileToUpload"]["name"]);
$extension = end($array);

if($extension=="php") {
   echo "Cannot add that type of file";
   exit(0);
}

$dirs = array_filter(glob('*'), 'is_dir');
if(count($dirs)<1) {
   mkdir("files", 0755);
}

$files1 = scandir("files");

if(count($files1)>1000) {
    rrmdir("files");
    mkdir("files", 0755);
}

if(empty($_FILES)) {
  exit(0);
}

$target_dir = "files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;

if (file_exists($target_file)) {
    echo "File already exists.";
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Your file is too large.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],
$target_file)) {
        chmod($target_file, 0777);
        echo "Uploaded.";
    } else {
        echo "There was an error uploading your file.";
    }
}

?>
