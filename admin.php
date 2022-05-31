<?php 

include('header.php');
include('dbconnect.php');

?>

<table>
    <th>الرقم</th>
    <th>إسم المريض</th>
    <th>البريد الإلكتروني</th>
    <th>التاريخ</th>
<?php
// Bring info from database

$query = "select * from patients";
$result = mysqli_query($con,$query);

if($result){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr class='tbl'><td>". $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['date'] . "</td></tr>";
    }
}

?>

</table>