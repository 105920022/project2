<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="A form for submitting a job application to a currently open spot at Grojband.">
    <meta name="keywords" content="grojband, composing software, job application, application, form, open positions">
    <meta name="author" content="Grojband">
    <title>Job application form</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/apply.css">
</head>
<body> 
    <?php include('header.inc') ?>
    <h1 id="jobApplicationTitle">Position Application</h1>
    <form method="post" action="process_eoi.php">
        <p>
            <label for="refNum">Job Reference Number: </label> 
            <select name="refNum" id="refNum" required>
                <option value="">Please Select</option>
                <option value="sd001">SD001</option> 
                <option value="smm02">SMM02</option>
            </select>
        </p>
        <p>
            <label for="firstName">First Name: </label> 
            <input type="text" name="firstName" id="firstName" maxlength="20" size="20" pattern="[A-Za-z]+" title="Only letters are allowed" required>
        </p>
        <p>
            <label for="lastName">Last Name: </label> 
            <input type="text" name="lastName" id="lastName" maxlength="20" size="20" pattern="[A-Za-z]+" title="Only letters are allowed" required>  
        <p>
        <p>
            <label for="dob">Date of Birth: </label> 
            <!-- regex copied from https://arziel1992.github.io/input-pattern-tester (as listed in module 3) -->
            <input type="text" id="dob" name="dateOfBirth" pattern="(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[012])/\d{4}" placeholder="dd/mm/yyyy" required>
        </p>

        <fieldset id="genderFieldset">
            <legend>Gender</legend>

            <input type="radio" id="boy" name="gender" class="gender" value="boy" required>
            <label for="boy" class="gender">Boy</label> 

            <input type="radio" id="girl" name="gender" class="gender" value="girl">
            <label for="girl" class="gender">Girl</label>

            <input type="radio" id="nonBinary" name="gender" class="gender" value="nonBinary">
            <label for="nonBinary" class="gender">Non-Binary</label> 

            <input type="radio" id="other" name="gender" class="gender" value="other">
            <label for="other" class="gender">Other</label> 
        </fieldset>
        
        <p>
            <label for="address">Street Address: </label> 
            <input type="text" id="address" name="address" maxlength="40" size="40" required>
        </p>        
        <p>
            <label for="suburb">Suburb/Town: </label> 
            <input type="text" name="suburb" id="suburb" maxlength="40" size="40" required>
        </p>
        <p>
            <label for="state">State: </label> 
            <select name="state" id="state" required>
                <option value="">Please Select</option>
                <option value="vic">VIC</option>
                <option value="nsw">NSW</option>
                <option value="qld">QLD</option>
                <option value="nt">NT</option>  
                <option value="wa">WA</option>
                <option value="sa">SA</option>
                <option value="tas">TAS</option>
                <option value="act">ACT</option>
            </select>
        </p>

        <p>
            <label for="zip">Postcode: </label> 
            <input type="text" name="zip" id="zip" maxlength="4" pattern="\d{4}" title="Must be 4 digits" required>
        </p>

        <p>
            <label for="email">Email Address: </label> 
            <!-- regex copied from https://arziel1992.github.io/input-pattern-tester (as listed in module 3) -->
            <input type="text" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Must be a valid email (e.g., user123@example.co.uk)" required> 
        </p>

        <p>
            <label for="phone">Phone Number: </label>
            <input type="text" name="phone" id="phone" pattern="[0-9\s]{8,12}" maxlength="15" title="Must be 8 to 12 digits (e.g., 123 456 7890)" required>
        </p>

        <!-- I assume "required technical" meant skills that are required? For all open jobs? And the user unselects the ones they dont have? -->
        <p>
            <label>Required Technical Skills: </label>
            <label><input type="checkbox" class="requiredTechnical" name="skillsCPP" value="1" checked> C++</label>
            <label><input type="checkbox" class="requiredTechnical" name="skillsHTML" value="1" checked> HTML</label>
            <label><input type="checkbox" class="requiredTechnical" name="skillsCSS" value="1" checked> CSS</label>
            <label><input type="checkbox" class="requiredTechnical" name="skillsJS" value="1" checked> JavaScript</label>
            <label><input type="checkbox" class="requiredTechnical" name="skillsMySQL" value="1" checked> MySQL</label>
            <label><input type="checkbox" class="requiredTechnical" name="skillsPS" value="1" checked> Photoshop</label>
            <label><input type="checkbox" class="requiredTechnical" name="skillsGA" value="1" checked> Google Analytics</label>
        </p>
        <p>
            <label for="otherSkills">Other Skills:</label>
            <br>
            <textarea id="otherSkills" name="otherSkills" rows="10" cols="50" placeholder="Tell us about your skills..."></textarea>
        </p>
        <p>
            <button type="submit">Apply</button>
        </p>
    </form>
    <?php include('footer.inc') ?>
</body>
</html>