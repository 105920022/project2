<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Grojband, jobs, hiring, employment">
    <meta name="author" content="Eli Rauchberger">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/jobs.css">
    <title>Jobs Available</title>
</head>
<body>
    <?php include('header.inc') ?>
    <!-- Section where all the information on the page is -->
    <section>
        <!-- Title of page section -->
        <h1>Jobs Currently Available:</h1>
        <div class="jobContainer">
        <!-- Software Developer job section -->
        <aside>
            <!-- Stock image -->
            <img src="images/SoftwareDev.jpg" alt="Software Developer Position">
            <!-- Job title -->
            <h2>Software Developer</h2>
            <!-- Job description -->
            <p>As a Software Developer, you'll be at the core of transforming how artists produce music — whether they're laying down beats in their bedroom or mixing tracks in a studio.
            <br><br>
            We're looking for a passionate and innovative developer who thrives in a collaborative environment and is excited to build software that inspires creativity.</p>
            <!-- Job reference number -->
            <p><strong>Reference:</strong> SD001</p>
            <!-- Job salary -->
            <p><strong>Salary Range:</strong> $80,000-$110,000</p>
            <!-- Job boss -->
            <p><strong>Reports To:</strong> Lead Software Developer</p>
            <!-- Ordered list of job responsibilities -->
            <p><strong>Key Responsibilities:</strong></p>
            <ol>
                <li>Develop and maintain GrojBand's music production software</li>
                <li>Collaborate with designers, audio engineers, and QA testers</li>
                <li>Write clean, efficient, and well-documented code</li>
            </ol>
            <!-- Unordered list of job responsibilities -->
            <p><strong>About you:</strong></p>
            <ul>
                <li>Proficiency in C++ and/or C#</li>
                <li>Strong understanding of audio programming principles</li>
                <li>Experience working with version control systems</li>
            </ul>
        </aside>
        <!-- Social Media Manager job section -->
        <aside>
            <!-- Stock image -->
            <img src="images/SocialMedia.jpg" alt="Social Media Manager Position">
            <!-- Job title -->
            <h2>Social Media Manager</h2>
            <!-- Job description -->
            <p>At GrojBand, we believe in the power of community and communication. As a Social Media Manager, you'll be the voice of GrojBand across all digital platforms. 
            <br><br>
            You will help grow our brand presence, engage with producers and musicians, and ensure that GrojBand is the go-to music creation software for aspiring and professional producers alike.</p>
            <!-- Job reference number -->
            <p><strong>Reference:</strong> SMM02</p>
            <!-- Job salary -->
            <p><strong>Salary Range:</strong> $60,000-$85,000</p>
            <!-- Job boss -->
            <p><strong>Reports To:</strong> Head of Customer Sales</p>
            <!-- Ordered list of job responsibilities -->
            <p><strong>Key Responsibilities:</strong></p>
            <ol>
                <li>Develop and execute a content strategy</li>
                <li>Monitor, respond to, and engage with our online community</li>
                <li>Analyze and report on social media metrics</li>
            </ol>
            <!-- Unordered list of job responsibilities -->
            <p><strong>About you:</strong></p>
            <ul>
                <li>Proven experience in managing social media accounts for a brand</li>
                <li>Excellent written and verbal communication skills</li>
                <li>Familiarity with social media analytics tools</li>
            </ul>
        </aside>
        </div>
    </section>
    <!-- Bottom footer section, with company title, contact and jira buttons -->
    <?php include('footer.inc') ?>
</body>
</html>