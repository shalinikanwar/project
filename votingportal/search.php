<!-- jaha jaha html file likhi hai vaha search me name="" method="" action=""
daal lena jesha mene niche hai code samjeee meri baat :)-->
<!--<form class="d-flex" method='get' action='search.php'>
          <input  name='search' class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button  name='submit' class="btn btn-outline-success" type="submit">Search</button>
        </form>-->
<?php
if (isset($_GET['submit']))
{
$search=$_GET['search'];

if ($search=='signup')
{
    header("location:signup.html");
}
else if($search=='home')
{
    header("location:index.html");
}
else if($search=='contact')
{
    header("location:contactus.html");   

}
else if($search=='login')
{
    header("location:login.html");   

}
else{
    echo '
             <script>
                alert("Invalid search or query not found!");
                window.location ="../votingportal/dashboard.php";
             </script>
        ';
  }
}
?>

