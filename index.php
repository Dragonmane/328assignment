<?php

session_start();

require_once('vendor/autoload.php');

$f3 = Base::instance();

$f3->route('GET /', function()
        {
                $view = new View;
                echo $view->render ('pages/home.html');
        });
       
   
$f3->route('GET /info', function()
        {
                $view = new View;
                echo $view->render ('pages/info.html');
        });

$f3->route('POST /profile', function()
        {
                $_SESSION['fName']=$_POST['fName'];
                $_SESSION['lName']=$_POST['lName'];
                $_SESSION['age']=$_POST['age'];
                $_SESSION['gender']=$_POST['gender'];
                $_SESSION['phone']=$_POST['phone'];
            
                $view = new View;
                echo $view->render ('pages/profile.html');
        });
        
$f3->route('POST /interest', function($f3)
        {
                $_SESSION['email']=$_POST['email'];
                $_SESSION['state']=$_POST['state'];
                $_SESSION['seeking']=$_POST['seeking'];
                $_SESSION['biography']=$_POST['biography'];
                 
                $view = new View;
                echo $view->render ('pages/interest.html'); 
        });
        
$f3->route('POST /summary', function($f3)
        {
                $_SESSION['indoor'] = $_POST['indoor'];
                $_SESSION['outdoor'] = $_POST['outdoor'];
                 
                $f3->set('name', $_SESSION['fName'] . " " . $_SESSION['lName']);
                $f3->set('age', $_SESSION['age']);
                $f3->set('gender', $_SESSION['gender']);
                $f3->set('phone', $_SESSION['phone']);
                $f3->set('email', $_SESSION['email']);
                $f3->set('state', $_SESSION['state']);
                $f3->set('seeking', $_SESSION['seeking']);
                $f3->set('biography', $_SESSION['biography']);
                $f3->set('indoor', $_SESSION['indoor']);
                $f3->set('outdoor', $_SESSION['outdoor']);
                 
                 
                $view = new View;
                echo $view->render ('pages/summary.html');
        });

$f3->run();