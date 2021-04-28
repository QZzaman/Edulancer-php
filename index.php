<?php include('server.php');


  if(empty($_SESSION['username'])){

           header('location:login.php');

  }


?>





















<?php

if(isset($_POST["submit10"]))
{
    header('location:timeline.php');
}




?>
<!DOCTYPE html>

<html>
<head>
    <title>tutor finder</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>




<div class="header">
    <h2>Profile</h2>
</div>
     <form name="form2" action=""method="post">
    <input type="submit" name="submit10" value=" timeline ">


</form>





<!--
    <div class="col-md-4 col-md-4-sm-4 col-xs-4 user-image text-center">
                            <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" class="rounded-circle">
                        </div>   -->
<!-- photo doar jono -->


<div class="content">
    <?php if (isset($_SESSION['success'])): ?>

        <div class="error success">
            <h3>
                <?php

                echo $_SESSION['success'];
                unset($_SESSION['success']);

                ?>

            </h3>

        </div>


    <?php endif ?>

    <p>Name: <strong><?php echo $_SESSION['username']; ?></strong></p>


    <!-- user name ja liksi seitar kaj korsi ami -->


    <?php


    if (isset($_SESSION["username"])):


        $user = $_SESSION["username"];


        $query = "SELECT city,university,department,email,phone_number, gender from learner where user_name_L = '$user' ";

        $result = mysqli_query($db, $query);

        $resultcheck = mysqli_num_rows($result);


        if ($resultcheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
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


            }



            if (isset($_POST["submit1"])) {
                $query = "select * from subjectof  where user_name_L = '$user'";
                $result = mysqli_query($db, $query);                                                    // desgnation e ami  kisu insert korlam
                $row_cnt = mysqli_num_rows($result);

                if($row_cnt == NULL || $row_cnt ==0)                              // akbar jeno e sudhu submit hoi ei jonno
                {
                    $queryInsert = "INSERT INTO subjectof  VALUES('$_POST[t1]','$_POST[t2]', '$user','5')";         // 5 disi ager theke jeno rating 5 table e thake
                    mysqli_query($db, $queryInsert);
                }


            }

            if (isset($_POST["submit2"])) {
                $queryDelete = "delete from subjectof where user_name_L = '$user' ";                        // delete er kaj korsi designation er kaj eita
                mysqli_query($db, $queryDelete);
            }

            if (isset($_POST["submit2"])) {
                $queryDelete = "delete from subjectof where NameOfSubject='$_POST[t2]'";
                mysqli_query($db, $queryDelete);
            }

            if (isset($_POST["submit3"])) {
                $queryUpdate = "update subjectof set Title='$_POST[t3]' where Title='$_POST[t1]'";
                mysqli_query($db, $queryUpdate);
            }

            if (isset($_POST["submit3"])) {
                $queryUpdate = "update subjectof set   NameOfSubject='$_POST[t4]' where  NameOfSubject='$_POST[t2]'";
                mysqli_query($db, $queryUpdate);
            }

            $sqlR = "SELECT Title,NameOfSubject FROM subjectof where user_name_L='$user'";
            $resultR = mysqli_query($db, $sqlR);
            //echo"working ";

            echo "<table>";
            while ($row = mysqli_fetch_array($resultR)) {
                # code...
                echo "<td>";
                /// echo $row["Title"];
                echo "<tr><td>" . "Designation: ". $row["Title"] . "</td><td>";
                echo "<tr><td>" . "Subject: ". $row["NameOfSubject"] . "</td><td>";
                echo "</td>";
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




                echo "Your Rating  : ";
                echo $row['rating'] . "<br>";




            }

        }


        ?>





















        <?php



        if(isset($_POST["submit5"]))
        {


            $sqlS = "SELECT * FROM subjectof WHERE NameOfSubject='$_POST[t5]'";


            $resultS=mysqli_query($db, $sqlS);
            //echo"working ";

            echo"<table>";
            while ($row=mysqli_fetch_array($resultS)) {
                # code...
                echo "<td>";

                echo"Search result..";
                echo "<tr><td>" . "User: ". $row["user_name_L"] . "</td><td>";
                echo "<tr><td>" . "Designation: ". $row["Title"] . "</td><td>";
                echo "<tr><td>" . "Subject: ". $row["NameOfSubject"] . "</td><td>";

                echo "</td>";


            }







        }











        ?>


        <form name="form1" action="" method="post">

            <table>

                <tr>
                    <td>Designation</td>
                    <td><input type="text" name="t1"></td>


                </tr>

                <tr>
                    <td>Update D</td>
                    <td><input type="text" name="t3"></td>


                </tr>


                <tr>
                    <td>Subject</td>
                    <td><input type="text" name="t2"></td>


                </tr>


                <tr>
                    <td>Update S</td>
                    <td><input type="text" name="t4"></td>


                </tr>


                <tr>

                    <td colspan="5" align="center">
                        <input type="submit" name="submit1" value="insert">

                        <input type="submit" name="submit2" value="delete">

                        <input type="submit" name="submit3" value="update">

                        <input type="submit" name="submit4" value="Display">

                    </td>


                </tr>


            </table>


            <tr>
                <td>Search</td>
                <td><input type="text" name="t5"></td>


            </tr>

            <input type="submit" name="submit5" value="search">

        </form>



        <style>
            .button {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
        </style>

        <input type="button" class="button" value="Massage">

        <h1>Biography</h1>
        <textarea rows="4" cols="50">
          
                  </textarea>

        <input type="submit" value="Submit">


        <p><a href="index.php?logout='1'"  style="color: red;">logout</a></p>

    <?php endif ?>


</div>


<?php include 'footer.php';
?>



</body>
</html>