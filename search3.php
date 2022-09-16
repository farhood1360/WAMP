<?php

// define variables and set to empty values
$first_name = $last_name = $email = $Zip = "";

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

    $first_name = test_input($_POST["first_name"]);

    $last_name = test_input($_POST["last_name"]);
      
    $Zip = test_input($_POST["Zip"]);
}

function test_input($data) {
  //data = implode("-", str_split($data, 2));
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//echo $ItemCode;

$sql1 = "SELECT * FROM `ppi` WHERE First_Name = '$first_name' OR Last_Name = '$last_name' OR Zip = '$Zip' ORDER BY First_Name";
$result1 = $conn->query($sql1);

$sql2= "SELECT * FROM `ppi` WHERE First_Name = '$first_name' AND Zip = '$Zip' ORDER BY First_Name";
$result2 = $conn->query($sql2);

$conn->close();  

include 'header.php';

?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" href="style.css">
</head>
  
<body>
<div id="page-content">
<!-- Navigation info -->
    <ul id="nav-info" class="clearfix">
        <li><a href="candidates.php">Candidates</a></li>
        <li class="active"><a href="#">Search</a></li>
    </ul>
    <div id="signupbox" class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Candidates Search</div>
        </div>  
        <div class="panel-body" >
            <form id="signupform" class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <table class='table table-striped'>
                    <thead>
                        <tr>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Residential Zip Code </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                            <input type="text" class="form-control" name="first name" placeholder="first name" value="<?php echo $first_name;?>" >
                            </td>
                            <td>
                                <select name="last_name" id="last_name" class="form-control">
                                    <option value="Zip Code"></option>
                                    <option value="Rashidi">Rashidi</option>
                                    <option value="test1">test1</option>
                                </select>
                           </td>
                            <td>
                                <select name="Zip" id="Zip" class="form-control">
                                    <option value="Zip Code"></option>
                                    <option value="77498">77498</option>
                                    <option value="2">2</option>
                                    <option value="77019">77019</option>
                                    <option value="77022">77022</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>    
                </table>
                <div class="form-group">
                    <div class="col-md-offset-6 col-md-12">
                        <button id="btn-signup" type="submit" name="register" value="register" class="btn btn-info" style="padding-left: 50px; padding-right: 50px;"><i class="icon-hand-right"></i>Search</button>
                    </div>
                </div>                  
                <div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                            If You want to go back Home, 
                        <a href="candidates.php">
                            Go 
                        </a>Here
                        </div>
                    </div>
                </div>                  
            </form>
         </div>
    <section>
        <h1>Candidates ( OR )</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Residential Zip Code</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result1->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
               <td><?php echo $rows['First_Name'];?></td>
               <td><?php echo $rows['Last_Name'];?></td>
               <td><?php echo $rows['Email'];?></td>
               <td><?php echo $rows['Phone'];?></td>
               <td><?php echo $rows['Zip'];?></td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>
            <br><hr><br>
    <section>
        <h1>Candidates ( AND )</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Residential Zip Code</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result2->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
               <td><?php echo $rows['First_Name'];?></td>
               <td><?php echo $rows['Last_Name'];?></td>
               <td><?php echo $rows['Email'];?></td>
               <td><?php echo $rows['Phone'];?></td>
               <td><?php echo $rows['Zip'];?></td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>
    <br>

    </div>
<?php include 'footer.php'; ?>
</div>
</body>
  
</html>                
