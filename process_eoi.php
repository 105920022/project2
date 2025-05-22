<?php
require_once('settings.php');
session_start();
$conn = mysqli_connect($host, $username, $password, $database);
echo '<pre>';
print_r($_POST);
echo '</pre>';


$refNum = trim($_POST['refNum']);
$firstName = trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);

$inputDate = trim($_POST['dateOfBirth']);
$convertedDate = DateTime::createFromFormat('d/m/Y', $inputDate);
if ($convertedDate) {
    $dob = $convertedDate->format('Y-m-d');
} else {
    $dob = null;
}
// $dob = isset($_POST['dob']) ?? '';

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
// $skillsCPP = isset($_POST['skillsCPP']) ? 1 : 0;
// $skillsHTML = isset($_POST['skillsHTML']) ? 1 : 0;
// $skillsCSS = isset($_POST['skillsCPP']) ? 1 : 0;
// $skillsJS = isset($_POST['skillsJS']) ? 1 : 0;
// $skillsMySQL = isset($_POST['skillsMySQL']) ? 1 : 0;
// $skillsPS = isset($_POST['skillsPS']) ? 1 : 0;
// $skillsGA = isset($_POST['skillsGA']) ? 1 : 0;
$otherSkills = trim($_POST['otherSkills']);

$query = "INSERT INTO eoi (refNum, firstName, lastName, dob, gender, address, suburb, state, zip, email, phone, skillsCPP, skillsHTML, skillsCSS, skillsJS, skillsMySQL, skillsPS, skillsGA, skillsOther) VALUES ('$refNum', '$firstName', '$lastName', '$dob', '$gender', '$address', '$suburb', '$state', '$zip', '$email', '$phone', '$skillsCPP', '$skillsHTML', '$skillsCSS', '$skillsJS', '$skillsMySQL', '$skillsPS', '$skillsGA', '$otherSkills')";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "application successful!";
} else {
    echo "an error has occurred.";
}