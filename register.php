<?php include('server.php');
?>


<!DOCTYPE html>

<html>
<head>
	<title>user registration system using php and mysql</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	 <div class="header">
	 	<h2>Register</h2>

	 </div>>

      <form method="post" action="register.php">
        
        <?php   include('errors.php'); ?>


         
         <div class="input-group">
  	        <label>Username</label>
  	         <input type="text" name="username" value="<?php echo $username; ?>"> 
  	     </div>

           

         <div class="input-group">
  	     <label>Email</label>
  	     <input type="text" name="Email" value="<?php echo $Email; ?>">
  	     </div> 


  	     <div class="input-group">
  	     <label>City</label>
  	     <input type="text" name="City" value="<?php echo $City; ?>">
  	     </div> 


         <div class="input-group">
  	     <label>University</label>
  	     <input type="text" name="University" value="<?php echo $University; ?>">
  	     </div> 

         <div class="input-group">
  	     <label>Department</label>
  	     <input type="text" name="Department" value="<?php echo $Department; ?>">
  	     </div> 




         
         <div class="input-group">
  	     <label>Phone</label>
  	     <input type="text" name="Phone"value="<?php echo $Phone; ?>">
  	     </div> 
 
         <div class="input-group">
  	     <label>Gender</label>
  	     <input type="text" name="Gender"value="<?php echo $Gender; ?>">
  	     </div> 
 
         
         <div class="input-group">
  	     <label>Password</label>
  	     <input type="password" name="password_1">
  	     </div> 
 
         
          <div class="input-group">
  	     <label>Confirm Password</label>
  	     <input type="password" name="password_2">
  	     </div> 
         




























            
         <div class="input-group">
  	      <button type="submit" name="register" class="btn">register</button>
  	     </div> 



        <p>

          Already a member? <a href="login.php">Sign In </a>

        </p>

      



      </form>>






</body>
</html>