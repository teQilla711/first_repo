<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SU ADMISSIONS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include_once ("templates/nav.php");?>
    <main>
        <section class="admissions-top"><h1>Admissions</h1><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam maiores, quod nesciunt commodi at expedita aliquam impedit? Quibusdam voluptas mollitia quisquam modi debitis dolore quo iure sapiente, illo veniam ratione!</p></section>
        <section class="admissions-content">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front"><h2>Admission Requirements</h2></div>
                    <div class="flip-card-back">
                        <ol>
                            <li>Have Completed Your KCSE Or O level.<br>With The Certificate To Prove</li><br>
                            <li>Have A Birth Certificate</li><br>
                            <li>Passport  And / Or Visa For International Students</li><br>
                            <li>Student Pass Documents</li><br>
                            <li>Two Passport Size Photos</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front"><h2>Application Process</h2></div>
                    <div class="flip-card-back">
                        <ol>
                            <li>Complete The Online Application Form</li><br>
                            <li>Provide All Required Registration Documents And Details</li><br>
                            <li>Wait For An Admission E-Mail</li><br>
                            <li>If Shortlisted, The Enrollment Process Is Done And You May Visit The Admin Offices For Further Details</li><br>
                        </ol>
                    </div>
                </div>
            </div>
            <br><br><a href="admissionsApplications.php" class="btn"><strong> Apply Now </strong></a>
        </section>
    </main>
    <?php require_once ("templates/footer.php");?>
</body>
</html>