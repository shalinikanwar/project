<?php
session_start();
include('connect.php');

$votes =$_POST['gvotes'];
$total_votes =$votes+1;
$gid =$_POST['gid'];
$uid =$_SESSION['userdata3']['id'];

$update_votes =mysqli_query($connect, "UPDATE signupn2 SET vote3='$total_votes' WHERE id='$gid' ");
$update_user_status =mysqli_query($connect, "UPDATE signupn2 SET status3=1 WHERE id='$uid' ");

if($update_votes and $update_user_status){


   $groups = mysqli_query($connect, "SELECT * FROM signupn2 where Candidate=1");
   $groupsdata3 = mysqli_fetch_all($groups, MYSQLI_ASSOC);
   $_SESSION['userdata3'] ['status3'] = 1;
   $_SESSION['groupsdata3'] = $groupsdata3;

   echo '
   <script>
   alert("Voting successfull!");
   window.location ="../votingportal/finalvote3.php";
</script>
';

}
else{

    echo '
    <script>
    alert("Some error occured!");
    window.location ="../votingportal/finalvote3.php";
</script>
';

}


?>