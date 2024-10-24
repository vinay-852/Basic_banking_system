<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titan+One&family=Merienda&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All the customers</title>
    
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
        
        
        table {
            border-collapse: collapse;
            margin-bottom: 50px;
        }
        h1 {
            font-family: 'Titan One', cursive;
            color: #333;
            padding: 20px 0;
            font-size: 2em;
            text-transform: uppercase;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
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

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id,sender_id,receiver_id,amount,timestamp FROM transfers";
$result = $conn->query($sql);
echo '<h1>Transaction History</h1><table>
<thead>
<tr>
<th>Transaction Id</th>
<th>From</th>
<th>To</th>
<th>Money Transfered</th>
<th>Time</th></tr>
</thead><tbody>';
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["sender_id"] . "</td><td>" . $row["receiver_id"] . "</td><td>₹ "
. $row["amount"]."</td><td>" . $row["timestamp"] . "</td></tr>";
}
echo "</tbody></table>";
} else { echo "0 results"; }
$conn->close();
?></div>
</body>
</html>
