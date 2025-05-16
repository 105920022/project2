<!DOCTYPE html>
<html lang="en">
<head>
    <!-- tags, title, description, viewport -->
    <meta charset="UTF-8">
    <meta name="description" content="Welcome to Grojband!">
    <meta name="keywords" content="Grojband, Music, Software">
    <meta name="author" content="Grojband">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage EOIs</title>

    <!-- Stylesheet links -->
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    <?php include('header.inc') ?>
    <section>
        <?php
            // TODO: check if current session is logged in as a manager
            require_once('settings.php');
            // update row modifications if Save was pressed
            if (isset($_POST['update_row'])) {
                $eoiNum = $_POST['eoiNum'];
                $status = $_POST['status'];
                $refNum = $_POST['refNum'];
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $gender = $_POST['gender'];
                $address = $_POST['address'];
                $suburb = $_POST['suburb'];
                $state = $_POST['state'];
                $zip = $_POST['zip'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $skillsOther = $_POST['skillsOther'];

                $skills = explode(', ', $_POST['skills']);
                $skillsCPP = in_array('C++', $skills) ? 1 : 0;
                $skillsHTML = in_array('HTML', $skills) ? 1 : 0;
                $skillsCSS = in_array('CSS', $skills) ? 1 : 0;
                $skillsJS = in_array('JS', $skills) ? 1 : 0;
                $skillsMySQL = in_array('MySQL', $skills) ? 1 : 0;
                $skillsPS = in_array('Photoshop', $skills) ? 1 : 0;
                $skillsGA = in_array('Google Analytics', $skills) ? 1 : 0;

                $updateQuery = "
                    UPDATE eoi SET
                        status = '$status',
                        refNum = '$refNum',
                        firstName = '$firstName',
                        lastName = '$lastName',
                        gender = '$gender',
                        address = '$address',
                        suburb = '$suburb',
                        state = '$state',
                        zip = '$zip',
                        email = '$email',
                        phone = '$phone',
                        skillsCPP = '$skillsCPP',
                        skillsHTML = '$skillsHTML',
                        skillsCSS = '$skillsCSS',
                        skillsJS = '$skillsJS',
                        skillsMySQL = '$skillsMySQL',
                        skillsPS = '$skillsPS',
                        skillsGA = '$skillsGA',
                        skillsOther = '$skillsOther'
                    WHERE eoiNum = '$eoiNum'
                ";
                mysqli_query($conn, $updateQuery);
            }

            // check for a query; filter_ref filter_name delete_by_ref change_status list_all
            $query = "SELECT * FROM eoi"; // default query
            if (isset($_POST['filter_ref']) && !empty($_POST['refNum'])) {
                $refNum = $_POST['refNum'];
                $query = "SELECT * FROM eoi WHERE refNum = '$refNum'";
            }

            elseif (isset($_POST['filter_name'])) {
                $first = $_POST['firstName'];
                $last = $_POST['lastName'];
                   
                if (!empty($first) && !empty($last)) {
                    $query = "SELECT * FROM eoi WHERE firstName = '$first' AND lastName = '$last'";
                } elseif (!empty($first)) {
                    $query = "SELECT * FROM eoi WHERE firstName = '$first'";
                } elseif (!empty($last)) {
                    $query = "SELECT * FROM eoi WHERE lastName = '$last'";
                }
            }
            elseif (isset($_POST['delete_by_ref']) && !empty($_POST['deleteRef'])) {
                // run seperate query now so list all is still queried
                $deleteRef = $_POST['deleteRef'];
                $delQuery = "DELETE FROM eoi WHERE refNum = '$deleteRef'";
                mysqli_query($conn, $delQuery);
            }

            elseif (isset($_POST['change_status']) && !empty($_POST['updateEoiNum']) && !empty($_POST['newStatus'])) {
                $eoiNum = $_POST['updateEoiNum'];
                $newStatus = $_POST['newStatus'];
                $updateQuery = "UPDATE eoi SET status = '$newStatus' WHERE eoiNum = '$eoiNum'";
                // again, we want list all to be queried still
                mysqli_query($conn, $updateQuery);
            }

            $result = mysqli_query($conn, $query);

            // display as table
            if(mysqli_num_rows($result) > 0){
                echo '<table border="1" cellpadding="10" cellspacing="0">';
                echo '<tr>
                <th>EOI Num</th><th>Status</th><th>Job Ref</th><th>First Name</th><th>Last Name</th>
                <th>Gender</th><th>Address</th><th>Suburb</th><th>State</th><th>ZIP</th><th>Email</th>
                <th>Phone</th><th>Skills</th><th>SkillsOther</th><th>Action</th>
                </tr>';

                while ($row = mysqli_fetch_assoc($result)) {
                    // it mightve been better to have a single 'skills' field in csv format in the first place
                    $skills = [];
                    if ($row['skillsCPP'] == 1) $skills[] = 'C++';
                    if ($row['skillsHTML'] == 1) $skills[] = 'HTML';
                    if ($row['skillsCSS'] == 1) $skills[] = 'CSS';
                    if ($row['skillsJS'] == 1) $skills[] = 'JS';
                    if ($row['skillsMySQL'] == 1) $skills[] = 'MySQL';
                    if ($row['skillsPS'] == 1) $skills[] = 'Photoshop';
                    if ($row['skillsGA'] == 1) $skills[] = 'Google Analytics';

                    echo '<form method="POST" action="manage.php">';
                    echo '<tr>';
                    echo '<td><input type="text" name="eoiNum" value="' . $row['eoiNum'] . '" readonly style="width:50px;"></td>';
                    echo '<td><input type="text" name="status" value="' . $row['status'] . '" style="width:50px;"></td>';
                    echo '<td><input type="text" name="refNum" value="' . $row['refNum'] . '" style="width:50px;"></td>';
                    echo '<td><input type="text" name="firstName" value="' . $row['firstName'] . '"style="width:100px;"></td>';
                    echo '<td><input type="text" name="lastName" value="' . $row['lastName'] . '" style="width:100px;"></td>';
                    echo '<td><input type="text" name="gender" value="' . $row['gender'] . '" style="width:50px;"></td>';
                    echo '<td><input type="text" name="address" value="' . $row['address'] . '"></td>';
                    echo '<td><input type="text" name="suburb" value="' . $row['suburb'] . '"></td>';
                    echo '<td><input type="text" name="state" value="' . $row['state'] . '" style="width:30px;"></td>';
                    echo '<td><input type="text" name="zip" value="' . $row['zip'] . '" style="width:40px;"></td>';
                    echo '<td><input type="text" name="email" value="' . $row['email'] . '"></td>';
                    echo '<td><input type="text" name="phone" value="' . $row['phone'] . '" style="width:70px;"></td>';
                    echo '<td><input type="text" name="skills" value="' . implode(', ', $skills) . '"></td>';
                    echo '<td><input type="text" name="skillsOther" value="' . $row['skillsOther'] . '" style="width:100px;"></td>';
                    echo '<td><input type="submit" value="Save" name="update_row"></td>';
                    echo '</tr>';
                    echo '</form>';
                }
                echo '</table>';
            } else {
                echo 'No results found.';
            }
        ?>
    </section>
    <form method="POST" action="manage.php">
        <label>By Job Ref: </label>
        <input type="text" name="refNum" placeholder="e.g sd001">
        <input type="submit" name="filter_ref" value="Filter">
        <br>
        <label>By Name:</label>
        <input type="text" name="firstName" placeholder="First Name">
        <input type="text" name="lastName" placeholder="Last Name">
        <input type="submit" name="filter_name" value="Search">
        <br>
        <label>Delete by Job Ref: </label>
        <input type="text" name="deleteRef" placeholder="e.g sd001">
        <input type="submit" name="delete_by_ref" value="Delete EOIs">
        <br>
        <label>Change EOI Status</label>
        <input type="text" name="updateEoiNum" placeholder="EOI Number">
        <select name="newStatus">
            <option value="new">New</option>
            <option value="current">Current</option>
            <option value="final">Final</option>
        </select>
        <input type="submit" name="change_status" value="Update Status">
        <br>
        <input type="submit" name="list_all" value="List All EOIs">
    </form>
    <?php include('footer.inc') ?>
</body>
</html>