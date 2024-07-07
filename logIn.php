<?php include 'databaseConnection2.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        echo "<script>
                document.getElementById('popup-message').style.display = 'flex';
                document.getElementById('message-box').style.backgroundColor = '#ff0000';
                document.getElementById('message-box').style.color = '#ffffff';
                document.getElementById('message-box').innerHTML = 'Please fill in all the required fields.';
                setTimeout(function(){
                    document.getElementById('popup-message').style.display = 'none';
                }, 3000);
              </script>";
    } else {
        $checkQuery = "SELECT * FROM duplicateContact_info WHERE email = ? AND password = ?";
        $checkStmt = mysqli_prepare($conn, $checkQuery);
        mysqli_stmt_bind_param($checkStmt, "ss", $email, $password);
        mysqli_stmt_execute($checkStmt);
        $result = mysqli_stmt_get_result($checkStmt);

        if(mysqli_num_rows($result)>0){
            echo "<script>
                    window.location.href = 'studentFeedback.php';
                  </script>";
        } else {
            echo "<script>
                    document.getElementById('popup-message').style.display = 'flex';
                    document.getElementById('message-box').style.backgroundColor = '#ff0000';
                    document.getElementById('message-box').style.color = '#ffffff';
                    document.getElementById('message-box').innerHTML = 'Invalid email or password.';
                    setTimeout(function(){
                        document.getElementById('popup-message').style.display = 'none';
                    }, 3000);
                  </script>";
        }

        mysqli_stmt_close($checkStmt);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SU Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .popup-message {
            display: none;
            justify-content: center;
            align-items: center;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%; height: 100%; overflow: auto; background-color: rgba(0, 0, 0, 0.4);}
        .popup-message .message-box {
            background-color: #ffffff;
            color: #003366;
            padding: 20px;
            border: 2px solid #003366;
            width: 30%;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include_once ("templates/nav.php");?>
    </header>
    <main>
        <section class="contact-top"><h1>Login</h1><p>Sign in to your Strathmore University account.</p></section>
        <section class="contact-content">
            <div class="contact-info"></div>

            <div class="contact-form">
                <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Log In</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <button type="submit" class="btn"><strong>Log In</strong></button>
                </form>
                <br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="signUp.php" class="btn">Not Registered? Sign Up</a>
            </div>
            <div class="contact-info"></div>
        </section>
    </main>
    <?php require_once ("templates/footer.php");?>

    <div id="popup-message">
        <div id="message-box">
        </div>
    </div>
</body>
</html>
