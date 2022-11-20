<?php
session_start();
include('connect.php');

$votes =$_POST['gvotes'];
$total_votes =$votes+1;
$gid =$_POST['gid'];
$uid =$_SESSION['userdata6']['id'];

$update_votes =mysqli_query($connect, "UPDATE signupn5 SET vote6='$total_votes' WHERE id='$gid' ");
$update_user_status =mysqli_query($connect, "UPDATE signupn5 SET status6=1 WHERE id='$uid' ");

if($update_votes and $update_user_status){


   $groups = mysqli_query($connect, "SELECT * FROM signupn5 where Candidate=1");
   $groupsdata6 = mysqli_fetch_all($groups, MYSQLI_ASSOC);
   $_SESSION['userdata6'] ['status6'] = 1;
   $_SESSION['groupsdata6'] = $groupsdata6;

   echo '
   <script>
   alert("Voting successfull!");
   window.location ="../votingportal/finalvote6.php";
</script>
';

}
else{

    echo '
    <script>
    alert("Some error occured!");
    window.location ="../votingportal/finalvote6.php";
</script>
';

}


?>