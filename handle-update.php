<?php
session_start();
include 'connection.php';


if(isset($_POST['update']))
{

$name = htmlspecialchars(trim($_POST['name']));
$phone = htmlspecialchars(trim($_POST['phone']));
// $img = htmlspecialchars(trim($_POST['img']));
$img=$_FILES['img'];
$id=$_POST['id'];

$fileName=$img['name'];
$fileTmpName=$img['tmp_name'];
$fileError=$img['error'];


$ext = pathinfo($TmpName , PATHINFO_EXTENSION);

$fileNewName=uniqid().".$ext";

$errors=[];
move_uploaded_file($fileTmpName , "img/$fileNewName");
$query="SELECT img FROM drivers WHERE id=$id";
$query_run=mysqli_query($conn , $query);
$img= mysqli_fetch_assoc($query_run);
// print_r($img);
$oldNameImg=$img['img'];


//validation
// if(empty($name))
// {
//     $errors[]="name is required";
// }elseif(strlen($name) < 5 || strlen($name) > 255)
// {
// $errors[]=" name length between 5 to 255";
// }elseif(! is_string($name) || is_numeric($name))
// {
//     $errors[]= "name must string";
// }

// if(empty($phone))
// {
//     $errors[]="phone is required";
// }elseif(strlen($phone) < 11 || strlen($phone) > 20)
// {
// $errors[]=" phone length between 11 to 20";
// }



if(empty($errors))
{
$query = "UPDATE drivers SET NAME='$name' , phone='$phone' ,  img='$fileNewName'   where id=$id ";
 $run_query = mysqli_query($conn , $query);
 header("location: profile.php");
}else{
//     $query = "UPDATE drivers SET NAME='$name' , phone='$phone'   where id=$id ";
// $run_query = mysqli_query($conn , $query);
// // move_uploaded_file($fileTmpName , "imag/$fileNewName");
header("location: index.php");
}
// }else{
//     $_SESSION['errors']=$errors;
//     header("location:index.php");
// }


}


