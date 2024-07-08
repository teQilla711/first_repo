<?php include 'databaseConnection.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if(empty($name) || empty($email) || empty($message)){echo "Please Fill In All The Required Fields.";}
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){echo "Kindly Check On Your Email's Format.";}
    else{
        $checkQuery = "SELECT * FROM contact_info WHERE email = ?";
        $checkStmt = mysqli_prepare($conn, $checkQuery);
        mysqli_stmt_bind_param($checkStmt, "s", $email);
        mysqli_stmt_execute($checkStmt);
        $result = mysqli_stmt_get_result($checkStmt);

        if(mysqli_num_rows($result)>0){echo "Sorry. The Entered Email already Exists In Our Database.";}
        else{
            $sql = "INSERT INTO contact_info (name, email, message) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);

            if(mysqli_stmt_execute($stmt)){echo "Thank You For Your Message. We Shall Respond In Due Time.";}
            else{echo "Error: ".$sql."<br><br><br>".mysqli_error($conn);}
            mysqli_stmt_close($stmt);}
        mysqli_stmt_close($checkStmt);}}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SU CONTACT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include_once ("templates/nav.php");?>
    </header>
    <main>
        <section class="contact-top"><h1>Contact Us</h1><p>Get In Touch With Strathmore University For More Information.</p></section>
        <section class="contact-content">
            <div class="contact-info">
                <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;How To Contact Us</h2>
                <p>Strathmore University</p>
                <p>Ole Sangale Road, Madaraka</p>
                <p>P.O. Box 59857 - 00200, Nairobi, Kenya</p>
                <p>Phone: + 2 5 4 7 0 3 0 3 4 0 0 0</p>
                <p>Email: info@strathmore.edu</p>
            </div>

            <div class="contact-form">
                <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Send Strathmore a Message</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <label for="name"><strong> Name: </strong></label>
                    <input type="text" id="name" name="name" required>
                    <label for="email"><strong> Email: </strong></label>
                    <input type="email" id="email" name="email" required>
                    <label for="message"><strong> Message: </strong></label>
                    <textarea id="message" name="message" required></textarea>
                    <button type="submit" class="btn"><strong> Send </strong></button>
                </form>
                <br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="logIn.php" class="btn"><strong>Click Here To Give Feedback As A Student</strong></a>
            </div>
        </section>
    </main>
    <?php require_once ("templates/footer.php");?>
</body>
</html>