<?php
session_start();
include("connect.php");

$Enrollmentnumber =$_POST['enrollment'];
$Password = $_POST['password'];
$role = $_POST['role'];

$check = mysqli_query($connect,"SELECT * from signup where EnrollmentNumber ='$Enrollmentnumber' and Password ='$Password' and role ='$role'  ");

if(mysqli_num_rows($check)>0){
    $userdata = mysqli_fetch_array($check);
    $groups = mysqli_query($connect, "SELECT * FROM signup WHERE role=2 ");
    $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userdata'] = $userdata;
    $_SESSION['groupsdata'] = $groupsdata;

    echo '
    <script>
    
       window.location ="../votingportal/dashboard.php";
    </script>
 ';
}
 
else{
   echo '
            <script>
               alert("Invalid Credentials or User not found!");
               window.location ="../votingportal/login.html";
            </script>
       ';
 }
?>