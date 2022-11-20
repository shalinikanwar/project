<?php
session_start();
include("connect.php");


$sql = mysqli_query($connect,"SELECT * FROM signupn where Candidate=1 ");

if(mysqli_num_rows($sql)>0){
    $userdata1 = mysqli_fetch_array($sql);
    $groups = mysqli_query($connect, "SELECT * FROM signupn where Candidate=1 ");
    $groupsdata1 = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userdata1'] = $userdata1;
    $_SESSION['groupsdata1'] = $groupsdata1;

    echo '
    <script>
       
       window.location ="../votingportal/finalvote1.php";
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