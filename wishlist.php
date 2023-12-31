<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/rent_buy.css">
    <title>Renting</title>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

*{
    margin: 0;
    padding: 0;
    font-family: 'Poppins',sans-serif;
    box-sizing: border-box;
}
.total{
    width: 100%;
    min-height: 100vh;
    background: white;
    box-sizing: border-box;
}
      .contact{
        border-radius:12px;
        border:0.4px solid black;
        padding:5px;
      }
      .contact:hover{
        background-color: red;
        color:white;
      } 
    </style>
</head>
<body>
    <div class="total"> 
            <div class="navbar">
                    <div class="c1">
                        <img src="images/logo.png">
                    </div>
                    <nav>
                         <ul>
                            <li><a href="index.html" >Home</a></li>
                            <li><a href="#">Products</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Account</a></li>
                        </ul>
                    </nav>
                    <button class="dropbtn" onclick="menutoggle()"></button>
                
            </div>
            <div id="myDropdown" class="dropdown-content menu active">
                <ul>
                   <li><img src="images/user.png"><a href="#">My Profile</a></li>
                   <li><img src="images/home.png"><a href="myproperty.php">My Property</a></li>
                   <li><img src="images/shortlist.png"><a href="wishlist.php">Shortlist</a></li>
                   <li><img src="images/serv.jpg"><a href="myservices.php">My services</a></li>
                   <li><img src="images/logout.png"><a href="login page.html">Log out</a></li>
                </ul>  
             </div>
             <div class="box">
    <div class="table">
      <table class="ta1">
        <tr>
          <th>Image</th>
          <th>type</th>
          <th>price</th>
          <th>state</th>
          <th>pincode</th>
        </tr>

        <?php
        session_start();

$conn = mysqli_connect("localhost", "root", "", "services management");
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
$pm=$_SESSION['user'];
$sql = "SELECT * FROM wishlist where user='$pm'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $pd=$row['prop_id'];
    $sq = "SELECT * FROM seller where sellerid='$pd'";
    $re = $conn->query($sq);
    if ($re->num_rows > 0) {
      while($r = $re->fetch_assoc()) {
        $files_array=explode(',',$r['images']);
      ?>
      <tr>
      <td><a href="uploads/<?php echo $files_array[0]; ?>"><img class="img1" id="img1" src="uploads/<?php echo $files_array[0]; ?>" width="100" height="100"></a></td>
      <td><?php echo $r['type']; ?></td>
      <td><?php echo $r['price']; ?></td>
      <td><?php echo $r['state']; ?></td>
      <td><?php echo $r['pincode']; ?></td>
      </tr>	
    <?php
   }
  }else{
    echo "Not alloted";
  }
  }
}else{ 
  echo "0 results"; 
}
?>


</table>
<?php $conn->close();?>
      </div>
    </div>
    </div>
</body>
<script>
    function menutoggle() {
       document.getElementById("myDropdown").classList.toggle("show");
     }
     window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
           var dropdowns = document.getElementsByClassName("dropdown-content");
           var i;
           for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                 openDropdown.classList.remove('show');
              }
           }
        }
     }
</script>
</html>