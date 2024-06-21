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
        <div class="logo"><img src="" alt="SULogo"></div>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="programs.html">Programs</a></li>
                <li><a href="admissions.html">Admissions</a></li>
                <li><a href="research.html">Research</a></li>
                <li><a href="news.html">News</a></li>
                <li><a href="events.html">Events</a></li>
                <li><a href="contact.html" class="active">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="contact-top"><h1>Contact Us</h1><p>Get in touch with Strathmore University for more information.</p></section>
        <section class="contact-content">
            <div class="contact-info">
                <h2>How To Contact Us</h2>
                <p>Strathmore University</p>
                <p>Ole Sangale Road, Madaraka</p>
                <p>P.O. Box 59857 - 00200, Nairobi, Kenya</p>
                <p>Phone: + 2 5 4 7 0 3 0 3 4 0 0 0</p>
                <p>Email: info@strathmore.edu</p>
            </div>

            <div class="contact-form">
                <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Send Strathmore a Message</h2>
                <form>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>
                    <button type="submit" class="btn">Send</button>
                </form>
            </div>
        </section>
    </main>
    <?php require_once ("templates/footer.php");?>
</body>
</html>