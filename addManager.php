<?php
    require_once('settings.php');
    session_start();

    // First, verify that the user is signed in
    if (!isset($_SESSION['username']))
    {
        header("Location: login.php");
        exit();
    }

    // Next, see if they already submited and wants to add a new user
    if (isset($_POST['userUsername']) && isset($_POST['userPassword']))
    {
        $userUsername = $_POST['userUsername'];
        $userPassword = $_POST['userPassword'];

        if (empty($userUsername) || empty($userPassword)) // Validation
        {
            $_SESSION['submitMessage'] = "<p style='color: red;'>Couldn't add new user: Username and password are required.";
        }
        elseif (strlen($userPassword) < 6) // Password rule
        {
            $_SESSION['submitMessage'] = "<p style='color: red;'>Couldn't add new user: Password must be at least 6 characters long.";
        }
        else
        {
            $sql = "INSERT INTO managers(`username`, `password`) VALUES ('$userUsername', '$userPassword')";
            $result = mysqli_query($conn, $sql);
            if ($result)
            {
                $_SESSION['submitMessage'] = "<p style='color: green;'>Successfully added new user!";
            }
            else if (mysqli_errno($conn) == 1062) // If the duplicate primary key error was thrown
            {
                $_SESSION['submitMessage'] = "<p style='color: red;'>Couldn't add new user: Username already exists.";
            }
            else
            {
                $_SESSION['submitMessage'] = "<p style='color: red;'>Couldn't add new user: " . mysqli_error($conn);
            }
        }

        header("Location: " . $_SERVER['PHP_SELF']); // Refresh and clear post to prevent resubmition on refresh
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Page to add a manager user">
    <meta name="keywords" content="grojband, composing software, manager">
    <meta name="author" content="Grojband">
    <title>Job application form</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/apply.css">
</head>
<body> 
    <?php include('header.inc') ?>
    <h1 id="jobApplicationTitle">Add Manager User</h1>
    <form method="post" action="addManager.php">
        <p>
            <label for="userUsername">User Username: </label>
            <input type="text" name="userUsername" id="userUsername" required>
        </p>
        <p>
            <label for="userPassword">User Password: </label>
            <input type="password" name="userPassword" id="userPassword" required>  
        <p>
        <p>
            <?php
                if (isset($_SESSION['submitMessage']))
                {
                    echo $_SESSION['submitMessage'];
                    unset($_SESSION['submitMessage']);
                }
            ?>
            <button type="submit">Add Manager User</button>
        </p>
    </form>
    <form method="post" action="manage.php">
        <p>
            <button type="submit">Back to Manage Page</button>
        </p>
    </form>
    <?php include('footer.inc'); ?>
</body>
</html>