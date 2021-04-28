<?php

if(isset($_POST["submit1"]))
{
    header('location:studentSignUp.php');
}



?>



<!DOCTYPE html>









<html>
<head>
    <title>loginSignup</title>






</head>


<body>


<h1>EdUlance</h1>




<form name="form1" action=""method="post">
    <input type="submit" name="submit1" value=" Student ">


</form>





<form name="form2" action=""method="post">
    <input type="submit" name="submit2" value="Instructor">


</form>



<form name="form3" action=""method="post">
    <input type="submit" name="submit3" value="Database">


</form>







</body>

</html>
