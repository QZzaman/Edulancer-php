<?php include('server.php'); ?>




<!DOCTYPE html>




<html>
<head>                                             <title>TIMELINE</title>

    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>




</head>


<body>

<h1>TIMELINE</h1>
<form name="form10" action=""method="post">



    <tr>
        <td>SEARCH BY SUBJECT</td>
        <td><input type="text" name="t5"></td>


    </tr>

    <input type="submit" name="submit10" value="SEARCH">

                                                        <tr>
                                                            <td><input type="text" name="t99"></td>
                                                        </tr>

                                                        <input type="submit" name="submit99" value="Post">
                                                        <input type="submit" name="submit99" value="VIEW ALL Post">


<!--        <td><input type="text" name="t50"></td>-->
<!---->
<!--                                                        <input type="submit" name="submit50" value="comment">-->



</form>












</body>

</html>



<?php



//
//header('Cache-Control: no cache'); //no cache
//session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too
//session_start();
 // search submit10

if(isset($_POST["submit10"]))
{


    $sqlS = "SELECT * FROM subjectof WHERE NameOfSubject='$_POST[t5]'";


    $resultS=mysqli_query($db, $sqlS);
    //echo"working ";

// searching er jonno

    while ($row=mysqli_fetch_array($resultS)) {
        # code...

        $usrname = $row["user_name_L"];
        $titlex = $row["Title"];
        $subname = $row["NameOfSubject"];
        $something='';

        $querySelect="select * from subjectof where user_name_L= '$usrname'";
        $resultyy=mysqli_query($db, $querySelect);
        $useRating=5;
        while ($row=mysqli_fetch_array($resultyy)) {
            $useRating= $row["rating"];
        }

//        echo "<tr><td>" . "User: ". $row["user_name_L"] . "</td><td>";
//        echo "<tr><td>" . "Post: ". $row["post"] . "</td><td>";

        echo "<a href='http://localhost/tutorlance/universal.php?username=$usrname'> <h2>" . $usrname . "</h2>  </a>";   echo "", "  ", $titlex,"  ", $subname,"  ", $something;
        echo "</td>";
        echo " ||RATING||: ", $useRating;
        echo "<br>";

        // echo "<a href='http://d137321a.ngrok.io/tutorlance/universal.php?username=$usrnamey'> <h2>" . $usrnamey . "</h2>  </a>";

    //  echo " <input type='submit' name='submit999' value='comment'>";


        //show er kaj korsi ammi




    }










//    while ($row=mysqli_fetch_array($resultS)) {
//        # code...
//
//        $usrname = $row["user_name_L"];
//        $titlex = $row["Title"];
//        $subname = $row["NameOfSubject"];
//        $something='';
//
////        echo "<tr><td>" . "User: ". $row["user_name_L"] . "</td><td>";
////        echo "<tr><td>" . "Designation: ". $row["Title"] . "</td><td>";
////        echo "<tr><td>" . "Subject: ". $row["NameOfSubject"] . "</td><td>";
//
////        echo "<a href='http://localhost/tutorlance/universal.php'>$usrname</a>", "  ", $titlex, " ", $subname;
////        echo "<br>";
//       // echo "<input type='submit' value='$usrname'>";
//
//        echo "<input type='submit' value='$usrname'>", "  ", $titlex,"  ", $subname,"  ", $something;
//        echo "<br>";
//        echo "<br>";
//        echo "</td>";
//
//
//
//
//
//
//    }
//







}

//                    if (isset($_POST["submit99"])) {
//
//
//                        $user = $_SESSION["username"];
//
//                        $queryPost = "INSERT INTO postof  VALUES('$_POST[t99]',$user')";
//                        mysqli_query($db, $queryPost);
//
//
//
//
//
//
//                    }





//if(isset($_POST["submit99"])){
//
//
//
//    $queryX= "INSERT INTO postof  VALUES('$_POST[t99]')";
//
//    $resultZ=mysqli_query($db, $queryX);
//
//    //echo"working ";
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//}


$userX= $_SESSION["username"];





if (isset($_POST["submit99"])) {

    if(!empty($_POST["t99"]) && $_POST["t99"] !=NULL ) {
        $time = date('y-m-d H:i:s');
        $queryInsert = "INSERT INTO postof  VALUES('$_POST[t99]','$userX', '$time','id')";  // kisu post korlam
        mysqli_query($db, $queryInsert);
//        $timer= $row["now()"];

//        echo $time;


    }

}


if (isset($_POST["submit50"])) {

    if(!empty($_POST["t50"]) && $_POST["t50"] !=NULL ) {
     //   $time = date('y-m-d H:i:s');
        $queryInsertA = "INSERT INTO cmof  VALUES('$_POST[t50]','$userX')";  // kisu post korlam
        mysqli_query($db, $queryInsertA);
//        $timer= $row["now()"];

//        echo $time;


    }

}























if(isset($_POST["submit99"]) or isset($_POST["submit50"]))
{


    $sqly = "SELECT * FROM postof ORDER BY posttime DESC ";


    $resulty=mysqli_query($db, $sqly);
    //echo"working ";


    $sqly007 = "SELECT * FROM cmof  ";


    $resulty007 = mysqli_query($db, $sqly007);
    //echo"working ";


    ///post er kaj korsi























    ///post er kaj korsi

    while ($row=mysqli_fetch_array($resulty)) {
        # code...




        $usrnamey = $row["user_name_L"];
        $postx = $row["post"];
        $posttimeX = $row["posttime"];


        $querySelect = "select * from subjectof where user_name_L= '$usrnamey'";
        $resultyy = mysqli_query($db, $querySelect);
        $useRating = 5;
        while ($row = mysqli_fetch_array($resultyy)) {
            $useRating = $row["rating"];
        }

//        echo "<tr><td>" . "User: ". $row["user_name_L"] . "</td><td>";
//        echo "<tr><td>" . "Post: ". $row["post"] . "</td><td>";

   //     echo "<a href='http//tutorlance/universal.php?username=$usrnamey'> <h2>" . $usrnamey . "</h2></a>";


        echo "<a href='http://localhost/tutorlance/universal.php?username=$usrnamey'> <h2>" . $usrnamey . "</h2>  </a>";
        // echo "<a href='http://d137321a.ngrok.io/tutorlance/universal.php?username=$usrnamey'> <h2>" . $usrnamey . "</h2>  </a>";


        echo "<html>";
        echo "<head></head>";
        echo "<body class=\"page_bg\">";
        echo "Hello, today is ";
        echo date('l, F jS, Y'); //other php code here echo "</body>";
        echo "</html>";
        echo "<br>";

//        echo " <input type='submit' name='submit999' value='VIEW PROFILE'>";
        echo " RATING: ", $useRating;



        echo "<br>";
        echo "", " POST: ", $postx;
        echo "<br>";

        echo " TIME: ", $posttimeX;
        echo "<br>";
        echo "<br>";
        echo "</td>";






//






//
//



        echo "<html>";
        echo "<head></head>";
        echo "<body class=\"page_bg\">";

         echo "<form name='form11' action='' method='post'>
             
             

        
        </form>";
              "</body>";
        echo "</html>";

        while ($row = mysqli_fetch_array($resulty007)) {
//            $x = $row["cmt"];
            $y = $row["user_name_L"];
  //          echo "",$y;   echo ":Comment  ",$x;
    //        echo "<br>";
        }




//show er kaj korsi ammi
      //  echo "kaj hoi  ", $userX;




    }










//    if(isset($_POST["submit50"])) {
//
//
//        $sqly007 = "SELECT * FROM cmof  ";
//
//
//        $resulty007 = mysqli_query($db, $sqly007);
//        //echo"working ";
//
//
//        ///post er kaj korsi
//
//        while ($row = mysqli_fetch_array($resulty007)) {
//            # code...
//
//
//            $x = $row["cmt"];
//            $y = $row["user_name_L"];
//
//
//
//
//
//            echo "",$y;   echo ":Comment  ",$x;
//
//
//            echo "<br>";
//
//
//
//
//
//
//
//
//
//        }
//
//
//    }








}




















?>


<?php



if(isset($_POST["submit99"]))
{


    $sqlS = "SELECT * FROM post";












}











?>