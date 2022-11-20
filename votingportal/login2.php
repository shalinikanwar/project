<?php
session_start();
include("connect.php");


$sql = mysqli_query($connect,"SELECT * FROM signupn1 where Candidate=1 ");

if(mysqli_num_rows($sql)>0){
    $userdata2 = mysqli_fetch_array($sql);
    $groups = mysqli_query($connect, "SELECT * FROM signupn1 where Candidate=1 ");
    $groupsdata2 = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userdata2'] = $userdata2;
    $_SESSION['groupsdata2'] = $groupsdata2;

    echo '
    <script>
       
       window.location ="../votingportal/finalvote2.php";
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