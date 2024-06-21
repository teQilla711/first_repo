<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strathmore University</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include_once ("templates/nav.php");?>
<body>
    <br><br><div><a href="ageComputation.php" class="btn">What Is My Age</a></div><br><br>
    <div><a href="unixToDateTimeConversion.php" class="btn">Time Conversion</a></div><br><br>
    <div><a href="adultNotAdult.php" class="btn">Am I An Adult ?</a></div>

    <?php
        include 'ageComputation.php';
        include 'unixToDateTimeConversion.php';
        include 'adultNotAdult.php';
    ?>
</body>
<?php require_once ("templates/footer.php");?>
</body>
</html>