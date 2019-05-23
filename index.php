<style>
table, th, td {
border: 1px solid black;
border-collapse: collapse;
}
table{
  width: 100%;
}
</style>
<?php
#Create Connection
$host = "localhost";
$user = "root";
$pass = "";
$db = "php_connection";

// echo "<table style='border: solid 1px black;'>";
// echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th><th>Email</th></tr>";
// Create this class for Select / getting data from database
// class TableRows extends RecursiveIteratorIterator{
//   function __construct($it){
//     parent::__construct($it, self::LEAVES_ONLY);
//   }
//   function current(){
//     return "<td style='width:150px;border:1px solid black;'>".parent::current()."</td>";
//   }
//   function beginChildren(){
//     echo "<tr>";
//   }
//   function endChildren(){
//     echo "</tr>". "\n";
//   }
// }

#connection Test
try {
  $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec("SET CHARACTER SET utf8");
  echo "Database Connection Successful.<br>";

  #create Database
  // $sql = "CREATE DATABASE myDBPDO";
  //   // use exec() because no results are returned
  //   $conn->exec($sql);
  //   echo "Database created successfully<br>";

  // sql to create table
    // $sql = "CREATE TABLE MyGuests (
    // id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    // firstname VARCHAR(30) NOT NULL,
    // lastname VARCHAR(30) NOT NULL,
    // email VARCHAR(50),
    // reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    // )";
    //
    // // use exec() because no results are returned
    // $conn->exec($sql);
    // echo "Table MyGuests created successfully";
    # Table Creation Part End


    #Insert Data Into Database
   //  $sql = "INSERT INTO userlist (firstName, lastName, email)
   // VALUES ('John', 'Doe', 'john@example.com')";
   // // use exec() because no results are returned
   // $conn->exec($sql);
   // echo "New record created successfullyl. ID- ".$conn->lastInsertId();

   # prepare sql and bind parameters
   // $sql = "INSERT INTO userlist (firstName, lastName, email) VALUES (:firstName, :lastName, :email)";
   // $stmt = $conn->prepare($sql);
   // $stmt->bindParam(':firstName', $firstName);
   // $stmt->bindParam(':lastName', $lastName);
   // $stmt->bindParam(':email', $email);
   //
   // #insert a row
   // $firstName = "Sadia";
   // $lastName = "Afrin";
   // $email = "sadia@gmail.com";
   // $stmt->execute();
   // echo "New records created successfully";
   # Insert Part End

   # Select Data from Database
   $sql = "SELECT * FROM userlist ORDER BY id DESC";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   // set the resulting array to associative and get the data from database
   // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
   // foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $key => $value) {
   //   echo $value;
   // }
   echo "<table style='border: solid 1px black;'>";
   echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th><th>Fullname</th><th>Email</th></tr>";
   foreach ($stmt->fetchAll() as $key => $value) {
     ?>
     <tr>
       <td><?php echo ++$key;?></td>
       <td><?php echo $value['firstName']; ?></td>
       <td><?php echo $value['lastName']; ?></td>
       <td><?php echo $value['firstName']." ".$value['lastName']; ?></td>
       <td><?php echo $value['email']; ?></td>
     </tr>

   <?php }
echo "</table>";
#Select Part End

#Update Database VAlue by ID
// $up = "UPDATE userlist SET firstName='Sadia', lastName='Afrin' WHERE id=15";
// $stmt_up = $conn->prepare($up);
// $stmt_up->execute();
// echo $stmt_up->rowCount(). " record update successfully.";
#Update Part End

# Delete Part Start
// sql to delete a record
  // $sql = "DELETE FROM userlist WHERE id=14";

  // use exec() because no results are returned
  // $conn->exec($sql);
  // echo "Record deleted successfully";
# Delete Part End

} catch (PDOException $e) {
  echo "Can't connect to the database".$e->getMessage();
}

$conn = null;
// echo "</table>";
?>
