<!DOCTYPE html>
<html>
<head>
<title>Welcome !!!!!!!!</title>
<style>
input {
  color: black;
}

body {
  background-image: url("a1.jpg");
  background-repeat: repeat;
}

.main12 {
   text-decoration:none;
   color: black;
   background-color: white;
   border: 1px solid white;
   border-radius: 10px 10px;
   padding: 5px;
   font-weight:bold;
}
.main1 {
   text-decoration:none;
   color: white;
   border-radius: 5px 5px;
   padding: 5px;
   font-weight:bold;
   width:375px;
}

.main2 {
   color: white;
}

.main3 {
   text-decoration:none;
   color: black;
   background-color: white;
   border: 1px solid white;
   border-radius: 5px 5px;
   padding: 5px;
   font-weight:bold;
   width:100px;
}

.w1 {
   color: white;
}
</style>
</head>
<body>
<h1 class="main1">The place for all people.</h1>

<?php

include("func.php");

$dirs = array_filter(glob('*'), 'is_dir');

$cannotcreate=false;


if(count($dirs)>60) {
  $cannotcreate=true;
}


if(!empty($_POST['rname'])&$cannotcreate==false) {
   $_POST['rname'] = strip_tags($_POST['rname']);
   $_POST['rname'] = str_replace(' ', 'space21326', $_POST['rname']);
   $_POST['rname'] = str_replace(',', 'comma21326', $_POST['rname']);
   $_POST['rname'] = str_replace('?', 'q21326', $_POST['rname']);

   mkdir($_POST['rname'], 0755);
   $file = 'index2.php';
   $newfile = 'index.php';
   if (!copy($file, $_POST['rname'].'/'.$newfile)) {
     echo "Error\n";
   }
   chmod($_POST['rname'].'/'.$newfile, 0744);

   $file = 'dref.php';
   $newfile = 'dref.php';

   if (!copy($file, $_POST['rname'].'/'.$newfile)) {
     echo "Error\n";
   }

   $file = 'renewing.php';
   $newfile = 'renewing.php';

   if (!copy($file, $_POST['rname'].'/'.$newfile)) {
     echo "Error\n";
   }

   chmod($_POST['rname'].'/'.$newfile, 0744);

   $file = 'ilist.php';
   $newfile = 'ilist.php';

   if (!copy($file, $_POST['rname'].'/'.$newfile)) {
     echo "Error\n";
   }

   chmod($_POST['rname'].'/'.$newfile, 0744);

   $file = 'findlastmdate.php';
   $newfile = 'findlastmdate.php';

   if (!copy($file, $_POST['rname'].'/'.$newfile)) {
     echo "Error\n";
   }

   chmod($_POST['rname'].'/'.$newfile, 0744);

   $file = 'func.php';
   $newfile = 'func.php';

   if (!copy($file, $_POST['rname'].'/'.$newfile)) {
     echo "Error\n";
   }

   chmod($_POST['rname'].'/'.$newfile, 0744);

}

$dirs = array_filter(glob('*'), 'is_dir');

if(count($dirs)>0) {
  echo "<h2 class='main2'>Topics</h2>";
}

$dirs = array_filter(glob('*'), 'is_dir');

foreach ($dirs as $file) {
  $file2= str_replace('space21326', '&nbsp;', $file);
  $file2= str_replace('comma21326', ',', $file2);
  $file2= str_replace('q21326', '?', $file2);
  if($file=="files") continue;
  if($file=="files2") continue;
  if($file=="workinterview") continue;

  $dir1='//'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
  $output = file_get_contents('http:'.$dir1.$file.'/findlastmdate.php');
  if($output!="") {
          $date12=date("d.m.Y H:i:s", strtotime($output));
          $d_start    = new DateTime($date12);
          $currentdate = date('d.m.Y H:i:s', time());
          $d_end      = new DateTime($currentdate);
          $diff = $d_start->diff($d_end);
          $delete1=false;
          if(!($diff->format('%d')<1000||$diff->format('%d')==1000&&$diff->format('%h')<1))
$delete1=true;
          if($delete1) {
               rrmdir('/'.$file);
               continue;
          }
  }
  echo '<a class="main12" href=\'http:'.$dir1.$file.'\'>'.$file2.'</a>';
  echo "<p></p>";
  $path_parts = pathinfo($file.'/Msg.dat');
  if(!class_exists($path_parts['filename'])) {
     continue;
  }
}


?>
<p style="height:50px;"> </p>

<form method="POST">
<input name="rname"/>
<input type="submit" class="main3" value="Make a topic"/>
</form>
<p class="w1" style="width: 438px;">
In addition, it is possible to share files under */1index.php. Files go to
*/files. * - the portal.
If you want to share a picture file, then change extension to other file
type.
Want to advertise your company? Use then the contacts below.
</p>
<p></p>
<p></p>
<p></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p class="w1">Kristjan Robam</p>
<p class="w1">
372 6861327
</p>
</body>
</html>

