<?php
    // If already logged in, and return to the login menu, log out
    session_start();
    session_unset();
    session_destroy();
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
    <?php include('footer.inc') ?>
</body>
</html>