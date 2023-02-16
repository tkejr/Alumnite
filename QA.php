<?php
include "headerFiles.php";
?>

<link type="text/css" rel="stylesheet" href="css/QAStyle.css" />

<title>QA</title>



</head>

<body>

    <div class="container-fluid">

        <div class="row">
            <?php
            include 'nav.php';
            ?>


            <!--~~~~~~Confirming the Login here.~-->

            <?php
            include 'phpFiles/connection.php';
            if (!isset($_SESSION['Email'])) {
                echo "<script>openForm('no');</script>";
            } else {

                $username = $_SESSION['Email'];
                $sqli = "Select * from userinfo where Email='$username'";
                $result = mysqli_query($conn, $sqli);
                $exists = mysqli_num_rows($result); //it checks that the username exsists or not
                $table_email = "";
                $table_name = "";
                $table_Major = "";
                $table_GradDate = "";
                $table_PhoneNo = "";
                $table_id = "";
                $table_coins = "";
                $table_uni = "";

                if ($exists > 0) //checks are there any existing rows
                {
                    while ($row = mysqli_fetch_assoc($result)) //shows all rows from result
                    {
                        $table_email = $row['Email'];
                        $table_name = $row['Name'];
                        $table_Major = $row['Major'];
                        $table_GradDate = $row['GradDate'];
                        $table_PhoneNo = $row['PhoneNo'];
                        $table_id = $row['ID'];
                        $table_coins = $row['Coins'];
                        $table_uni = $row['University'];
                    }
                } else {
                    echo "Id Not Found"; //id not found
                }

                $_SESSION['ID'] = $table_id;
                $_SESSION['Uni'] = $table_uni;
            }
            ?>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->



        </div>

    </div>

    <div class="container" id="myList" style="margin-top: 20px;">

        <div class="row" id="searchRow">

            <div class="col-sm-9">
                <i class="fas fa-search"></i>
                <input class="search" placeholder="Search here..." />
            </div>

            <div class="col-sm-3" id="post_ques_div">
                <a href="QAsk.php">
                    <button>
                        <i class="fas fa-plus"></i> Post a Question
                    </button>
                </a>
            </div>

        </div>

        <ul class="list" style="padding-bottom: 20px; margin-top: 10px;">
            <?php
            include "phpFiles/connection.php";

            $tblName = "Questions";

            $sql = "SELECT * from $tblName";
            $result = mysqli_query($conn, $sql) or die("SELECT Error: ");

            while ($row = mysqli_fetch_array($result)) {

                $id = $row['QuesId'];
                $ques = $row['Question'];
                $desc = $row['Description'];
                $className = $row['Class_name'];
                $askedBy = $row['AskedBy'];
                $univer = $row['University'];
            ?>


                <div class="row QARow">

                    <div class="col-sm-3">

                        <?
                        if ($univer == "Texas Christian University") {
                        ?>
                            <img width="100%" height="100%" src="img/tcu-logo.svg" />
                        <?php
                        } else if ($univer == "Baylor University") {
                        ?>
                            <img width="100%" height="100%" src="img/bu-logo.png" />
                        <?php
                        } else if ($univer == "SMU") {
                        ?>
                            <img width="100%" height="100%" src="img/SMU-logo.png" />
                        <?php
                        } else {
                        ?>
                            <img width="100%" height="100%" src="img/ques-logo.png" />
                        <?
                        }
                        ?>

                    </div>

                    <div class="col-sm-9 quesDetails">

                        <div class="row">
                            <div class="col-sm-12 quesClass"><?php echo $ques; ?></div>

                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-12 descClass"><?php echo $desc; ?></div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-9">Class Name :- <?php echo $className; ?></div>
                            <div class="col-sm-3"><a href="QDetails.php?id=<?php echo $id ?>" class="viewBtn">View / Answer</a></div>
                        </div>

                    </div>


                </div>


            <?
            }
            ?>
        </ul>




    </div><!--Conatiner Close-->

    <script>
        var options = {
            valueNames: ['masId', 'masName', 'masSub', 'masProf', 'masUpldBy', 'masPending']
        };

        var myListOBJ = new List('myList', options);
        myListOBJ.sort('masId', {
            order: "desc"
        }); // Sorts the list in zxy-order based on names
    </script>

</body>

</html>