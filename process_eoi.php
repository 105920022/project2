<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="results for the application to Grojband.">
    <meta name="keywords" content="group, project, apply, eoi, results">
    <meta name="author" content="Grojband">
    <title>Grojband applicant results</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<?php include('header.inc'); // includes header for page ?>
<?php // PHP LOGIC START
require_once('settings.php');
session_start();
$conn = mysqli_connect($host, $username, $password, $database);

// lines below echo the results that were put into the table
// echo '<pre>';
// print_r($_POST);  
// echo '</pre>';

// DEFINING FIELDS //
$refNum = trim($_POST['refNum']);
$firstName = trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);

// converting date into the correct format for mySQL
$inputDate = trim($_POST['dateOfBirth']); //gets input date
$convertedDate = DateTime::createFromFormat('d/m/Y', $inputDate); //creates a format using the input
if ($convertedDate) {
    $dob = $convertedDate->format('Y-m-d'); //converts into the correct format
} else {
    $dob = null;
}

$gender = $_POST['gender'] ?? '';

$address = trim($_POST['address']);
$suburb = trim($_POST['suburb']);
$state = trim($_POST['state']);
$zip = trim($_POST['zip']);

$email = trim($_POST['email']);
$phone = trim($_POST['phone']);


$skills = isset($_POST['requiredTechnical']) ? $_POST['requiredTechnical'] : [];
$skillsCPP   = in_array('cpp', $skills) ? 1 : 0;
$skillsHTML  = in_array('html', $skills) ? 1 : 0;
$skillsCSS   = in_array('css', $skills) ? 1 : 0;
$skillsJS    = in_array('js', $skills) ? 1 : 0;
$skillsMySQL = in_array('mysql', $skills) ? 1 : 0;
$skillsPS    = in_array('ps', $skills) ? 1 : 0;
$skillsGA    = in_array('ga', $skills) ? 1 : 0;

$otherSkills = trim($_POST['otherSkills']);

// SERVER-SIDE VALIDATION //
if(!isset($_POST['refNum'])) {
    header("Location: apply.php");
    exit();
} // checks if refnum has been entered, if not, redirects to apply.php as that means they have not completed the form

if (!preg_match('/^[a-zA-Z]{1,20}$/', $firstName) || !preg_match('/^[a-zA-Z]{1,20}$/', $lastName)) {
    die("Both first and last names should be less than 20 characters long, and should only contain letters."); 
} // checks length and type of firstname/lastname

if (!preg_match('/^[a-zA-Z0-9\s\/\-]{1,40}$/', $address) || !preg_match('/^[a-zA-Z\s\-]{1,20}$/', $suburb)) {
    die("Street Address and Suburb/towns may only be at maximum 40 characters long.");
} // checks the length of the address and suburb. Allows spaces and hyphens

if (!preg_match('/^\d{4}$/', $zip)) {
    die("PostCode must be 4 numbers long.");
} // checks the length of postcode

$stateZips = [ // regex rules for each state's postcodes
    'NSW' => '/^(1|2)\d{3}$/',
    'ACT' => '/^(0|2)\d{3}$/',
    'VIC' => '/^(3|8)\d{3}$/',
    'QLD' => '/^(4|9)\d{3}$/',
    'SA'  => '/^5\d{3}$/',
    'WA'  => '/^6\d{3}$/',
    'TAS' => '/^7\d{3}$/',
    'NT'  => '/^0\d{3}$/'
];

$state = strtoupper($state); // converts states into uppercase

if (!preg_match($stateZips[$state], $zip)) {
    die("Your postcode must match your state.");
} // uses the regex rules to validate postcode based on the state chosen by the applicant

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Email must be in the correct format.");
}

$phone = str_replace(' ', '', $phone); // removes spaces from the phone number
if (!preg_match('/^\d{8,12}$/', $phone)) {
    die("Phone number must be 8-12 characters.");
} // checks length of phone number

$query = "INSERT INTO eoi (refNum, firstName, lastName, dob, gender, address, suburb, state, zip, email, phone, skillsCPP, skillsHTML, skillsCSS, skillsJS, skillsMySQL, skillsPS, skillsGA, skillsOther) VALUES ('$refNum', '$firstName', '$lastName', '$dob', '$gender', '$address', '$suburb', '$state', '$zip', '$email', '$phone', '$skillsCPP', '$skillsHTML', '$skillsCSS', '$skillsJS', '$skillsMySQL', '$skillsPS', '$skillsGA', '$otherSkills')";
$result = mysqli_query($conn, $query);
?>

<h2>
    <?php // seperated to allow easier styling
    if ($result) {
    $eoiNum = mysqli_insert_id($conn);
    echo "application successful! </h2>";
    echo("your application number is <strong>$eoiNum</strong>");
} else {
    echo "an error has occurred.</h2>";
}
?>
<br>
<a href="index.php">Return to Home</a>


<?php include('footer.inc'); // includes footer for page ?>
</body>
</html>