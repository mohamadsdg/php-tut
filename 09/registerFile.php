<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My First Form</title>
</head>
<body>
<form action="saveFile.php" method="post" enctype="multipart/form-data">

    <label for="file1"></label>
    <input type="file" id="file1" name="testFile">

    <br/><br/>

    <label for="txt"></label>
    <textarea id="txt" placeholder="type ...." maxlength="100" name="caption" style="height: 250px;width: 300px;"></textarea>

    <br/><br/>
    <input type="submit" value=" start uploading ..."/>
</form>
</body>
</html>