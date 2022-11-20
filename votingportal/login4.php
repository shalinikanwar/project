<?php
session_start();
include("connect.php");


$sql = mysqli_query($connect,"SELECT * FROM signupn3 where Candidate=1 ");

if(mysqli_num_rows($sql)>0){
    $userdata4 = mysqli_fetch_array($sql);
    $groups = mysqli_query($connect, "SELECT * FROM signupn3 where Candidate=1 ");
    $groupsdata4 = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userdata4'] = $userdata4;
    $_SESSION['groupsdata4'] = $groupsdata4;

    echo '
    <script>
       
       window.location ="../votingportal/finalvote4.php";
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