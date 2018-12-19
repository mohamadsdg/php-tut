<html>
<head>
    <title>7Learn File Manager</title>
    <style type="text/css">
        body, table {
            font-family: tahoma;
            font-size: 14px;
        }

        a, a:visited {
            color: #1887e5;
            text-decoration: none;
        }

        a:hover {
            color: #555;
        }

        .back a {
            color: brown !important;
        }

        ul {
            list-style: none;
            line-height: 22px;
        }

        li {
            margin: 3px 0 0 0;
        }

        li:hover {
            background-color: #f7f7f7 !important;
        }

        li.file, li.folder, li.png, li.gif, li.jpg, li.back {
            padding-left: 24px;
            color: #e6981c;
        }

        li.file {
            background: transparent url("image/file.png") no-repeat left 3px;
        }

        li.folder {
            color: #e6981c !important;
            background: transparent url("image/folder.png") no-repeat left 3px;
        }

        li.back {
            background: transparent url("image/back.png") no-repeat left 3px;
        }

        span.filename, .actions {
            min-width: 300px;
            display: inline-block;
        }

        .png, .jpg, .gif {
            background: transparent url("image/img.png") no-repeat left 3px !important;
        }
        .htm,.html {
            background: transparent url("image/html.png") no-repeat left 3px !important;
        }

        div.msg {
            background-color: #ffd179;
            padding: 7px;
            margin: 10px;
        }

    </style>
</head>
<body>

<?php
/*
 * @param string $file Filepath
 * @param int $digits Digits to display
 * @return string|bool Size (KB, MB, GB, TB) or boolean
 */
function getNiceFileSize($file, $digits = 2)
{
    if (is_file($file)) {
        $filePath = $file;
        if (!realpath($filePath)) {
            $filePath = $_SERVER["DOCUMENT_ROOT"] . $filePath;
        }
        $fileSize = filesize($filePath);
        $sizes = array("TB", "GB", "MB", "KB", "B");
        $total = count($sizes);
        while ($total-- && $fileSize > 1024) {
            $fileSize /= 1024;
        }
        return round($fileSize, $digits) . " " . $sizes[$total];
    }
    return false;
}

function rmDirectory($dir) {
    foreach(glob($dir . '/*') as $file) {
        if(is_dir($file)) rrmdir($file); else unlink($file);
    } rmdir($dir);
}

if (isset($_GET['rm'])) {
    $file2Remove = $_GET['rm'];
    if(is_dir($file2Remove)){
        rmDirectory($file2Remove);
        echo "<div class='msg'>Directory $file2Remove and its content successfully deleted ...</div>";
    }else{
        @unlink($file2Remove);
        echo "<div class='msg'>File $file2Remove successfully deleted ...</div>";
    }
}

if(isset($_POST['filepath'],$_POST['filecontent'])){
    file_put_contents($_POST['filepath'],$_POST['filecontent']);
    echo "<div class='msg'>File {$_POST['filepath']} successfully saved ...</div>";
}

if (isset($_GET['edit'])) {
    $file2edit = $_GET['edit'];
    if (!file_exists($file2edit)) {
        echo "<div class='msg'><b>Error :</b> File $file2edit not exists !</div>";
    } else {
        echo "Editing file $file2edit : <br>";
        ?>
        <form action="" method="post">
            <textarea name="filecontent" cols="100" rows="10"><?php echo file_get_contents($file2edit); ?></textarea><br>
            <input name="filepath" type="hidden" value="<?php echo $file2edit; ?>"/>
            <input type="submit" name="" value=" Save ">
        </form>

    <?php
    }
}

if (isset($_GET['dir'])) {
    $currDir = $_GET['dir'];
} else {
    $currDir = 'files';
}
if (substr($currDir, strlen($currDir) - 1) != "/") {
    $currDir .= '/';
}

echo '<h3>List of files in folder : <span style="color:brown">' . $currDir . '</span></h3>';
echo '<ul>';
echo '<li class="folder back">';
$parentDir = dirname($currDir);
echo '<span class="filename"><a href="?dir=' . $parentDir . '"> Go Back to ' . str_replace($currDir, '', $parentDir) . "</a></span>";
echo '</li>';

foreach (glob($currDir . '*') as $filename) {
    $fileFormat = '';
    if (is_dir($filename)) {
        $type = 'folder';
    } else {
        $type = 'file';
        $dotPosition = strrpos($filename, ".");
        if ($dotPosition !== false) {
            $fileFormat = substr($filename, $dotPosition + 1);
        }
    }
    echo '<li class="' . $type . " $fileFormat " . '">';
    if (is_dir($filename)) {
        echo '<span class="filename"><a href="?dir=' . $filename . '">' . str_replace($currDir, '', $filename) . "</a></span>";
    } else {
        echo '<span class="filename">' . str_replace($currDir, '', $filename) . "</span>";
    }

    echo '<span class="actions">';
    echo "<a href='?dir={$currDir}&rm={$filename}' " . ' onclick="return confirm(\'Are you sure to remove ' . $filename . ' \')" ' . "> delete </a>";
    if (in_array($fileFormat, array('txt', 'php', 'html', 'htm'))) {
        echo "<a href='?dir={$currDir}&edit={$filename}' > &nbsp; &nbsp;  edit </a>";
    }
    echo '</span>';
    echo '<span class="infos">';
    echo getNiceFileSize($filename);
    echo '</span>';

    echo '</li>';
}
echo '</ul>';

?>

</body>
</html>
