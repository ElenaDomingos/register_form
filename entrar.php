<?php require_once('reg.php'); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log in</title>
    
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="/js/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->

    <!-- CSS reset -->
    <link rel="stylesheet" href="style.css"> <!-- Resource style -->
    <script src="js/modernizr.js"></script> <!-- Modernizr -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="login_panel/js/pngfix/supersleight-min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Neucha&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Bad+Script&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
 <link href='https://fonts.googleapis.com/css?family=Andika&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
 <link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
     
    
    <script src="js/slide.js" type="text/javascript"></script>
    
    <?php echo $script; ?>
</head>

<body>
             
		 <div class="container" style="background:transparent"; ><div class="row"> 
	
	
	
		 
	            <?php
			
			if(!$_SESSION['id']):
			
			?>                   
              
 
                    <div class="col-lg-6 col-md-6 col-sm-12 col-md-offset-3">
				       <form class="clearfix" role="form" action="" method="post">

 					<div class="form-group"><h3 style="color:#333333">Log in</h3></div>
					<?php
						 
						if($_SESSION['msg']['login-err'])
						{
							echo '<div class="err">'.$_SESSION['msg']['login-err'].'</div>';
							unset($_SESSION['msg']['login-err']);
						}
					?>
                     
                      
					<div class="form-group"><hr class="colorgraph">
					 
					<input class="field form-control input-lg" type="text" name="username" placeholder="Name" id="username" value="" size="23" />
					</div>

					<div class="form-group">
					 
					<input class="field form-control input-lg" type="password" placeholder="Password" name="password" id="password" size="23" /></div>
					
					<div class="checkbox">
	            	<label style="color:#333333" ><input name="rememberMe"  id="rememberMe" type="checkbox" checked="checked" value="1" /> &nbsp;Remember me</label>
        			<div class="clear"></div></div>
        			
        			<div class="form-group" id="enterto">
					<input type="submit" name="submit"  value="Log in" class="bt_login btn btn-success" />
					<a href="index.php" class="btn btn-primary">Sign up</a></div>
				       </form>
</div>
			 

	             
                         

                         

 
            
           <?php
			
			else:
			 
			
			?> 
			
			
             
            <div class="row"><div class="col-lg-4 col-sm-12 col-md-6">
            <h2 style="color:#fff"; >Welcome!</h2>
            
           
            <a href="/index.php" class="btn btn-warning"  >My account</a> <a href="?logoff" class="btn btn-info" >Log off</a>
            
            
            
            </div>
             
            
            <?php
            
           
			endif;
			?>
		</div></div> 
		 
		  
	
	
	

 <script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->



 
