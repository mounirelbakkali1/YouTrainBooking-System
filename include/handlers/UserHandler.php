<?php

include_once("../autoloader.php");


if(isset($_POST['accept']))      accept();
if(isset($_POST['deny']))        deny();
if(isset($_POST['savechanges'])) update();

if(isset($_POST["signup"]))
{

   //collecting the data
   
   $first_name = $_POST["first_name"];
   $last_name = $_POST["last_name"];
   $email = $_POST["email"]; 
   $password = $_POST["password"]; 
   $confirm_password = $_POST["confirm_password"]; 

   // instantiate SignupContr class
    $signUpCtr=new SignupContr($first_name,$last_name,$email,$password,$confirm_password);

   // Running error handlers and user signup
    $signUpCtr->SignUpUr();
   // Going back to the front page
    header("location: ../../login.php");
}
// signup -------------------------------
// signup -------------------------------

// login---------------------------------
// login---------------------------------
if(isset($_POST["login"]))
{

   //collecting the data
   $email = $_POST["email"]; 
   $password = $_POST["password"]; 

   // instantiate LoginContr class
    $LoginCtr=new LoginContr($email,$password);

   // Running error handlers and user signup
    $LoginCtr->LoginUr();
   // Going back to the front page

}
// login---------------------------------
// login---------------------------------



// profil--------------------------------
// profil--------------------------------
function update(){
   $userpr = new UserController();
   $first_name = $_POST['first_name'];
   $last_name = $_POST['last_name'];
   $tel = $_POST['tel'];
   $bank = $_POST['bank'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $new_password = $_POST["newPassword"]; 
   $id = $_POST['id'];
   // var_dump($id);
   // die;
   $userpr->updateInfo($first_name,$last_name,$tel,$bank,$email,$id);
   header("location:../../dashboard/index.php?page=profil");
}
// profil--------------------------------
// profil--------------------------------


function accept(){
   $id = $_POST['id'];
   $role = 1;

   $user = new UserController();
   $user->updateUser($role,$id);
   echo "<script>window.location.replace('../components/uers.component.php')</script>";
}
function deny(){
   $id = $_POST['id'];
   $role = 0;

   $user = new UserController();
   $user->updateUser($role,$id);
   echo "<script>window.location.replace('../components/uers.component.php')</script>";
   
}