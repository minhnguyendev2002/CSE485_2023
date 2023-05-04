<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Bài Tập Thực Hành 1 <br>
    
    <form action="/action_page.php" style="margin: 50px 0px">
        <label for="lname">STT:</label><br>
        <input type="text" id="lname" name="lname" value="Doe"><br><br>
        <label for="fname">Full Name:</label><br>
        <input type="text" id="fname" name="fname" value="John"><br>
        <input type="submit" value="Submit">
    </form>

    <?php
        $file = fopen('public\List_of_student.txt', 'r');
        while(!feof($file)) {
            $line = fgets($file);
            echo $line . "<br>";
        }
    ?>
</body>
</html>