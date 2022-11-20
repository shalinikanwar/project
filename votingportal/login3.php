<?php
session_start();
include("connect.php");


$sql = mysqli_query($connect,"SELECT * FROM signupn2 where Candidate=1 ");

if(mysqli_num_rows($sql)>0){
    $userdata3 = mysqli_fetch_array($sql);
    $groups = mysqli_query($connect, "SELECT * FROM signupn2 where Candidate=1 ");
    $groupsdata3 = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userdata3'] = $userdata3;
    $_SESSION['groupsdata3'] = $groupsdata3;

    echo '
    <script>
       
       window.location ="../votingportal/finalvote3.php";
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