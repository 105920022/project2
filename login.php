<?php
    // If already logged in, and return to the login menu, log out
    session_start();
    unset($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Login page for managers of Grojband.">
    <meta name="keywords" content="grojband, composing software, login">
    <meta name="author" content="Grojband">
    <title>Job application form</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/apply.css">
</head>
<body> 
    <?php include('header.inc') ?>
    <h1 id="jobApplicationTitle">Login</h1>
    <?php
        if (isset($_SESSION['lastLogin']) && time() - $_SESSION['lastLogin'] >= 10) // If we're currently locked out, but been logged out for 10 seconds
        { // (NOTE: 10 seconds would be too short for a real world application, but it's good for testing purposes)
            unset($_SESSION['lastLogin']);
            unset($_SESSION['loginAttempts']); // Let them try again
        }
        if (isset($_SESSION['loginAttempts']) && $_SESSION['loginAttempts'] >= 3) // If the user has logged in too many times, don't let them again
        {
    ?>
    <p style="color: red; text-align: center;">Too many login attempts. Please try again later.</p>
    <?php
        }
        else // Otherwise, show the log in screen
        {
    ?>
    <form method="post" action="manage.php">
        <p>
            <label for="username">Username: </label> 
            <input type="text" name="username" id="username" required>
        </p>
        <p>
            <label for="password">Password: </label> 
            <input type="password" name="password" id="password" required>  
        <p>
        <p>
            <?php
                if (isset($_GET['incorrect']) && $_GET['incorrect'] == 1)
                {
                    echo '<p style="color: red;">Invalid username or password.';
                }
            ?>
            <button type="submit">Login</button>
        </p>
    </form>
    <?php 
        }
        include('footer.inc');
    ?>
</body>
</html>