<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mini Project</title>
    <link rel="stylesheet" href="../../common/pure.css"/>
    <style>
        .wrapper {
            width: 60%;
            margin: 20px auto;
            background-color: #dfffdb;
            border-radius: 10px;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <form action="saveUser.php" method="post" enctype="multipart/form-data" class="pure-form pure-form-stacked">
        <fieldset>
            <legend>Register Form :</legend>
            <label for="name">Name :</label>
            <input type="text" name="name" id="name" placeholder="Enter your name"/>

            <label for="email">Email :</label>
            <input type="text" name="email" id="email" placeholder="Enter your email"/>

            <label for="sex">Sex :</label>
            <select name="sex" id="sex">
                <option value="male">Male</option>
                <option value="female" selected>Female</option>
            </select>

            <label for="age">Age :</label>
            <input type="text" name="age" id="age"/>

            <label>Select Your FavSites :</label>
            <label for="g"><input type="checkbox" name="favSites[]" value="google" id="g"/>Google</label>
            <label><input type="checkbox" name="favSites[]" value="yahoo"/>Yahoo</label>
            <label><input type="checkbox" name="favSites[]" value="bing"/>Bing</label>
            <label><input type="checkbox" name="favSites[]" value="7learn"/>7Learn</label>

            <label>Select the best Color :</label>
            <label><input type="radio" name="favColor" value="red"/> Red</label>
            <label><input type="radio" name="favColor" value="blue"/> Blue</label>
            <label><input type="radio" name="favColor" value="green"/> Green</label>

            <label for="resume">Upload Your picture :</label>
            <input type="file" name="resume" id="resume"/>

            <label for="msg">Message for us :</label>
            <textarea name="msg" id="msg" cols="50" rows="5"></textarea>

            <button class="pure-button"> Save Your Information</button>

        </fieldset>
    </form>
</div>
</body>
</html>