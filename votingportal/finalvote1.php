</html>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../votingportal/style6.css">
  <title>finalvote</title>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-primary mb-4">
    <div class="container-fluid">
      <a class="nav-link disabled" href="../votingportal/index.html">Home</a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link disabled" aria-current="page" href="../votingportal/login.html">log in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="../votingportal/signup.html">Sign up</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Be with us
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item disbled" href="../votingportal/faq.html">FAQ</a></li>
              <li><a class="dropdown-item disabled" href="../votingportal/contactus.html">Contact us</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item disabled" href="#">Invite friends</a></li>
            </ul>
          <li class="nav-item">
            <a class="nav-link active" href="../votingportal/login1.php">Vote here</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="../votingportal/nomination1.html">File nomination</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
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
    $userdata1 =$_SESSION['userdata1'];
    $groupsdata1 =$_SESSION['groupsdata1'];
   
    if($_SESSION['userdata1']['status1']==0){
        $status1 =' <b style="color:red">Not voted</b>';
    }
    else{
         $status1 =' <b style="color:green">voted</b>';
    }

?>

<html>

    <head>
        <title> VOTE HERE</title>
        <link rel="stylesheet" href="../votingportal/style6.css">
    
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
            
            
            #Group{
                
                width: 25%;
                padding: 60px;
                float: center;
            }
            #votebtn{
                padding : 5px;
                font-size: 15px;
                background-color:blue;
                color:white;
                border-radius: 5px;
            
            }

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
            #Profile{
                
                width: 10%;
                padding: 120px;
                float: left;
            }
            /* #logoutbtn{
                padding : 5px;
                font-size: 15px;
                background-color:blue;
                color:white;
                border-radius: 5px;
                float: right;
                margin: 10px;
            } */
        </style>

        <div id ="mainsection">
            <center>
            <div id="headersection">
                <a href="../votingportal/dashboard.php"> <button id ="backbtn"> Back</button></a>
                <!-- <a href="logout.php"><button id="logoutbtn">Logout</button></a> -->
                <h1>Vote Now</h1>
            </div>
            </center>
            <hr>

            <div id="mainpanel">
                <div id="Profile">
                <b>Status:</b> <?php echo $status1?> <br><br>
                </div>
                <div id="Group">
                    <?php
                        if($_SESSION['groupsdata1']){
                            for($i=0; $i<count($groupsdata1); $i++){
                                ?>
    
                                <div><br><br><br><br>
                                    <img src="../votingportal/uploads_candidate1/<?php echo $groupsdata1[$i]['photo'] ?>"height="200" width="200"> <br><br>
                                    <b>Candidate First Name: </b><?php echo $groupsdata1[$i]['Firstname'] ?> <br><br>
                                    <b>Candidate Last Name: </b><?php echo $groupsdata1[$i]['Lastname'] ?> <br><br>
                                    <b>Votes: </b><?php echo $groupsdata1[$i]['vote1'] ?><br><br>
                                    <form action="../votingportal/vote1.php" method ="POST">
                                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata1[$i]['vote1'] ?>">
                                        <input type="hidden" name="gid" value="<?php echo $groupsdata1[$i]['id'] ?>">
                                        <?php

                                            if($_SESSION['userdata1']['status1']==0){   

                                                ?>
                                                <input type="submit" name="votebtn" value="vote" id="votebtn">
                                                <?php

                                            }
                                            else{
                                                ?>
                        
                                                <button  disabled type="button" name="votebtn" value="vote" id="voted">Voted</button>
                                                <?php
                                            }
                                        ?>
                                    </form>
                                </div>
                                <hr>
                                <?php

                            }
                        }
                        else{

                        }

                    ?>
                </div>
            </div>
        </div>
    </body>

  <!-- <main class="container">
    <div class="p-4 text-white rounded bg-dark">
      <div class=" a col-md-6 px-0">
       <img src="flower.jpg" alt="" class="img-fluid">
        <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently
          about what’s most interesting in this post’s contents.</p>
        
      </div>
    </div> -->

    <!-- <div class="row mb-2">
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">candidate</strong>
            <h3 class="mb-0">Shefali Sinha</h3> -->
            <!-- <div class="mb-1 text-muted">Nov 12</div> -->
            <!-- <p class="card-text mb-auto">will work for the you
      </p>
              <button type="submit" class="btn">vote</button> -->
            <!-- <a href="#" class="stretched-link">vote for the candidate</a> -->
          <!-- </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img" width="200" height="250" src="supriya.jpg" alt=""> -->
            <!-- <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img"
              aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                dy=".3em">Thumbnail</text>
            </svg> -->

          <!-- </div>
        </div>
      </div> -->
      <!-- <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">candidate</strong>
            <h3 class="mb-0">Raghav Babbar</h3>
             <div class="mb-1 text-muted">Nov 11</div> -->
            <!-- <p class="mb-auto">Will work for you</p>
              <button type="submit" class="btn" formaction="../votingportal/index.html">vote</button> -->
            <!-- <a href="#" class="stretched-link">Continue reading</a> -->
          <!-- </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img" width="200" height="250" src="supriya.jpg" alt=""> -->
           
            <!-- <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img"
              aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                dy=".3em">Thumbnail</text>
            </svg> -->

          <!-- </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">candidate</strong>
            <h3 class="mb-0">Palak Gambhir</h3> -->
            
            <!-- <div class="mb-1 text-muted">Nov 11</div> -->
            <!-- <p class="mb-auto">Will work for you</p>
              <button type="submit" class="btn" formaction="../votingportal/index.html">vote</button> -->
            <!-- <a href="#" class="stretched-link">Continue reading</a> -->
          <!-- </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img" width="200" height="250" src="supriya.jpg" alt=""> -->
            <!-- <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img"
              aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                dy=".3em">Thumbnail</text>
            </svg> -->

          <!-- </div>
        </div>
      </div> -->
      <!-- <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">candidate</strong>
            <h3 class="mb-0">Deversh Khandelwal</h3> -->
            <!-- <div class="mb-1 text-muted">Nov 11</div> -->
            <!-- <p class="mb-auto">Will work for you</p>
              <button type="submit" class="btn" formaction="../votingportal/index.html">vote</button> -->
            <!-- <a href="#" class="stretched-link">Continue reading</a> -->
          <!-- </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img" width="200" height="250" src="supriya.jpg" alt=""> -->
            <!-- <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img"
              aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                dy=".3em">Thumbnail</text>
            </svg> -->

          <!-- </div>
        </div>
      </div>  -->


    </div>
  </main>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
    <script>function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }</script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>