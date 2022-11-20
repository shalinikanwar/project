<?php
session_start();
include("connect.php");


$sql = mysqli_query($connect,"SELECT * FROM signupn4 where Candidate=1 ");

if(mysqli_num_rows($sql)>0){
    $userdata5 = mysqli_fetch_array($sql);
    $groups = mysqli_query($connect, "SELECT * FROM signupn4 where Candidate=1 ");
    $groupsdata5 = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userdata5'] = $userdata5;
    $_SESSION['groupsdata5'] = $groupsdata5;

    echo '
    <script>
       
       window.location ="../votingportal/finalvote5.php";
    </script>
 ';
}
 
else{
   echo '
            <script>
               alert("Invalid Credentials or User not found!");
               window.location ="../votingportal/dashboard.php";
            </script>
       ';
 }

?>