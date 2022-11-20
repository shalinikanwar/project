<?php
session_start();
include("connect.php");


$sql = mysqli_query($connect,"SELECT * FROM signupn5 where Candidate=1 ");

if(mysqli_num_rows($sql)>0){
    $userdata6 = mysqli_fetch_array($sql);
    $groups = mysqli_query($connect, "SELECT * FROM signupn5 where Candidate=1 ");
    $groupsdata6 = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userdata6'] = $userdata6;
    $_SESSION['groupsdata6'] = $groupsdata6;

    echo '
    <script>
       
       window.location ="../votingportal/finalvote6.php";
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