<?php include 'databaseConnection4.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    // Check if files were uploaded without errors
    $files = array();
    if(isset($_FILES['documents']) && is_array($_FILES['documents']['tmp_name'])) {
        foreach ($_FILES['documents']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['documents']['error'][$key] == UPLOAD_ERR_OK) {
                $file_name = $_FILES['documents']['name'][$key];
                $upload_dir = 'admissionApplicationsFiles/'; // Specify the upload directory
                $upload_file = $upload_dir . basename($file_name);

                if(move_uploaded_file($tmp_name, $upload_file)) {
                    $files[] = file_get_contents($upload_file); // Store the file contents
                } else {
                    $error_message = "Error uploading file: " . $file_name;
                }
            }
        }
    }

    $files_blob = mysqli_real_escape_string($conn, implode('', $files)); // Convert the file contents to a BLOB

    if(empty($name) || empty($email) || empty($course)){
        $error_message = "Please fill in all the required fields.";
    } else {
        $sql = "INSERT INTO admissionApplicationsDatabase (name, email, course, files)
                VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $course, $files_blob);

        if(mysqli_stmt_execute($stmt)){
            $success_message = "Application submitted successfully!";
        } else {
            $error_message = "Error submitting application: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Application Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include_once ("templates/nav.php");?>
    <div class="admissionsApplication-top">
        <h1>Strathmore University Application Form</h1>
        <p><strong>Looking To Join Strathmore University?<br><br><br>Fill In The Form Below To Apply</strong></p>
    </div>
    <div class="admissionsApplication-content">
        <div class="admissionsApplication-form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                <label for="name"><strong>Name:</strong></label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                <label for="email"><strong>Email:</strong></label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <label for="course"><strong>Course:</strong></label>
                <select id="course" name="course" required>
                    <option value=""><strong>Select a course</strong></option>
                    <option value="Business Information Technology"><strong>Business Information Technology</strong></option>
                    <option value="Computer Science"><strong>Computer Science</strong></option>
                    <option value="Business Administration"><strong>Business Administration</strong></option>
                    <option value="Law"><strong>Bachelor of Law</strong></option>
                    <option value="Electrical Engineering"><strong>Electrical Engineering</strong></option>
                </select><br><br>
                <label for="documents"><strong>Upload Documents:</strong></label>
                <input type="file" id="documents" name="documents[]" multiple>
                <?php if(isset($error_message)): ?>
                    <div class="error-message"><?php echo $error_message; ?></div>
                <?php endif; ?>
                <?php if(isset($success_message)): ?>
                    <div class="success-message"><?php echo $success_message; ?></div>
                <?php endif; ?>
                <button type="submit"><strong>Submit Application</strong></button>
            </form>
        </div>
    </div>
    <?php require_once ("templates/footer.php");?>
</body>
</html>
