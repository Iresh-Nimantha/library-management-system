<?php 
     session_start();
   ?> 
<!DOCTYPE html>
<html>
<head>
    <title>Library Staff Login</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="/library-management-system-master/login_and_regiser/login.css">
    <link rel="stylesheet" type="text/css" href="/library-management-system-master/home page /user/styles.css">


</head>
 <!-- Navigation Bar -->
 <nav style="width:100%">
      <div class="logo">
        <img src="../home page/user/img/book.jpg" alt="Logo" />
        <h1>Library Management System</h1>
      </div>
      <ul>
        <li ><a href="/library-management-system-master/home page/user/home.php" style=" text-decoration: none">Home</a></li>
        <li><a href="#services" style=" text-decoration: none">Services</a></li>
        <li><a href="#contact" style=" text-decoration: none">Contact</a></li>
        <?php
        if (isset($_SESSION["name_user"])) {
         
        echo '<li style="float:left"> <a href="/library-management-system-master/login_and_regiser/include/logout.include.php"style=" text-decoration: none">logout <a> </li>';
         echo '<li style="float:right"><a href="#"style=" text-decoration: none">'. $_SESSION["name_user"] .'</a> </li>';                               
       } else {
                 echo  '<li style="float:right"><a href="/library-management-system-master/login_and_regiser/login.php" style=" text-decoration: none"> login </a> </li>';
               }
                        
          ?>
      </ul>
    </nav>
<body id="login-body">
   
    
<div class="container" id="login-container">
