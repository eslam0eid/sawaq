<?php
session_start();
include 'connection.php';

// if(! isset($_SESSION['email']))
// {
//     header("location:index.php");
// }


$id =$_SESSION['id'];
$query = "SELECT * from drivers where id =$id";
$run_query= mysqli_query($con , $query);
  $result = mysqli_fetch_array($run_query);

// if(isset($_GET['id']))
// {
//     $id=$_GET['id'];

//     $query = "SELECT * from drivers where id =$id";
//     $run_query= mysqli_query($conn , $query);
//     $result = mysqli_fetch_assoc($run_query);
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swaqa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    

<!-- profile nav strat -->

  <div class="profileBrg-wrap">
    <span class="burgerBtn profileBurger" onclick="openNav()">&#9776;</span>
  </div>
  <nav id="mySidenav" class="sidenav profileSidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    
      <div class="user-info">
        <div class="userProfileImg mb-3">
          <img src="<?= $result['img'] ?>" alt="user Profile Image" class="img-fluid">
        </div>
        <span class="userInfo-item"><?=  $result['name']  ?></span>
        <span class="userInfo-item"><?=  $result['email'] ?></span>
        <span class="userInfo-item"><?=  $result['phone'] ?></span>
      </div>
      <div class="updateUserInfo">
        <div class="container">
        <a href="javascript:void(0)" class="editInfoBtn" data-bs-toggle="modal" data-bs-target="#editInfoModal"><i class="far fa-edit"></i> Edit Information</a>
        <a href="javascript:void(0)" class="changePassBtn" data-bs-toggle="modal" data-bs-target="#changePassModal"><i class="fas fa-lock"></i>Change Password</a>
        <a href="javascript:void(0)" class="notificationBtn"><i class="far fa-bell"></i> Notification</a>
        <a href="javascript:void(0)" class="helpBtn"><i class="far fa-question-circle"></i> Help</a>
        <form >
         
          <!-- <button type="submit" class="btn signOutBtn" > <i class="fas fa-sign-out-alt"></i>  Sign Out</button> -->
        <button style="border: none ; background: none;"><a class="btn signOutBtn " href="index.php"> <i class="fas fa-sign-out-alt"></i> logout</a></button>  
        </form>
        </div>
      </div>
    
  </nav>
<!-- profile Nav end  -->

<!-- map start -->  


<section id="mapWrapper">
  <div class="mapNotEnabled">
    <div class="form-check form-switch enableMap">
      <input class="form-check-input" type="checkbox" id="enableGps">
    </div>
  </div>
  <div id="map"></div>
</section>
<!-- map ending -->

<!-- the chosen user info start -->
<section class="userFromMap py-3">
<div class="row">
  <div class="col-sm-5 col-md-4 col-xl-3">
    <div class="userFromMapImg text-center">
      <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png" alt="user Profile Image" class="img-fluid" style="max-height: 150px;max-height: 150px;">
    </div>
  </div>
  <div class="col-sm-7 col-md-8 col-xl-9">
    <div class="userFromMap-Info">
      <span class="font-weight-bold"><?= $result['name'] ?></span>
    </div>
  </div>
</div>
</section>
<!-- the chosen user info end -->


<!-- footer start -->
<footer id="footer" class="mt-4">
  <div class="container py-5">
    <div class="row align-items-center">
      <div class="col-6 col-md-3 links-side">
        <a href="index.php">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
      </div>
      <div class="col-6 col-md-3">
        <a href="#"><img src="img/google-play-button.png" class="img-fluid google-play-button" alt="google play button"></a>
      </div>
    </div>
  </div>

</footer>
<!-- footer end -->

<!-- start of loading page -->
<section id="loading-page">
  <div class="sk-chase">
    <div class="sk-chase-dot"></div>
    <div class="sk-chase-dot"></div>
    <div class="sk-chase-dot"></div>
    <div class="sk-chase-dot"></div>
    <div class="sk-chase-dot"></div>
    <div class="sk-chase-dot"></div>
  </div>
  <img src="img/sawaqaLight-logo.png" class="img-fluid" alt="sawaqa logo">
</section>
<!-- end of loading page -->
<!-- edit information start -->
<div class="modal fade" id="editInfoModal" tabindex="-1" aria-labelledby="editInfoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="editInfoModalLabel">Edit Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="my-3" action="" method="POST" enctype="multipart/form-data">
          <div class="img-view mb-2 text-center">
            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png" alt="new user Img" class="img-fluid" style="border-radius: 50%;width: 100px;height: 100px;">
          </div>
            <div class="mb-3">
              <label class="mb-2">Image</label>
              <input type="file" name="img" class="form-control">
            </div>
           
              <div class="row">
                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" id="ULogUp1stName" value="<?php echo $result['name']?>" placeholder="First Name" aria-label="First name">
                    <label for="ULogUp1stName">First Name</label>
                  </div>
                </div>
              </div>
              
              <div class="form-floating">
                <input type="tel" name="phone" class="form-control" value="<?php echo $result['phone']?>" id="ULogUpPhone" placeholder="Phone">
                <label for="ULogUpPhone">Phone</label>
              </div>
              <div class="text-center mt-3">
              <button type="submit" class="btn" name="update" >save</a></button>
              <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
              </div>
        </form>
      <?php
if(isset($_POST['update']))
{

$name = htmlspecialchars(trim($_POST['name']));
$phone = htmlspecialchars(trim($_POST['phone']));
// $img = htmlspecialchars(trim($_POST['img']));
$img=$_FILES['img'];
// $id=$_POST['id'];

$query = "UPDATE drivers SET name='$name' , phone='$phone'    where id=$id ";
$run_query = mysqli_query($con , $query);

header('location: profile.php');
  }  ?>


        <?php
 if(isset($_SESSION['errors']))
{
    print_r($_SESSION['errors']);
}
unset($_SESSION['errors']);
?>
      </div>
    </div>
  </div>
</div>
<!-- edit information start -->
<!-- change Password Modal start -->
<div class="modal fade" id="changePassModal" tabindex="-1" aria-labelledby="changePassModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="changePassModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="my-3" action="" method="POST" enctype="" >
          <div class="form-floating mb-2">
            <input type="password" name="oldPassword" class="form-control" id="UOldPass" placeholder="Old Password">
            <label for="UOldPass" >Old Password</label>
          </div>
          <div class="form-floating mb-2">
            <input type="password" name="NewPassword" class="form-control" id="UNewPass" placeholder="New Password">
            <label for="UNewPass">New Password</label>
          </div>
          <div class="form-floating mb-2">
            <input type="password" name="confPass" class="form-control" id="UConfirmPass" placeholder="Confirm New Password">
            <label for="UConfirmPass">Confirm New Password</label>
          </div>
          <div class="text-center mt-3">
            <button type="submit" class="btn" name="save">Save</button>
            <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
        <?php
        
        if(isset($_POST['save']))
{
$oldPassword = $_POST['oldPassword'];
$NewPassword = $_POST['NewPassword'];
$confPass = $_POST['confPass'];

// $errors=[];
// if(empty($oldPassword))
// {
// $errors[]= "$oldPassword is required";
// }
// $query = "SELECT password FROM drivers WHERE id='$id";
//     $res = mysqli_query($con, $query);
//     if(mysqli_num_rows($res) > 0)
//     {
//       $row = mysqli_fetch_assoc($res);
//       $errors[]="password is wrong";
//     }
// if($confpass != $NewPassword)
// {
// $errors[]= "password must authenticate";
// }


$query = "UPDATE drivers SET password='$NewPassword'  where id=$id ";
$run_query = mysqli_query($con , $query);
// $row = mysqli_fetch_assoc($run_query);
header('location: profile.php');
  }  ?>
            <?php
 if(isset($_SESSION['errors']))
{
    print_r($_SESSION['errors']);
}
unset($_SESSION['errors']);
?>
        
        
      </div>
    </div>
  </div>
</div>
<!-- change Password Modal end-->
<!-- Notification alert start-->

<div class="alert notification-alert alert-dismissible" role="alert">
  <h4 class="text-left">SAWAQA</h4>
   نحيط علم سيادتكم بالتزام ارشادات وزارة الصحة الاحترازية للوقاية من فيروس كورونا المستجد 
  <br>
  <strong>حفظ الله مصر</strong>
  
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<!-- Notification alert end -->
<!-- help alert start -->
<div class="alert help-alert alert-dismissible" role="alert">
  <h4 class="text-left">SAWAQA</h4>
  <h6>How to Use SAWAQA?</h6>
  <p>Enable Your GPS And let the app know your Location and choose what you want from users.</p>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<!-- help alert end -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script async  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZVWj4lzk383Lp2aMgyJZuLIohGizlbPY&callback=initMap"></script>
    <script src="js/app.js"></script>
</body>

</html>