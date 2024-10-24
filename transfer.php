<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titan+One&family=Merienda&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <style>
        body {
            background-image: url("money-seamless-pattern-background-icons-your-design-91449843.webp");
            font-family: 'Merienda', cursive;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            
            height: 100vh;
        }
        .div2{
            display: flex;
    justify-content: center;
    align-items: center;
        }
    
        .div1 {
          width: 80%;
          max-width: 800px;
          border: 1px solid #c3c3c3;
          display: flex;
          background-color: #f4f4f4;
          flex-direction: column;
          text-align: center;
          align-items: center;
          justify-content: center;
          box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
          transition: 0.3s;
          justify-content: space-around;
        }
        
        h1 {
            font-family: 'Titan One', cursive;
            color: #333;
            padding: 20px 0;
            font-size: 2em;
            text-transform: uppercase;
        }
        
        input, select {
        width: 80%;
        padding: 10px;
        margin: 10px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-family: 'Merienda', cursive;
    }

    /* Style for submit button */
    input[type=submit] {
      font-family: 'Merienda', cursive;
            width: 200px;
            height: 50px;
            margin: 20px auto;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: all 0.3s ease;
            transform: scale(1);
    }

    input[type=submit]:hover {
      background-color: #444;
            transform: scale(1.1);
    }
    .header {
            display: flex;
            justify-content: space-around;
            background-color: #333;
            color: #fff;
            padding: 20px 0;
        }

        .header a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            transform: scale(1);
        }
        .header a:hover {
            padding: 20px;
            color: #333;
            background-color: #fff;
            transform: scale(1.1);
        }
        </style>
</head>

<body>
<div class="header">
        <a href="index.html">Home</a>
        <a href="all.php">All Customers</a>
        <a href="TH.php">Transaction History</a>
    </div ><br></br>
    <div class="div2"> <div class="div1">
    <h1>Transfer Money</h1>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";
$id=$_POST['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Display the form for a new transaction
$sql = "SELECT * FROM  customers where id=$id";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($result);
?>
<form action="succes.php" method="get">
<label for="from">From:</label><br>
<?php echo $rows['name']; ?>
<br>
<label for="to">To:</label><br>
<select name="to" required>
    <option value="" disabled selected>Choose</option>
   <?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "bank";
   $id=$_POST['id'];
   
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   
   // Check connection
   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }
   $sql = "SELECT * FROM customers where id!=$id";
   $result=mysqli_query($conn,$sql);
   while($rows = mysqli_fetch_assoc($result)) {
   ?>
   
   <option  value="<?php echo $rows['id'];?>" >
   <?php echo $rows['name'] ;?> 
   </option>

<?php } ?>

 </select>
 <!-- Hidden input field to pass the id -->
 <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
<label for="amount">Amount:</label><br>
<input type="number" id="amount" name="amount"><br>
<input type="submit" value="Submit">
</form>

<?php
$conn->close();
?></div>
</body>
</html>
