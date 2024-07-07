<?php include 'databaseConnection3.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $admissionNumber=$_POST['admissionNumber'];
    $email=$_POST['email'];
    $feedback=$_POST['feedback'];

    if(empty($admissionNumber) || empty($email) || empty($feedback)){
        echo "<script>
                document.getElementById('popup-message').style.display = 'flex';
                document.getElementById('message-box').style.backgroundColor = '#ff0000';
                document.getElementById('message-box').style.color = '#ffffff';
                setTimeout(function(){
                    document.getElementById('popup-message').style.display = 'none';
                }, 3000);
              </script>";
    } else {
        $checkQuery="SELECT * FROM studentFeedbackTexts WHERE admissionNumber = ?";
        $checkStmt=mysqli_prepare($conn, $checkQuery);
        mysqli_stmt_bind_param($checkStmt, "s", $admissionNumber);
        mysqli_stmt_execute($checkStmt);
        $result = mysqli_stmt_get_result($checkStmt);

        if(mysqli_num_rows($result)>0){
            echo "<script>
                    document.getElementById('popup-message').style.display = 'flex';
                    document.getElementById('message-box').style.backgroundColor = '#ff0000';
                    document.getElementById('message-box').style.color = '#ffffff';
                    document.getElementById('message-box').innerHTML = 'Sorry. The Entered Admission Number already Exists In Our Database.';
                    setTimeout(function(){
                        document.getElementById('popup-message').style.display = 'none';
                    }, 3000);
                  </script>";
        } else {
            $sql = "INSERT INTO studentFeedbackTexts (admissionNumber, email, feedback) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $admissionNumber, $email, $feedback);

            if(mysqli_stmt_execute($stmt)){
                echo "<script>
                        document.getElementById('popup-message').style.display = 'flex';
                        document.getElementById('message-box').style.backgroundColor = '#00b2a9';
                        document.getElementById('message-box').style.color = '#ffffff';
                        document.getElementById('message-box').innerHTML = 'Thank You For Your Feedback. We Appreciate Your Input.';
                        setTimeout(function(){
                            document.getElementById('popup-message').style.display = 'none';
                        }, 3000);
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
    <title>SU Students Feedback</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        #logout-btn {
            background-color: #005A9E; /* Strathmore primary blue */
            border-color: #005A9E;
            color: #FFFFFF; /* Strathmore primary white */
            float: right;
            margin-right: 20px;
        }

        #logout-btn:hover {
            background-color: #003A63; /* Strathmore primary dark blue */
            border-color: #003A63;
            color: #FFFFFF;
        }
    </style>
</head>
<body>
    <?php include_once ("templates/nav.php");?>
    <main>
        <section class="contact-top">
            <h1>Students Feedback</h1>
            <p>Share your feedback with Strathmore University.</p>
            <button id="logout-btn" class="btn btn-danger" onclick="window.location.href='logIn.php'">
                <!-- <i class="fas fa-sign-out-alt"></i> -->Logout
            </button>
        </section>
        <section class="contact-content">
            <div class="contact-info">
            <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    How To Contact Us</h2>
                <p>Strathmore University</p>
                <p>Ole Sangale Road, Madaraka</p>
                <p>P.O. Box 59857 - 00200, Nairobi, Kenya</p>
                <p>Phone: + 2 5 4 7 0 3 0 3 4 0 0 0</p>
                <p>Email: info@strathmore.edu</p>
            </div>

            <div class="contact-form">
                <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Share Your Feedback</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <label for="admissionNumber">Admission Number:</label>
                    <input type="text" id="admissionNumber" name="admissionNumber" required>
                    <label for="email">Strathmore Email:</label>
                    <input type="text" id="email" name="email" required>
                    <label for="feedback">Feedback:</label>
                    <input type="text" id="feedback" name="feedback" required>
                    <button type="submit" class="btn">Submit Feedback</button>
                </form>
            </div>
        </section>
    </main>
    <?php require_once ("templates/footer.php");?>

    <div id="popup-message">
        <div id="message-box">
        </div>
    </div>
</body>
</html>
