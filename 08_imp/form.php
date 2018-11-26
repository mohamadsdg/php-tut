<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My First Form</title>
</head>
<body>
    <form action="process.php" method="post">
        <label for="username">name :</label>
        <input type="text" id="username" name="username" placeholder="Enter Your name" autocomplete="off"><br><br>

        <label for="password">Pass : </label>
        <input type="password" name="password" id="password"/><br>

        <input type="hidden" name="hiddenVal1" id="password" value="ip"/><br>

        <label>Select Your FavColors : </label><br>
        <input type="checkbox" name="favColors[]" value="red"/> Red
        <input type="checkbox" name="favColors[]" value="blue"/> Blue
        <input type="checkbox" name="favColors[]" value="green"/> Green <br><br>

        <label>Sex : </label><br>
        <input type="radio" name="sex" value="male"/> Male
        <input type="radio" name="sex" value="female"/> Female<br><br>

        <label for="year">Year : </label><br>
        <select name="year" id="year">
            <option value="88">88</option>
            <option value="89">89</option>
            <option value="90">90</option>
            <option value="91">91</option>
        </select><br><br>

        <label for="file1">Upload your File : </label><br>
        <input type="file" name="file" id="file1"/><br><br>

        <label for="msg">Message : </label><br>
        <textarea name="message" id="msg" cols="30" rows="10"></textarea><br><br>

        <br/><br/>
        Send : <input type="submit" value=" Send "/>
        <button> Send2 </button>
    </form>
</body>
</html>