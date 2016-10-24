<?php

define('INCLUDE_CHECK',true);

require 'connect.php';
require 'functions.php';
// put this two files when you need the check your rights INCLUDE_CHECK


session_name('tzLogin');
// Session on

session_set_cookie_params(2*7*24*60*60);
// Cookie for 2 weeks

session_start();

if($_SESSION['id'] && !isset($_COOKIE['tzRemember']) && !$_SESSION['rememberMe'])
{

	$_SESSION = array();
	session_destroy();
	
	
}


if(isset($_GET['logoff']))
{
	$_SESSION = array();
	session_destroy();
	
	header("Location: index.php");
	exit;
}

if($_POST['submit']=='Log in')
{
	// Verify if there is login form
	
	$err = array();
	// Remember errors
	
	
	if(!$_POST['username'] || !$_POST['password'])
		$err[] = 'Somthing is missing!';
	
	if(!count($err))
	{
		$_POST['username'] = mysql_real_escape_string($_POST['username']);
		$_POST['password'] = mysql_real_escape_string($_POST['password']);
		$_POST['rememberMe'] = (int)$_POST['rememberMe'];
		
		// Get the data

		$row = mysql_fetch_assoc(mysql_query("SELECT id,usr FROM tz_members WHERE usr='{$_POST['username']}' AND pass='".md5($_POST['password'])."'"));

		if($row['usr'])
		{
			// If everything is fine, entre 
			
			$_SESSION['usr']=$row['usr'];
			$_SESSION['id'] = $row['id'];
			$_SESSION['rememberMe'] = $_POST['rememberMe'];
			
			// Save some data
			
			setcookie('tzRemember',$_POST['rememberMe']);
		}
		else $err[]='Wrong Name or Password';
	}
	
	if($err)
	$_SESSION['msg']['login-err'] = implode('<br />',$err);
	// Save error message

	header("Location: entrar.php");
	exit;
}

 


else if($_POST['submit']=='Sign up')
{
	// Verify that was sing up form
	
	$err = array();
	
	if(strlen($_POST['username'])<4 || strlen($_POST['username'])>32)
	{
		$err[]='The Name needs consist 3 to 32 caracters !';
	}
	
	if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['username']))
	{
		$err[]='Try to choose some other name!';
	}
	
	if(!checkEmail($_POST['email']))
	{
		$err[]='Email is wrong!';
	}
	
	if(!count($err))
	{
		// No erro? So...
		
		$pass = substr(md5($_SERVER['REMOTE_ADDR'].microtime().rand(1,100000)),0,6);
		// Generate the password
		
		$_POST['email'] = mysql_real_escape_string($_POST['email']);
		$_POST['username'] = mysql_real_escape_string($_POST['username']);
		
		
		
		mysql_query("	INSERT INTO tz_members(usr,pass,email,regIP,dt)
						VALUES(
						
							'".$_POST['username']."',
							'".md5($pass)."',
							'".$_POST['email']."',
							'".$_SERVER['REMOTE_ADDR']."',
							NOW()
							
						)");
		
		if(mysql_affected_rows($link)==1)
		{
			send_mail(	'noreply@bugfinder.busuu.com',
						$_POST['email'],
						'Bugfinder.busuu.com',
						'<div style="width:90%; color:#0e083b; padding:5%;font-size:20px;">Dear '.$_POST['username'].'!<BR>Welcome to my sited<BR> In this message we have sent your password.<BR>
						<BR>
                                                 <BR>Your password is: '.$pass .'  <br/><a href="" class="btn btn-success" style="padding:10px; text-decoration:none;width:100px; border-radius:4px; margin-top:25px;" >Log in</a></div>
                                                ');

			$_SESSION['msg']['reg-success']='We have sent the password to your email!';
		}
		else $err[]='This name is already registred!'; 
	}

	if(count($err))
	{
		$_SESSION['msg']['reg-err'] = implode('<br />',$err);
	}	
	
	header("Location: index.php");
	exit;
}








?>