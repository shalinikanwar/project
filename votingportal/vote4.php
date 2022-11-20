<?php
session_start();
include('connect.php');

$votes =$_POST['gvotes'];
$total_votes =$votes+1;
$gid =$_POST['gid'];
$uid =$_SESSION['userdata4']['id'];

$update_votes =mysqli_query($connect, "UPDATE signupn3 SET vote4='$total_votes' WHERE id='$gid' ");
$update_user_status =mysqli_query($connect, "UPDATE signupn3 SET status4=1 WHERE id='$uid' ");

if($update_votes and $update_user_status){


   $groups = mysqli_query($connect, "SELECT * FROM signupn3 where Candidate=1");
   $groupsdata4 = mysqli_fetch_all($groups, MYSQLI_ASSOC);
   $_SESSION['userdata4'] ['status4'] = 1;
   $_SESSION['groupsdata4'] = $groupsdata4;

   echo '
   <script>
   alert("Voting successfull!");
   window.location ="../votingportal/finalvote4.php";
</script>
';

}
else{

    echo '
    <script>
    alert("Some error occured!");
    window.location ="../votingportal/finalvote4.php";
</script>
';

}


?>