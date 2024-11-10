<?php 
include'config.php';

$sql="SELECT * FROM students";

$result = $conn->query($sql);


echo"<a href='register.php'><button>Add User</button></a></br></br></br></br>";
echo "<table border='5' bordercolor='skyblue'>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>";
foreach ($result as $key) {
    echo"<tr><td>".$key['name']."</td>";
    echo"<td>".$key['last_name']."</td>";
   echo "<td>".$key['email']."</td>";
echo "<td><a href='Edit.php?id=".$key['id']. "&name=" . $key['name'] . "&name=" . $key['last_name'] . "&name=" . $key['email'] . "'><button name='edit'>Update</button></a></td>";
echo "<td><a href='Delete.php?id=" . $key['id']."'><button name='edit'>Delete</button></a></td></tr>";
    
}
echo"<table>";
?>