<?php

   include("connect.php");

   
 if(isset($_POST['fn'])){
     $Firstname = $_POST['fn'];
     $Lastname = $_POST['ln'];
     $Email = $_POST['Email'];
     $Enrollmentnumber = $_POST['enrollment'];
     $Gender = $_POST['Gender'];
     $image =$_FILES['photo']['name'];
     $tmpname =$_FILES['photo']['tmp_name'];
     
     

          move_uploaded_file($tmpname, "../votingportal/uploads_candidate3/$image");
          $insert = mysqli_query($connect, "INSERT INTO signupn2 (Firstname,Lastname,Email,Enrollmentnumber,Gender,
          vote3,status3,photo,Candidate)VALUES 
          ('$Firstname','$Lastname','$Email','$Enrollmentnumber','$Gender',0,0,'$image',1)");

 


          if($insert){
                echo '
               <script>
                   alert("Registration succesfull!");
                   window.location = "../votingportal/login3.php";
               </script>

          ';
          }
          else{
                echo '
              <script>
                  alert("Some error occured!");
                  window.location = "../votingportal/nomination3.html";
               </script>

         ';
         }
     
 }

?>

    
     