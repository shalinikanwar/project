<?php
session_start();
include('connect.php');

$votes =$_POST['gvotes'];
$total_votes =$votes+1;
$gid =$_POST['gid'];
$uid =$_SESSION['userdata2']['id'];

$update_votes =mysqli_query($connect, "UPDATE signupn1 SET vote2='$total_votes' WHERE id='$gid' ");
$update_user_status =mysqli_query($connect, "UPDATE signupn1 SET status2=1 WHERE id='$uid' ");

if($update_votes and $update_user_status){


   $groups = mysqli_query($connect, "SELECT * FROM signupn1 where Candidate=1");
   $groupsdata2 = mysqli_fetch_all($groups, MYSQLI_ASSOC);
   $_SESSION['userdata2'] ['status2'] = 1;
   $_SESSION['groupsdata2'] = $groupsdata2;

   echo '
   <script>
   alert("Voting successfull!");
   window.location ="../votingportal/finalvote2.php";
</script>
';

}
else{

    echo '
    <script>
    alert("Some error occured!");
    window.location ="../votingportal/finalvote2.php";
</script>
';

}


?>