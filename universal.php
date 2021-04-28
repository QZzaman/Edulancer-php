<?php include('server.php'); ?>

<!DOCTYPE html>


<html>
<head>
    <title>Universal</title>


</head>


<body>


<h1>USER Profile</h1>




<div id="rating">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <p>Rate the Instructor or learner.<br />(Poor)&nbsp;
            1<input name="rating" type="radio" value="1" />
            2<input name="rating" type="radio" value="2" />
            3<input name="rating" type="radio" value="3" />
            4<input name="rating" type="radio" value="4" />
            5<input name="rating" type="radio" value="5" />
            &nbsp;(Good)&nbsp;
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <input type="submit" value="rate this" name="vote" /></p>



    </form>

















</body>

</html>
<?php


$userXX= $_SESSION["username"];

//echo "working",$userXX;

$userName = "";

if(isset($_GET["username"]))
    $userName = $_GET["username"];

if(isset($_POST["vote"])) {

    if(isset($_POST["rating"])) {


      //  echo"Rating:  ";   echo $_POST["rating"];
        $savedRating=5;

        $querySelect="select * from subjectof where user_name_L= '$userName'";



        $resulty=mysqli_query($db, $querySelect);
        //echo"working ";

//        var_dump($resulty);

        ///post er kaj korsi

        while ($row=mysqli_fetch_array($resulty)) {
            # code...

//            var_dump($row);
            $savedRating= $row["rating"];

        }




        $givenRating=$_POST['rating'];
        $finalRating=($savedRating+$givenRating)/2;
    //    $savedRating=$finalRating;

                                                           // desgnation e ami  kisu insert korlam
        $row_count = mysqli_num_rows($resulty);
//
//      if($row_count ==0) {


          $queryUpdate = "update subjectof set  rating='$finalRating' where user_name_L= '$userName'";

          mysqli_query($db, $queryUpdate);


          echo "savedRating", $savedRating;
          echo "<br>";
          echo "givenRating  ", $givenRating;
          echo "<br>";
          echo "finalRating  ", $finalRating;
//      }
// urgent jinis


    }


    echo "<br>";
    echo "<br>";




}

?>







<?php

//
//$querySelect="select * from subjectof where user_name_L= '$userXX'";
//$resulty=mysqli_query($db, $querySelect);
//$useRating=5;
//while ($row=mysqli_fetch_array($resulty)) {
//    $useRating= $row["rating"];
//}


                $userV = $_SESSION["username"];

                echo "LOGED IN: ",$userV;
                echo "<br>";

                if (isset($_GET["username"])) $userV = $_GET["username"];

             //   echo "<br>" . $userV . "<br>";

                $query = "SELECT user_name_L, city,university,department,email,phone_number, gender from learner where user_name_L = '$userV' ";

                $result = mysqli_query($db, $query);

                $resultcheck = mysqli_num_rows($result);


if ($resultcheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        echo "Name: ";
        echo $row['user_name_L'] . "<br>";

        echo "City: ";
        echo $row['city'] . "<br>";
        echo "University: ";
        echo $row['university'] . "<br>";
        echo "Department: ";
        echo $row['department'] . "<br>";
        echo "Email: ";
        echo $row['email'] . "<br>";
        echo "Cell No: ";
        echo $row['phone_number'] . "<br>";
        echo "Sex: ";
        echo $row['gender'] . "<br>";
//        echo "rating: ";
//        echo $useRating . "<br>";



    }

}


?>
<?php


$userVV = $_SESSION["username"];


//echo "user vv: ",$userVV;
echo "<br>";

if (isset($_GET["username"])) $userVV = $_GET["username"];

//echo "<br>" . $userV . "<br>";

            $query = "SELECT * from subjectof where user_name_L = '$userVV' ";

            $result = mysqli_query($db, $query);

            $resultcheck = mysqli_num_rows($result);


if ($resultcheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {



        echo "Title: ";
        echo $row['Title'] . "<br>";
        echo "Subject: ";
        echo $row['NameOfSubject'] . "<br>";
        echo "rating of : ";
        echo $row['rating'] . "<br>";




    }

}















?>




