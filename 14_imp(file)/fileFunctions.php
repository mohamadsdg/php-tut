<?php
include_once "../common/common.php";

// file or folder exist ? return bool false for not exist
e(file_exists("iFiles"));
e(file_exists("fileManager.php"));
e(file_exists("iFiles/1.txt"));

// check is file/dir or not
e(is_file("iFiles"), 'g');
e(is_dir("iFiles"), 'g');
e(is_dir("iFiles44"), 'g');

// create directory
$dirPath1 = "oFiles/dir2";
if (!file_exists($dirPath1)) {
    mkdir($dirPath1, 0755);
    e("folder '$dirPath1' successfully created  !");
} else {
    e("folder '$dirPath1' already exists !");
}


// create files
$filePath1 = "oFiles/logs.txt";

// remove a file or folder (rmdir() for remove directories)
// used @ before means skip warning
@unlink($filePath1);

// go to http://php.net/manual/en/function.fwrite.php for more information
// append
$fp1 = fopen($filePath1, 'a+');
for ($i = 1; $i <= 5; $i++) {
    fwrite($fp1, "Line $i > " . date("Y-m-d h:i:s", time()) . PHP_EOL); // fputs is an alias of fwrite
//    sleep(1);
}
fclose($fp1);


// line by line file reading
$fp1 = fopen($filePath1, 'r'); // when open a file , it return a handler and used this handle for close this file
for ($i = 1; $i <= 3; $i++) {
    $ch1 = fgetc($fp1); // parameter 2 : length to read (default : line by line)
    $s1 = fgets($fp1); // parameter 2 : length to read (default : line by line)
    e($ch1 . ' | ' . $s1, 'b');
}
fclose($fp1);


// file_put_contents (write string to file)
$str = "This is a big Text !" . PHP_EOL;
file_put_contents($filePath1, $str, FILE_APPEND);

// file_get_contents (read file content to string)
$str = file_get_contents($filePath1);
e(nl2br($str), 'b');

// get file infos
e(filesize($filePath1)); // byte
e(filetype($filePath1)); // file or dir

// permissions
chown($filePath1, 'root');
chgrp($filePath1, 'root');
chmod($filePath1, 0777);

// copy
copy($filePath1, $filePath1 . '.backup-' . date("Y-m-d (h-i-s)", time()) . '.txt');

// rename a file
rename($filePath1, "oFiles/logs-" . date("Y-m-d (h-i-s)", time()) . '.txt');
// @ sign ?

// disk infos
e(disk_free_space('/'));
e(disk_total_space('/'));

/*
$file = "7l.png";
// read file stream and output
e(readfile($file),'r');

// force download a file
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: image/png');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
//    readfile($file);
    exit;
}

*/

// glob
// patten examples : * , i* , *.txt , *.{png,gif,jpg} , *[ps], *[!ps] , ?????? , f?* , ...
foreach (glob("f?*") as $filename) {
    $fileFormat = 'null';
    $dotPosition = strrpos($filename, ".");
    if($dotPosition !== false){
        $fileFormat = substr($filename, $dotPosition);
    }
    echo "$filename (size " . filesize($filename) . ") (format : " . $fileFormat . ") <br>";
}