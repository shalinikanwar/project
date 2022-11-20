<?php
session_start();
include('connect.php');

$votes =$_POST['gvotes'];
$total_votes =$votes+1;
$gid =$_POST['gid'];
$uid =$_SESSION['userdata1']['id'];

$update_votes =mysqli_query($connect, "UPDATE signupn SET vote1='$total_votes' WHERE id='$gid' ");
$update_user_status =mysqli_query($connect, "UPDATE signupn SET status1=1 WHERE id='$uid' ");

if($update_votes and $update_user_status){


   $groups = mysqli_query($connect, "SELECT * FROM signupn where Candidate=1");
   $groupsdata1 = mysqli_fetch_all($groups, MYSQLI_ASSOC);
   $_SESSION['userdata1'] ['status1'] = 1;
   $_SESSION['groupsdata1'] = $groupsdata1;

   echo '
   <script>
   alert("Voting successfull!");
   window.location ="../votingportal/finalvote1.php";
</script>
';

}
else{

    echo '
    <script>
    alert("Some error occured!");
    window.location ="../votingportal/finalvote1.php";
</script>
';

}


?>