<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="About the enhancements integrated.">
    <meta name="keywords" content="group, project, enhancements">
    <meta name="author" content="Grojband">
    <title>Grojband About Page</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/about.css">

</head>
<body>
    <?php include('header.inc') ?>

    <h1><strong>Enhancements</strong></h1>

    <!-- Group Name and Class Time -->
    <section>
        <h2>Enhancements added includes:</h2>
        <ul>
            <li><strong>EOI table sorting:</strong> In the manage.php page (accessed from the login page) there is a dropdown list labeled "Sort by:", which sorts the table by the column selected upon pressing the "Sort" button.</li>
            <br>
            <li><strong>Add Manager User page:</strong> In the manage.php page, there is a button labeled "Add Manager User", which can add a new user to the "managers" table, while validating the data entered, ensuring the username is unique, and requiring the password to be at least 6 characters long.</li>
            <br>
            <li><strong>Login page for manage page:</strong> To access the manage.php page, the user must first login with correct username and password.</li>
            <br>
            <li><strong>Disable login after 3 attempts:</strong> If there has been 3 failed login attempts, the login page is disabled for 10 seconds (this would be too short for real world application, but it's only for testing purposes and can easily be increased in manage.php)</li>
        </ul>
    </section>
    <?php include('footer.inc') ?>
</body>
</html>
