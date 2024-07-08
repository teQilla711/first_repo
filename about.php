<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SU ABOUT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include_once ("templates/nav.php");?>
    <main>
        <section class="about-top">
            <h1>About Strathmore University</h1>
            <p>Learn More About Our History, Mission And Values. <br><br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, repudiandae vero! Nulla rerum quia sed quas omnis sit nam illo, quasi facilis, molestiae tempore velit voluptas provident, atque aut repudiandae?</p>
        </section>
        <section class="programs-content">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front"><h2><strong>Our History</strong></h2></div>
                    <div class="flip-card-back">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus tempora quos quisquam iste modi distinctio sed officiis, quae quia error dolores deserunt id, eius repudiandae numquam consequatur! Porro, debitis ex.</p>
                    </div>
                </div>
            </div>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front"><h2><strong>Our Mission</strong></h2></div>
                    <div class="flip-card-back">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium dignissimos dolorem amet? Libero tempore minus ad explicabo provident eligendi perferendis sed voluptate eum. Quis quod omnis necessitatibus reprehenderit? Itaque, numquam!</p>
                    </div>
                </div>
            </div>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front"><h2><strong>Our Values</strong></h2></div>
                    <div class="flip-card-back">
                        <ul><li>Excellence</li><li>Integrity</li><li>Innovation</li><li>Diversity</li><li>Community</li></ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require_once ("templates/footer.php");?>
</body>
</html>