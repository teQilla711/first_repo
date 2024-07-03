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
        <p>Looking To Join Strathmore University?<br><br><br>Fill In The Form Below To Apply</p>
    </div>
    <div class="admissionsApplication-content">
        <div class="admissionsApplication-form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <label for="course">Course:</label>
                <select id="course" name="course" required>
                    <option value="">Select a course</option>
                    <option value="Business Information Technology">Business Information Technology</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Business Administration">Business Administration</option>
                    <option value="Law">Bachelor of Law</option>
                    <option value="Electrical Engineering">Electrical Engineering</option>
                </select><br><br>
                <label for="documents">Upload Documents:</label>
                <input type="file" id="documents" name="documents" multiple>
                <button type="submit"><strong>Submit Application</strong></button>
            </form>
        </div>
    </div>
    <?php require_once ("templates/footer.php");?>
</body>
</html>