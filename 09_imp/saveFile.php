<?php

echo '<pre>';
print_r($_FILES);
print_r($_POST);
echo '</pre>';

### validate file js
$dataCaption = $_POST['caption'];
addslashes($dataCaption);


### END validate file js


### upload file
$uploadDir = __DIR__ . '/file/';
$uploadFile = $uploadDir . 'SDG -' . rand(1, 100) . $_FILES['testFile']['name'];
$allowedTypes = array('image/png', 'image/jpg', 'image/jpeg');

//$resultUpload = move_uploaded_file($_FILES['testFile']['tmp_name'], $uploadFile); // status 1 mean upload successfully

if (in_array($_FILES['testFile']['type'], $allowedTypes)) {
    if (move_uploaded_file($_FILES['testFile']['tmp_name'], $uploadFile)) {
        echo "File is Valid and was successfully Uploaded !";
    } else {
        echo "Error while Uploading ..";
    }
} else {
    echo "Cannot Upload this file format ...";
}
### END upload file

/*  echo $uploadDir . '<br>';
    echo $uploadFile . '<br>';*/
//echo $resultUpload;


