<?php

// define variables and set to empty values
$first_nameErr = $last_nameErr = $emailErr = $ZipErr =$phoneErr = "";
$first_name = $last_name = $email = $Zip =  $phone = "";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["first_name"])) {
    $first_nameErr ="first name is required";
  } else {
    $first_name = test_input($_POST["first_name"]);
    }

    if (empty($_POST["last_name"])) {
    $last_nameErr ="last name is required";
  } else {
    $last_name = test_input($_POST["last_name"]);
    }

    if(preg_match('/^[0-9]{10}+$/', $_POST["phone"])) {
        $phone = test_input($_POST["phone"]);
    } else {
        echo "Invalid Phone Number";
    }

    if(preg_match('/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/', $_POST["email"])) {
        $email = test_input($_POST["email"]);
    } else {
        echo "Invalid Email Address";
    }

    if (empty($_POST["Zip"])) {
    $ZipErr ="Zip is required";
  } else {
    $Zip = test_input($_POST["Zip"]);
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


$sql1 = "INSERT INTO ppi (First_Name, Last_Name, Email, Phone, Zip)
VALUES ('$first_name', '$last_name' ,'$email' ,'$phone' ,'$Zip')";

mysqli_query($conn, $sql1);

if (!mysqli_query($conn,$sql1)) {
  echo("Error description: " . mysqli_error($conn));
} else { echo "success!";}

include 'header.php';

?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <title>Candidates : Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="page-content">
<!-- Navigation info -->
    <ul id="nav-info" class="clearfix">
        <li><a href="#">Sign Up</a></li>
        <li class="active"><a href="search3.php">Search</a></li>
    </ul>

<div id="signupbox" class="col-md-10">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Candidates : Sign Up</div>              
        </div>  
        <div class="panel-body" >
            <form name="form1" id="signupform" class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label for="firstname" class="col-md-3 control-label">First  Name*</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php echo $first_name;?>" required>
                        <span class="error"><?php echo $first_nameErr;?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-md-3 control-label">Last Name*</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php echo $last_name;?>" required>
                        <span class="error"><?php echo $last_nameErr;?></span>
                    </div>
                </div>                      
                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">Email Address *</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email" placeholder="Email Address" value="<?php echo $email;?>" required>
                    <span class="error"><?php echo $emailErr;?></span>
                    </div>
                </div>                  
                <div class="form-group">
                    <label for="phone" class="col-md-3 control-label">Phone Number*</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="<?php echo $phone;?>"required>
                    <span class="error"><?php echo $phoneErr;?></span>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="phone" class="col-md-3 control-label">Residential Zip Code *</label>
                    <div class="col-md-9">
                        <input type="number" class="form-control" name="Zip" placeholder="Zip Code" value="<?php echo $Zip;?>"required>
                    <span class="error"><?php echo $ZipErr;?></span>
                    </div>
                </div>                         
                <div class="form-group">                              
                    <div class="col-md-offset-6 col-md-12">
                         <button id="btn-signup" type="submit" name="register" value="register" class="btn btn-info" style="padding-left: 50px; padding-right: 50px;"><i class="icon-hand-right"></i>Register</button>
                    </div>
                </div>                  
                <div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                            If You want to do Search Candidates, 
                        <a href="search3.php">
                            click on 
                        </a>Here
                        </div>
                    </div>
                </div>                  
            </form>
         </div>
    </div><?php include 'footer.php'; ?>
</div>

</body>
</html>