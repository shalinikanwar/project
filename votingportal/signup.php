<?php

     include("connect.php");

     $Firstname = $_POST['fn'];
     $Lastname = $_POST['ln'];
     $Enrollmentnumber = $_POST['enrollment'];
     $Gender = $_POST['Gender'];
     $Course = $_POST['Course'];
     $section = $_POST['section'];
     // $role = $_POST['role'];
     $image =$_FILES['photo']['name'];
     $tmpname =$_FILES['photo']['tmp_name'];
     $Password = $_POST['password'];
     $confirmPassword = $_POST['confirmp']; 
     $Phonenumber = $_POST['phone'];
     $Email = $_POST['email'];
     
   

     if($Password==$confirmPassword){
          move_uploaded_file($tmpname, "../votingportal/uploads/$image");
          $insert = mysqli_query($connect, "INSERT INTO signup (FirstName,LastName,EnrollmentNumber,Gender,
          Course,section,role,image,Password,confirmPassword,Phonenumber,Email, status, votes)VALUES 
          ('$Firstname','$Lastname','$Enrollmentnumber','$Gender','$Course','$section',1,'$image',
          '$Password','$confirmPassword','$Phonenumber','$Email',0,0)");

      

     
          if($insert){
               echo '
               <script>
                   alert("Registration succesfull!");
                   window.location = "../votingportal/login.html";
               </script>

          ';
          }
          else{
               echo '
               <script>
                  alert("Some error occured!");
                  window.location = "../votingportal/signup.html";
               </script>

          ';
          }

          
     }
     else{
          echo '
          <script>
              alert("Password and confirm password does not match!");
              window.location = "../votingportal/signup.html";
          </script>

          ';
     }




?>