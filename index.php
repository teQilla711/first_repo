<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STRATHMORE UNIVERSITY</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include_once ("templates/nav.php");?>
    <main>
        <section class="top">
            <h2>Welcome To Strathmore University</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam quas inventore dicta maiores necessitatibus, consequatur facilis officia voluptas tenetur hic rerum soluta molestiae nobis quam suscipit officiis? Tempora, quidem perspiciatis.</p>
            <a href="about.php" class="btn"><strong>Learn More</strong></a>
        </section>
        <section class="about">
            <h2>About Strathmore</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae a, iusto reprehenderit voluptas quae temporibus labore! Porro sequi ab provident quas ipsa. Deserunt quam perspiciatis earum, voluptatibus dignissimos repellendus officiis.</p>
            <a href="about.php" class="btn"><strong>Explore Our History</strong></a>
        </section>
        <section class="programs">
            <h2>Our Programs</h2>
            <ul>
                <li>Business Information Technology</li>
                <li>Computer Science</li>
                <li>Business Administration</li>
                <li>Bachelor of Law</li>
                <li>Electrical Engineering</li>
            </ul>
            <a href="programs.php" class="btn"><strong>View All Programs</strong></a>
        </section>
        <section class="news">
            <h2>Latest News</h2>
            <article>
                <img src="images/news.jpg" alt="newsImage">
                <h3>News Heading</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos aut tempora deleniti animi nihil debitis consequatur adipisci reprehenderit iure? Maiores tempore eligendi rerum ratione corrupti veniam neque, eos perspiciatis inventore!</p>
                <a href="news.php" class="btn"><strong>More News</strong></a>
            </article>
        </section>
    </main>
    <?php require_once ("templates/footer.php");?>
</body>
</html>