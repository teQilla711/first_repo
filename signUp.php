<?php include 'databaseConnection2.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($name) || empty($email) || empty($password)){
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
        $checkQuery = "SELECT * FROM duplicateContact_info WHERE email = ?";
        $checkStmt = mysqli_prepare($conn, $checkQuery);
        mysqli_stmt_bind_param($checkStmt, "s", $email);
        mysqli_stmt_execute($checkStmt);
        $result = mysqli_stmt_get_result($checkStmt);

        if(mysqli_num_rows($result)>0){
            echo "<script>
                    document.getElementById('popup-message').style.display = 'flex';
                    document.getElementById('message-box').style.backgroundColor = '#ff0000';
                    document.getElementById('message-box').style.color = '#ffffff';
                    document.getElementById('message-box').innerHTML = 'Sorry. The email already exists in our database.';
                    setTimeout(function(){
                        document.getElementById('popup-message').style.display = 'none';
                    }, 3000);
                  </script>";
        } else {
            $sql = "INSERT INTO duplicateContact_info (name, email, password) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);

            if(mysqli_stmt_execute($stmt)){
                echo "<script>
                        window.location.href = 'logIn.php';
                      </script>";
            } else {
                echo "<script>
                        document.getElementById('popup-message').style.display = 'flex';
                        document.getElementById('message-box').style.backgroundColor = '#ff0000';
                        document.getElementById('message-box').style.color = '#ffffff';
                        document.getElementById('message-box').innerHTML = 'Error: " . $sql . "<br>" . mysqli_error($conn) . "';
                        setTimeout(function(){
                            document.getElementById('popup-message').style.display = 'none';
                        }, 3000);
                      </script>";
            }

            mysqli_stmt_close($stmt);
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
    <title>SU SIGN UP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include_once ("templates/nav.php");?>
    </header>
    <main>
        <section class="contact-top"><h1>Sign Up</h1><p>Create An Account With Strathmore University.</p></section>
        <section class="contact-content">
            <div class="contact-info"></div>
            <div class="contact-form">
                <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Sign Up</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <label for="name"><strong> Name: </strong></label>
                    <input type="text" id="name" name="name" required>
                    <label for="email"><strong> Email: </strong></label>
                    <input type="email" id="email" name="email" required>
                    <label for="password"><strong> Password: </strong></label>
                    <input type="password" id="password" name="password" required>
                    <button type="submit" class="btn"><strong>Sign Up</strong></button>
                </form>
                <br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="logIn.php" class="btn"><strong> Already Registered? Log In </strong></a>
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
