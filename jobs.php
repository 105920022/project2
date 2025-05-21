<?php
$host = 'localhost'; 
$user = 'root';     
$password = '';    
$dbname = 'projectpt2';

// Create a connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch job data
$sql = "SELECT * FROM jobs"; // Replace 'jobs' with your actual table name
$result = $conn->query($sql);
?>

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
        <?php
        if ($result && $result->num_rows > 0) {
            // Loop through each job and display it
            while ($row = $result->fetch_assoc()) {
                echo '<aside>';
                echo '<h2>' . $row['Title'] . '</h2>';
                echo '<img src="images/SocialMedia.jpg" alt="Social Media Manager Position">';
                echo '<p><strong>Description: </strong>' . $row['Description'] . '</p>';
                echo '<p><strong>Salary Range:</strong> ' . $row['Salary'] . '</p>';
                echo '<p><strong>Reports To:</strong> ' . $row['Boss'] . '</p>';
                echo '<p><strong>Responsibilities:</strong> ' . $row['Responsibilities'] . '</p>';            
                echo '<p><strong>Requirements:</strong> ' . $row['Requirements'] . '</p>';
                echo '</aside>';
            }
        } else {
            echo "<p>No job listings found.</p>";
        }
        ?>
        </div>
    </section>
    <!-- Bottom footer section, with company title, contact and jira buttons -->
    <?php include('footer.inc') ?>
</body>
</html>

<?php
$conn->close();
?>
