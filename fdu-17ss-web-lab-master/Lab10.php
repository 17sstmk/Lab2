
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chapter 14</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    

    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    

</head>
<body>
    <?php include 'header.inc.php'; ?>
    


    <!-- Page Content -->
    <main class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Filters</div>
          <div class="panel-body">
            <form action="Lab10.php" method="get" class="form-horizontal">
              <div class="form-inline">
              <select name="continent" class="form-control" id="t1">
                <option value="A">Select Continent</option>
                <?php
                $servername="localhost";
                $username="root";
                $password="19980918";
                $dbname="travel";
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = "SELECT ContinentCode, ContinentName FROM continents";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                  echo '<option value=' . $row['ContinentCode'] . '>' . $row['ContinentName'] . '</option>';
                }              
$conn->close();
                ?>
              </select>     
              
              <select name="country" class="form-control" id="t2">
                <option value="A">Select Country</option>
                <?php
                $servername="localhost";
                $username="root";
                $password="19980918";
                $dbname="travel";
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = "SELECT ISO, CountryName FROM countries";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                  echo '<option value=' . $row['ISO'] . '>' . $row['CountryName'] . '</option>';
                }              
$conn->close();
                ?>
              </select>    
              <input type="text"  placeholder="Search title" class="form-control" name="title" id="t3">
              <button type="submit" class="btn btn-primary">Filter</button>
              </div>
            </form>

          </div>
        </div>     
                                    

		<ul class="caption-style-2"> 
              <?php
                $servername="localhost";
                $username="root";
                $password="19980918";
                $dbname="travel";
                $conn = new mysqli($servername, $username, $password, $dbname);
                $a4=isset($_GET['continent']) ? $_GET['continent']: "A";
                $a5=isset($_GET['country']) ? $_GET['country']: "A";
                $a6=$a4;
                $a7=$a5;
                $a8=isset($_GET['title']) ? $_GET['title']: "";           
                $sql = "SELECT ImageID,ContinentCode, CountryCodeISO,Title,Path FROM imagedetails where ContinentCode='$a6' and CountryCodeISO='$a7' and Title='$a8'";
                if($a6=="A"){
                   $sql =str_replace("where ContinentCode='$a6'" ,"",$sql);
                 }
                if($a7=="A"){
                   $sql =str_replace("and CountryCodeISO='$a7'" ,"",$sql);
                 }
                if($a8===""){
                   $sql =str_replace("and Title='$a8'","",$sql); 
                 }    
                  $a=strpos($sql,"where");
                  if($a==""){
                     $a=999;
                  }
                  $b=strpos($sql,"and");
                  $c=substr($sql,$b,3);
                  if($c==="and"&&$a>$b){
                      $sql=substr_replace($sql,"where",$b,3);
                  }
                $result = $conn->query($sql);
                $p=1;
                while($row = $result->fetch_assoc()) {
                $res="";
                $a1=$row['ImageID'];
                $a2=$row['ContinentCode'];
                $a3=$row['Path'];
                $a4=$row['CountryCodeISO'];
                $a5=$row['Title'];
                $res=$res."
            <li>
              <a href='detail.php?id=$a1' class='img-responsive' name='$a2' >
                <img src='images/square-medium/$a3' alt='$a4' >
                <div class='caption'>
                  <div class='blur'></div>
                  <div class='caption-text'>
                    <p >$a5</p>
                  </div>
                </div>
              </a>
            </li>
 ";
                  echo $res;      
           }
             $conn->close();
            ?>
       </ul>       

      
    </main>
    <footer>
        <div class="container-fluid">
                    <div class="row final">
                <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
                <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>            
        </div>
    </footer>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>