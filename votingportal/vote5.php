<?php
session_start();
include('connect.php');

$votes =$_POST['gvotes'];
$total_votes =$votes+1;
$gid =$_POST['gid'];
$uid =$_SESSION['userdata5']['id'];

$update_votes =mysqli_query($connect, "UPDATE signupn4 SET vote5='$total_votes' WHERE id='$gid' ");
$update_user_status =mysqli_query($connect, "UPDATE signupn4 SET status5=1 WHERE id='$uid' ");

if($update_votes and $update_user_status){


   $groups = mysqli_query($connect, "SELECT * FROM signupn4 where Candidate=1");
   $groupsdata5 = mysqli_fetch_all($groups, MYSQLI_ASSOC);
   $_SESSION['userdata5'] ['status5'] = 1;
   $_SESSION['groupsdata5'] = $groupsdata5;

   echo '
   <script>
   alert("Voting successfull!");
   window.location ="../votingportal/finalvote5.php";
</script>
';

}
else{

    echo '
    <script>
    alert("Some error occured!");
    window.location ="../votingportal/finalvote5.php";
</script>
';

}


?>