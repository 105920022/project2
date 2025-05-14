<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="About our group project.">
    <meta name="keywords" content="group, project, about">
    <meta name="author" content="Grojband">
    <title>Grojband About Page</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/about.css">

</head>
<body>
    <?php include('header.inc') ?>

    <h1><strong>Who Are We?</strong></h1>

    <!-- Group Name and Class Time -->
    <section>
        <h2>Group Information</h2>
        <p><strong>Group Name:</strong> Grojband</p>
        <p><strong>Class Time:</strong> Wednesday, 4:30 PM</p>
    </section>

    <!-- Nested List -->
    <section>
        <h2 class="student-id">Student IDs</h2>
        <ul class="student-list">
            <li>Eli
                <ul>
                    <li>Student ID: 105920022</li>
                </ul>
            </li>
            <li>Mack
                <ul>
                    <li>Student ID: 105923445</li>
                </ul>
            </li>
            <li>Tom
                <ul>
                    <li>Student ID: 105916403</li>
                </ul>
            </li>
            <li>Mahdi
                <ul>
                    <li>Student ID: 105924752</li>
                </ul>
            </li>
        </ul>
    </section>

    <!-- Tutor's Name -->
    <section>
        <h2 class="tutor-heading">Tutor</h2>
        <p><strong>Name:</strong> Rahul R </p>
    </section>

    <section class="contribution-photo-container">
        <!-- Members Contribution -->
        <div class="memb-cont-section">
            <h2 class="memb-cont">Members Contribution</h2>
            <dl class="contribution-list">
                <dt>Eli</dt>
                <dd>Jobs Page</dd>
                <dt>Mack</dt>
                <dd>Apply Page</dd>
                <dt>Tom</dt>
                <dd>About Page</dd>
                <dt>Mahdi</dt>
                <dd>Index Page</dd>
            </dl>
        </div>

        <!-- Group Photo -->
        <div class="group-photo-section">
            <h2 class="group-photo">Group Photo</h2>
            <figure>
                <img src="images/GroupPhoto.jpeg" alt="Group Photo">
                <figcaption>Our Group Photo</figcaption>
            </figure>
        </div>
    </section>

    <!-- Members Interests -->
    <section class="memb-interest-section">
        <h2 class="memb-interest">Members Interests</h2>
        <table class="interest-table">
            <caption>Group Members' Interests</caption>
            <thead>
                <tr>
                    <th><strong>Name</strong></th>
                    <th><strong>Interests</strong></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Eli</td>
                    <td>Game Development</td>
                </tr>  
                <tr>
                    <td>Mack</td>
                    <td>Quantom Technology</td>
                </tr>
                <tr>
                    <td>Tom</td>
                    <td>Basketball</td>
                </tr>
                <tr>
                    <td>Mahdi</td>
                    <td>Art</td>
                </tr>
            </tbody>
        </table>
    </section>
    <?php include('footer.inc') ?>
</body>
</html>
