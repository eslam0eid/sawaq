<?php 

session_start();
include 'connection.php';
$id = $_SESSION['id'];
if (isset($_POST['isSignUp'])) {

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$img = $_FILES['img'];

// $img=$_FILES['img'];
// $id=$_POST['id'];

$fileName=$img['name'];
$fileTmpName=$img['tmp_name'];
$fileError=$img['error'];


$ext = pathinfo($fileTmpName , PATHINFO_EXTENSION);

$fileNewName=uniqid().".$ext";

$errors=[];
move_uploaded_file($fileTmpName , "img/$fileNewName");
$query="SELECT img FROM drivers WHERE id=$id";
$query_run=mysqli_query($con , $query);
$img= mysqli_fetch_assoc($query_run);
// print_r($img);
$oldNameImg=$img['img'];


// $errors=[];

// validation of name
if(empty($name))
{
$errors[]= "name is required";
}elseif(! is_string($name))
{
    $errors[]="you should enter string name";
}elseif( strlen($name) < 5 or strlen($name) > 255 )
{
$errors[]="name min is 5 and max is 255";
}

$query2 = "SELECT email  FROM  drivers WHERE email='$email' ";
$done2 = mysqli_query($con, $query2);

// validation of username
if(empty($email))
{
$errors[]= "username is required";
}elseif((mysqli_num_rows($done2) > 0))
{
    $row = mysqli_fetch_assoc($done2);
    $errors[]="username not available";
}


   

    //validate password
    if(empty($password))
    {
        $errors[]= 'password is required';
    }



//validation of phone
if(empty($phone))
{
    $errors[]="phone  is required";
}elseif(! is_numeric($phone))
{
    $errors[]="you should enter phone ";
}

if(empty($errors))
{
   
    
 
      $q = "INSERT INTO drivers (name,email,password,phone , img)
       VALUES ('$name','$email','$password', '$phone' , '$fileNewName')";
      $newRes = mysqli_query($con, $q);
      $_SESSION['success'] = 'user added successful';
      header("location: index.php");
    

}else{
    $_SESSION['errors']=$errors;
    header("location: profile.php");
}



}


?>


