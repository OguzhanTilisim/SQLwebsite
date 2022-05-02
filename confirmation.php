<!DOCTYPE html>
<?php
include 'connectionInfo.php';
?>
<html>

<head>
    <?php define("title","PDO");?>
    <title><?php echo title; ?></title>
</head>
<body>
<style>
    p {
        font-size: large;
    }
</style>
<h1><title><?php echo title; ?></title></h1>
<?php
include "selectUserData.php";
?>
<h2>PDO Form Confirmation Example</h2>
<form id="myform" name="myform" method="post"
      action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  >
    <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to early access to the game.</p>
        <hr>

        <label for="username"><b>User Name</b></label>
        <input disabled type="text" name="username" id="username" required
               value="<?php echo $username; ?>"/>


        <br>
        <label for="psw"><b>Password</b></label>
        <input disabled onblur="passVali()" type="password" placeholder="Enter Password" name="psw" id="psw" required
               value="<?php echo $psw; ?>"/>

        <br>
        <label for="pswrepeat"><b>Repeat Password</b></label>
        <input disabled onblur="pasCheck()" type="password" placeholder="Repeat Password" name="pswrepeat" id="pswrepeat" required
               value="<?php echo $pswrepeat; ?>"/>

        <br>
        <label for="fname"><b>First Name</b></label>
        <input disabled onblur="fcheck()" type="text" placeholder="First Name" name="fname" id="fname" required
               value="<?php echo $fname; ?>"/>

        <br>
        <label for="lname"><b>Last Name</b></label>
        <input disabled onblur="lcheck()" type="text" placeholder="Enter Last Name" name="lname" id="lname" required
               value="<?php echo $lname; ?>"/>

        <br>
        <label for="address1"><b>Address Line 1</b></label>
        <input disabled onblur="add1check()" type="text" placeholder="Enter Address line 1" name="address1" id="address1" required
               value="<?php echo $address1; ?>"/>

        <br>
        <label for="address2"><b>Address Line 2</b></label>
        <input disabled onblur="add2check()" type="text" placeholder="Enter Address line 2" name="address2" id="address2"
               value="<?php echo $address2; ?>"/>

        <br>
        <label for="city"><b>City</b></label>
        <input disabled onblur="citycheck()" type="text" placeholder="Enter City" name="city" id="city" required
               value="<?php echo $city; ?>"/>
        <br>
        <label name="state" id="state" ><b>State</b></label>
        <label>
            <select disabled onblur="statecheck()" name="state" required>
                <option value="AL">AL</option>
                <option value="AK">AK</option>
                <option value="AR">AR</option>
                <option value="AZ">AZ</option>
                <option value="CA">CA</option>
                <option value="CO">CO</option>
                <option value="CT">CT</option>
                <option value="DC">DC</option>
                <option value="DE">DE</option>
                <option value="FL">FL</option>
                <option value="GA">GA</option>
                <option value="HI">HI</option>
                <option value="IA">IA</option>
                <option value="ID">ID</option>
                <option value="IL">IL</option>
                <option value="IN">IN</option>
                <option value="KS">KS</option>
                <option value="KY">KY</option>
                <option value="LA">LA</option>
                <option value="MA">MA</option>
                <option value="MD">MD</option>
                <option value="ME">ME</option>
                <option value="MI">MI</option>
                <option value="MN">MN</option>
                <option value="MO">MO</option>
                <option value="MS">MS</option>
                <option value="MT">MT</option>
                <option value="NC">NC</option>
                <option value="NE">NE</option>
                <option value="NH">NH</option>
                <option value="NJ">NJ</option>
                <option value="NM">NM</option>
                <option value="NV">NV</option>
                <option value="NY">NY</option>
                <option value="ND">ND</option>
                <option value="OH">OH</option>
                <option value="OK">OK</option>
                <option value="OR">OR</option>
                <option value="PA">PA</option>
                <option value="RI">RI</option>
                <option value="SC">SC</option>
                <option value="SD">SD</option>
                <option value="TN">TN</option>
                <option value="TX">TX</option>
                <option value="UT">UT</option>
                <option value="VT">VT</option>
                <option value="VA">VA</option>
                <option value="WA">WA</option>
                <option value="WI">WI</option>
                <option value="WV">WV</option>
                <option value="WY">WY</option>
            </select>
        </label>

        <br>
        <br><br>
        <label for="zip"><b>Zip Code</b></label>
        <input disabled onblur="zipcheck()" type="text" placeholder="Enter zip code" name="zip" id="zip" oninput="hypen()" required
               value="<?php echo $zip; ?>"/>

        <br>
        <label for="phone"><b>Phone Number</b></label>
        <input disabled type="text" placeholder="Enter phone number" name="phone" id="phone" onblur='addDashes(this)' required
               value="<?php echo $phone; ?>"/>

        <br>
        <label for="email"><b>Email</b></label>
        <input disabled onblur="emailcheck()" type="text" placeholder="Enter E-mail Address" name="email" id="email" required
               value="<?php echo $email; ?>"/>

        <br>
        <fieldset name="gender" id="gender" required>
            <b>Gender</b>
            <label for="female">Female</label>
            <input disabled type="radio" id="female" name="gender"
                <?php if (isset($gender) && $gender=="female") echo "checked"; ?> value="female"/>
            <label for="male">Male</label>
            <input disabled type="radio" id="male" name="gender"
                <?php if (isset($gender) && $gender=="male") echo "checked"; ?> value="male"/>

            <br>
        </fieldset>

        <fieldset name="martial" id="martial" required>
            <b>Martial Status</b>
            <label for="Single">Single</label>
            <input disabled type="radio" id="single" name="martial"
                <?php if (isset($martial) && $martial=="single") echo "checked"; ?> value="single"/>
            <label for="married">Married</label>
            <input disabled type="radio" id="married" name="martial"
                <?php if (isset($martial) && $martial=="married") echo "checked"; ?> value="married"/>
            <label for="Divorced">Divorced</label>
            <input disabled type="radio" id="divorced" name="divorced"
                <?php if (isset($martial) && $martial=="divorced") echo "checked"; ?> value="divorced"/>

            <br>
        </fieldset>

        <label for="dob"><b>Date of Birth</b></label>
        <input disabled type="date" placeholder="Enter Date of Birth" name="dob" id="dob" value="<?php echo $dob; ?>" required>


        <br>
        <input disabled type="submit" value="submit">
    </div>
</form>

</body>
</html>
