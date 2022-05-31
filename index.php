<?php 

include('dbconnect.php');
include('header.php');

?>
        <div class="book">
            <p>اهلا بك في مستشفى الشفاء , للحجز املء الإستمارة أدناه</p>
            <form action="index.php" method="POST">
                <input type="text" placeholder="أدخل الاسم" name="name" required>
                <input type="email" placeholder="أدخل البريد الالكتروني" name="email" required>
                <input type="date" name="date" placeholder="dd-mm-yyyy" required>
                <input type="submit" value="احجز الان" name="send">
            </form>
<?php


$patient_name = "";
$patient_email = "";
$date = "";
$sendBtn ="";

if(isset($_POST['name'])){
    $patient_name .= $_POST['name'];
}

if(isset($_POST['email'])){
    $patient_email .= $_POST['email'];
}

if(isset($_POST['date'])){
    $date .= $_POST['date'];
}

if(isset($_POST['send'])){
    $sendBtn .= $_POST['send'];
}


// Send petient info to database

$query = "insert into patients(name,email,date) value('$patient_name','$patient_email','$date')";

if($sendBtn){

    if(count(mysqli_fetch_all(mysqli_query($con,"select * from patients where date = '$date'"))) >= 10){

        echo "<p style='color: red;'>" . "نأسف هذا الموعد محجوز بالفعل" . "</p>";

}   elseif(count(mysqli_fetch_all(mysqli_query($con,"select * from patients where date = '$date'"))) < 10){

    mysqli_query($con,$query);
    echo "<p style='color: #00a9b0;'>" . "تم حجز الموعد في " ."(".$date.")" . "</p>";
}
}
?>
        </div>
    </div>
</body>
</html>




