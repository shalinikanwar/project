<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="../votingportal/style4.css">
<link rel="stylesheet" href="../votingportal/brain4.js">
<title>signup</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-primary mb-4">
<div class="container-fluid">
<a class="nav-link disabled" href="#">Home</a>
<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="navbar-collapse collapse" id="navbarCollapse">
<ul class="navbar-nav me-auto mb-2 mb-md-0">
<li class="nav-item">
<a class="nav-link disabled" aria-current="page" href="../votingportal/login.html">log in</a>
</li>
<li class="nav-item">
<a class="nav-link disabled" href="#">Sign up</a>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
data-bs-toggle="dropdown" aria-expanded="false">
Be with us
</a>
<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
<li><a class="dropdown-item disabled" href="../votingportal/faq.html">FAQ</a></li>
<li><a class="dropdown-item disabled" href="../votingportal/contactus.html">Contact us</a></li>
<li>
<hr class="dropdown-divider">
</li>
<li><a class="dropdown-item disabled" href="#">Invite friends</a></li>
</ul>
<li class="nav-item">
<a class="nav-link disabled" >Vote here</a>
</li>
<li class="nav-item">
<a class="nav-link disabled" href="../votingportal/nomination1.html">File nomination</a>
</li>
<!-- <li class="nav-item">
<a class="nav-link" href="signup.html">File nomination</a>
</li> -->
</ul>
<form class="d-flex" method='get' action='search.php'>
<input name='search' class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
<button class="btn btn-outline-success" type="submit">Search</button>
</form>
</div>
</div>
</nav>
<?php


session_start();
if(!isset($_SESSION['userdata'])){
header("location: ../votingportal/index.html");
}
$userdata =$_SESSION['userdata'];
$groupsdata =$_SESSION['groupsdata'];


if($_SESSION['userdata']['status']==0){
$status =' <b style="color:red">Not voted</b>';
}
else{
$status =' <b style="color:green">voted</b>';
}

?>

<html>

<head>
<title> Online voting system - Dashboard</title>
<link rel="stylesheet" href="../votingportal/stylesheet.css">

</head>
<body>
<style>
#backbtn{
padding : 5px;
font-size: 15px;
background-color:blue;
color:white;
border-radius: 5px;
float: left;
margin: 10px;
}
#logoutbtn{
padding : 5px;
font-size: 15px;
background-color:blue;
color:white;
border-radius: 5px;
float: right;
margin: 10px;
}
#Profile{

width: 10%;
padding: 120px;
float: left;
}
#Group{

width: 5%;
padding: -25px;
float: right;
}
/* #votebtn{
padding : 5px;
font-size: 15px;
background-color:blue;
color:white;
border-radius: 5px;

} */

#mainpanel{
padding: 10px;
}

#voted{
padding : 5px;
font-size: 15px;
background-color:green;
color:white;
border-radius: 5px;
}
#top{
padding-right : 175px;
}
#topp{
padding-right : 155px;

}
#topps{
padding-right : 225px;
}
</style>

<div id ="mainsection">
<center>
<div id="headersection">
<a href="../votingportal/index.html"> <button id ="backbtn"> Back</button></a>
<a href="logout.php"><button id="logoutbtn">Logout</button></a>
<h1>ONLINE VOTING PORTAL</h1>
</div>
</center>
<hr>

<div id="mainpanel">
<div id="Profile">
<center><img src="../votingportal/uploads/<?php echo $userdata['image']?> "height="100" width ="100"></center> <br><br>
<b>First Name:</b> <?php echo $userdata['FirstName']?> <br><br>
<b>Last Name:</b> <?php echo $userdata['LastName']?> <br><br>
<b>Enrollment Number:</b> <?php echo $userdata['EnrollmentNumber']?> <br><br>
<b>Phone number:</b> <?php echo $userdata['Phonenumber']?> <br><br>
<b>Email:</b> <?php echo $userdata['Email']?> <br><br>
<!-- <b>Status:</b> <?php echo $status?> <br><br> -->
</div>

<div id="Group">
<?php
if($_SESSION['groupsdata']){
for($i=0; $i<count($groupsdata); $i++){
?>

<!-- <div><br><br><br><br>
<img src="../votingportal/uploads/<?php echo $groupsdata[$i]['image'] ?>"height="100" width="100"> <br><br>
<b>Candidate First Name: </b><?php echo $groupsdata[$i]['FirstName'] ?> <br><br>
<b>Candidate Last Name: </b><?php echo $groupsdata[$i]['LastName'] ?> <br><br>
<b>Votes: </b><?php echo $groupsdata[$i]['votes'] ?><br><br>
<form action="../votingportal/vote.php" method ="POST">
<input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
<input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>"> -->


<!-- if($_SESSION['userdata']['status']==0){    -->


<!-- <input type="submit" name="votebtn" value="vote" id="votebtn">


// }
// else{
// 
<!<button  disabled type="button" name="votebtn" value="vote" id="voted">Voted</button> -->
<?php
}
?>
</form>
</div>
<hr>
<?php

}

else{

}

?>
</div>
</div>
</div>
</body>
</html>


<div class="container">
<h1><div id="top"> Every Vote Counts</div></h1>
<div class="containers px-4 py-5" id="featured-3">
<h3 class="pb-2 border-bottom"><div id="topp">Clubs at a new level!!!</div></h3>
<div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
<div class="containeri">
<div class="feature col">
<div class="feature-icon bg-primary bg-gradient">
<!-- <img class="bd-placeholder-img" width="50" height="50" src="write.jpg" alt=""> -->
<!-- <svg class="bi" width="1em" height="1em">
<use xlink:href="#collection"></use>
</svg> -->
</div>
<h2>Student Council President</h2>
<p>The President is responsible for presiding over meetings of the Council. 
The President, with theSecretary, prepares the agenda for each meeting and, where necessary, signs the minutes once they have been agreed by the Council.
The President may also bedesignated to represent the Council at meetings with management.</p>
<a href="../votingportal/login1.php" class="icon-link">
Want to vote now!

<svg class="bi" width="1em" height="1em">
<use xlink:href="#chevron-right"></use>
</svg>
</a>
<a href="../votingportal/nomination1.html" class="icon-link">
Want to file nomination!

<svg class="bi" width="1em" height="1em">
<use xlink:href="#chevron-right"></use>
</svg>
</a>
</div>
</div>
<div class="containeri">
<div class="feature col">
<div class="feature-icon bg-primary bg-gradient">
<!-- <img class="bd-placeholder-img" width="140" height="140" src="supriya.jpg" alt=""> -->
<!-- <svg class="bi" width="1em" height="1em">
<use xlink:href="#people-circle"></use>
</svg> -->
</div>

<h2>The Academic club president</h2>
<p>The President is the figurehead of the club. ...
The President essentially shapes the aims of the club for the year.
They will usually chair meetings (if absent a Vice President or Secretary can do this) and support the work of other committee members (remember delegation is an art form in itself).</p>
<a href="../votingportal/login2.php" class="icon-link">
Want to vote now!

<svg class="bi" width="1em" height="1em">
<use xlink:href="#chevron-right"></use>
</svg>
</a>
<a href="../votingportal/nomination2.html" class="icon-link">
Want to file nomination!

<svg class="bi" width="1em" height="1em">
<use xlink:href="#chevron-right"></use>
</svg>
</a>
</div>
</div>
<div class="containeri">
<div class="feature col">
<div class="feature-icon bg-primary bg-gradient">
<!-- <img class="bd-placeholder-img" width="140" height="140" src="supriya.jpg" alt=""> -->
<!-- <svg class="bi" width="1em" height="1em">
<use xlink:href="#toggles2"></use>
</svg> -->
</div>
<h2>Sports Club Vice-President</h2>
<p>The president or chairperson is the principal leader of the club and has overall responsibility for the club's administration. 
...
The second major role of the president is to facilitate effective management of club/committee meetings.</p>
<a href="../votingportal/login3.php" class="icon-link">
want to vote now!

<svg class="bi" width="1em" height="1em">
<use xlink:href="#chevron-right"></use>
</svg>
</a>
<a href="../votingportal/nomination3.html" class="icon-link">
Want to file nomination!

<svg class="bi" width="1em" height="1em">
<use xlink:href="#chevron-right"></use>
</svg>
</a>
</div>
</div>
</div>
</div>
<div class="containers px-4 py-5" id="featured-3">
<h2 class="pb-2 border-bottom"><div id="topps">Decide what your classroom looks like!</div></h2>
<div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
<div class="containeri">
<div class="feature col">
<div class="feature-icon bg-primary bg-gradient">
<!-- <img class="bd-placeholder-img" width="140" height="140" src="supriya.jpg" alt=""> -->
<!-- <svg class="bi" width="1em" height="1em">
<use xlink:href="#collection"></use>
</svg> -->
</div>
<h2>BCA section'B' class representative</h2>
<p>A class representative serves as a bridge between the College and Students. ... 
Class Representative is expected to seek other 
classmate student opinion on academic issues and feed these back to members of staff / management.</p>
<a href="../votingportal/login4.php" class="icon-link">
want to vote now!
<svg class="bi" width="1em" height="1em">
<use xlink:href="#chevron-right"></use>
</svg>
</a>
<a href="../votingportal/nomination4.html" class="icon-link">
Want to file nomination!

<svg class="bi" width="1em" height="1em">
<use xlink:href="#chevron-right"></use>
</svg>
</a>
</div>
</div>
<div class="containeri">
<div class="feature col">
<div class="feature-icon bg-primary bg-gradient">
<!-- <img class="bd-placeholder-img" width="140" height="140" src="supriya.jpg" alt=""> -->
<!-- <img class="bi" width="10em" height="10em" src="photo5.jpg" alt="">
<- <svg class="bi" width="4em" height="4em">
<use xlink:href="#people-circle"></use>
</svg> -->
</div>
<h2>MCA section 'A' class representative</h2>
<p>A class representative serves as a bridge between the College and Students. ...
Class Representative is expected to seek other classmate student opinion on academic issues and feed these back to members of staff / management.</p>
<a href="../votingportal/login5.php" class="icon-link">
want to vote now!
<svg class="bi" width="1em" height="1em">
<use xlink:href="#chevron-right"></use>
</svg>
</a>
<a href="../votingportal/nomination5.html" class="icon-link">
Want to file nomination!

<svg class="bi" width="1em" height="1em">
<use xlink:href="#chevron-right"></use>
</svg>
</a>
</div>
</div>
<div class="containeri">
<div class="feature col">
<div class="feature-icon bg-primary bg-gradient">
<!-- <img class="bd-placeholder-img" width="140" height="140" src="supriya.jpg" alt=""> -->
<!-- <svg class="bi" width="1em" height="1em">
<use xlink:href="#toggles2"></use>
</svg> -->
</div>
<h2>MCA section 'A' class representative</h2>
<p>A class representative serves as a bridge between the College and Students. ...
Class Representative is expected to seek other classmate student opinion on academic issues and feed these back to members of staff / management.</p>
<a href="../votingportal/login6.php" class="icon-link">
want to vote now!
<svg class="bi" width="1em" height="1em">
<use xlink:href="#chevron-right"></use>
</svg>
</a>
<a href="../votingportal/nomination6.html" class="icon-link">
Want to file nomination!

<svg class="bi" width="1em" height="1em">
<use xlink:href="#chevron-right"></use>
</svg>
</a>
</div>
</div>
</div>
</div>

</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>

</html>