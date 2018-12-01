<style>
    body{
        margin-bottom: 200px;
    }
    .line {
        width: 80%;
        display: block;
        margin: 5px auto;
        padding: 5px;
        border-radius: 5px;
    }

    .s {
        background-color: #f7f7f7;
    }

    .b {
        background-color: #D8E9FF;
    }

    .r {
        background-color: #f7e5d1;
    }

    .g {
        background-color: #d9f2d9;
    }
    .xdebug-var-dump{
        margin: 0;
    }

</style>
<?php
$site = "http://www.7Learn.com";
$course = "7Learn Professional PHP Course";
$teacher = "Loghman Avand";
$desc = "<b>PHP</b> is a server-side scripting language <span style='color: red'>designed for web development</span>
but also used as a general-purpose <a href='#programming'>programming language</a>";
$tags = "php,tutorial,programming,7Learn,web,html,css";
$password = "myPass";
$code = '
<script src="malware.js"></script>
<script>
    var name="Loghman Avand";
    alert(name);
</script>
';

function e($var, $colorClass = 's')
{
    if($var == false){
        echo "<span class='line {$colorClass}'>";
        var_dump($var);
        echo "</span>";
        return;
    }
    if (is_array($var)) {
        echo '<pre class="line ' . $colorClass . '">';
        print_r($var);
        echo "</pre>";
    } else {
        echo "<span class='line {$colorClass}'>" . $var . "</span>";
    }
}

//strlen
e(strlen($desc));
e(strlen($site));

// lower upper
e(strtolower($teacher));
e(strtoupper($teacher));
e(ucfirst("hi baby"));
e(ucwords($desc));

// addslash
e($desc);
e(addslashes($desc)); // desc: before important such a " add backSlash for prevent destructive code
//e(addslashes($code));

// chr , ord
e("(&#97;&#10;&#98;)"); // &# direct before ascii code after finished used; for return character without chr (by html transpiler )
e(chr(98)); // get ascii code and return character
e(ord("a")); // get character and return ascii code

// count_chars
// return ascii table and show each ascii code how many used in string
e(count_chars($teacher, 1)); // 0 show zeros
//Modes
// 0 - an array with the byte-value as key and the frequency of every byte as value.
// 1 - same as 0 but only byte-values with a frequency greater than zero are listed.
// 2 - same as 0 but only byte-values with a frequency equal to zero are listed.
// 3 - a string containing all unique characters is returned.
// 4 - a string containing all not used characters is returned.



// chunk_split
e(chunk_split($desc, 20, "<br>"));
//para1=>string
//para2=>number
//para3=>separator
// how work ==> after each chunklen print separator

// cryptography (code gozari reshteha )
e($password, 'b');
e(crc32($password), 'b');
e(sha1($password), 'b');
e(hash("sha512", $password), 'b');
e(hash("sha256", $password), 'b');
e(md5($password), 'b');
$hashedPassword = sha1($password);
$inputPassword = "";
if (isset($_GET['pass'])) {
    $inputPassword = $_GET['pass'];
}
// save teacher hash in database
// check user hash with saved hash
if ($hashedPassword == sha1($inputPassword)) {
    e("Login Ok !<br>Welcome dear User ...", 'g');
} else {
    e("Incorrect Password ...", 'r');
}

// explode , implode join
$tagsArr = explode(',|a', $tags); //split with param1(separator) and send to array
e($tags);
e($tagsArr);
$tagsArr[0] = $tagsArr[1] = "Loghman";
$str = implode('-', $tagsArr);  //JOIN array with param1(separator) and send to string
$str2 = join('|', $tagsArr); // same as implode
e($str);
e($str2);

// html_entity_decode
e(htmlentities($desc),'b'); // echo html tags also // for security
e(html_entity_decode($desc),'b'); // barAx ghabli

// lcfirst , ltrim ,rtrim , trim
e(lcfirst($teacher)); // lowerCase first character string
$family = "  Avand       ";
e($family);
e(trim($family)); // god for save data in database
e(ltrim($family));
e(rtrim($family));
e(trim($family,'A ')); // param2 for remove which character in first or last of string

// nl2br
$msg = "Salam
Welcome to
7Learn.com";
e($msg);
e(nl2br($msg)); // textarea inputs (save on in output)

// parse_str ***
// reshteye vorodi parse_str shabohe querystring hastesh va bayad hamishe be inform bashad
// ta kar konad (jaleb shoood )
parse_str("first=value&arr[]=foo+bar&arr[]=baz"); // extract variable from string :|
e($first);
e($arr);

// parse_url
e(parse_url($site . ':2424/login')); // get url and return array of url

//printf ****
// tarif var to khode hamin function
// be nahvi ke ye string migire
// to in string ba % mitonim var tarif konim
// meghdar haye var ro to parametr haye badi midim
printf("%s Dear User %d ", "Hi", 23);

// similar_text
$percent = 0;
e(similar_text("loghman", "loghman Avand", $percent));
e($percent);

// str_pad ***
e(str_pad($teacher, 25, "*", STR_PAD_BOTH));
e(str_pad($teacher, 25, "*", STR_PAD_LEFT));
e(str_pad($teacher, 25, "*", STR_PAD_RIGHT));
$num = rand(0,9999999); // sample
e(str_pad($num, 12, "0", STR_PAD_LEFT));

// str_replace
// peida kardam string dar param2
// jaygozari string mojod dar param2 bejaye param1
// khob hala in karaharo toye felan reshte ke dar param3 hastesh anjambede
e($site);
e(str_replace("7learn","Google",$site));  // not case sensitive
e(str_ireplace("7learn","Google",$site)); // case sensitive


// str_repeat
e(str_repeat($teacher.'<br>',5));
e(str_repeat('*-',30));

// str_shuffle
e(str_shuffle($teacher));

//strip_tags
e($desc);
e(strip_tags($desc)); //remove tag html in string
e(strip_tags($desc,"<b><span>")); // param2 allowed tags

// str_split
// joda sazi reshte ba tedad khaas va dar nahayat ferestadan dar array
e(str_split($desc));
e(str_split($desc,20));
e(str_split(strip_tags($desc),20));



// strstr - from occurrence to end
// az sare needle ke peidash kar ta akhare reshtaro mide
// yani ta ghablesh ro nemide
e(strstr($desc,"script"));

// strpos
e(strpos($desc,"script"),'g'); // case-sensitive
e(strpos($desc,"PHP"),'g');
e(strpos($desc,"Script"),'g');
e(stripos($desc,"Script"),'g'); // case-insensitive
if(strpos($desc,"Script") !== false){
    // search has a result
}else{
    // search has no result
}

//substr_count
e(substr_count($desc,"PHP"));
e(substr_count($desc,"php"));
e(substr_count(strtolower($desc),"php"));
e(substr_count($desc,"s"));

// substr
e(substr($desc,10));
e(substr($desc,10,9));


// strcmp (compare)
e(strcmp("7Learn","7learn"),'b'); // < 0 if str1 < str2
e(strcmp("7Learn","7Learn"),'b'); // = 0 if str1 = str2
e(strcmp("Learn","7Learn"),'b'); // > 0 if str1 > str2
// if string for compare amaliyate moghayese ba code ascii hastesh

// wordwrap
e(wordwrap(strip_tags($desc),30,"<br>")); // notice : words not broken !

// compress,decompress ****
$desc = str_repeat(strip_tags($desc),1);
e($desc,'r');
e(strlen($desc),'r');
$gzDesc = gzcompress($desc);
e($gzDesc,'r');
e(strlen($gzDesc),'r');
e(gzuncompress($gzDesc),'r');
