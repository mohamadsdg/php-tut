<link rel="stylesheet" href="../../common/styles.css"/>
<?php

echo '<pre>' ;
    print_r($_FILES);
    print_r($_POST);
echo '</pre>';

### upload file
$uploadDir = __DIR__ . '/file/';
$fileName ='SDG -' . rand(1, 100) . $_FILES['resume']['name'];
$uploadFile = $uploadDir . $fileName;
$allowedTypes = array('image/png', 'image/jpg', 'image/jpeg');

//$resultUpload = move_uploaded_file($_FILES['testFile']['tmp_name'], $uploadFile); // status 1 mean upload successfully

if (in_array($_FILES['resume']['type'], $allowedTypes)) {
    if (move_uploaded_file($_FILES['resume']['tmp_name'], $uploadFile)) {
        echo "File is Valid and was successfully Uploaded !";
    } else {
        echo "Error while Uploading ..";
    }
} else {
    echo "Cannot Upload this file format ...";
}
### END upload file


$str = "<table>
    <thead>
        <th>Field name</th>
        <th>User Data</th>
    </thead> ";

    foreach ($_POST as $key => $value) {
        $str .= '<tr>';
        if (is_array($value)) {
            $str .= "<td>$key</td>";
            $str .= "<td>" . implode(" , ", $value) . "</td>";
        } else {
            $str .= "<td>$key</td><td>" . nl2br($value) . "</td>";
        }
        $str .= '</tr>';
}
$str .= "<tr><td>profile-pic</td><td><a href= 'http://localhost/_Project/php/09_imp/miniProject/file/" . $fileName . "'>download</a></td></tr>";
$str .= "</table>";

echo $str;


