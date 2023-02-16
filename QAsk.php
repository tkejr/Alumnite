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
        </div>
    </div>

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


    <div class="container" id="ask_question_container">

        <h1>Post your Question here</h1>
        <hr>

        <form id="ask_question_form">

            <div class="input-group myAskQuestion">

                <input type="text" class="form-control" placeholder="Title of the Question" name="titleQuestion" required />

            </div>



            <div class="input-group myAskQuestion justify-content-center">

                <textarea id="detailsAsk" type="text " rows="5" onkeyup="Allow()" placeholder="Enter the details for your Question." class="form-control" name="descQuestion" required></textarea>

            </div>



            <div class="input-group myAskQuestion">

                <input type="text" class="form-control" placeholder="Subject Related. " name="subjQuestion" required />

            </div>



            <div class="input-group mb-3" style="height: 100%; margin:0; margin-bottom: 0px; margin-top: 20px;">
                <div class="input-group-prepend" style="height: 100%;">
                    <label class="input-group-text" for="uniQuestion">University</label>
                </div>
                <select class="custom-select" id="uniQuestion" name="uniQuestion">

                    <option value="Texas Christian University" <?php if ($_SESSION['Uni'] == "Texas Christian University") {
                                                                    echo "selected";
                                                                } ?>>Texas Christian University </option>

                    <option value="Baylor University" <?php if ($_SESSION['Uni'] == "Baylor University") {
                                                            echo "selected";
                                                        } ?>>Baylor University</option>

                    <option value="SMU" <?php if ($_SESSION['Uni'] == "SMU") {
                                            echo "selected";
                                        } ?>>SMU</option>
                </select>
            </div>

            <div class="row justify-content-center">

                <button type="submit" id="AskQuestionSubmit">Submit</button>

            </div>



        </form>

    </div>

    <div class="container" id="result_container">

        <div class="alert alert-success" id="ask_question_success">
            <strong>Successfully posted!</strong>
        </div>

        <div class="alert alert-danger" id="ask_question_fail">
            <strong>Some Error Occured!</strong>
        </div>

    </div>


    <script type="application/javascript">
        $(document).ready(function() {


            $('#ask_question_form').submit(function(e) {
                e.preventDefault();
                document.getElementById("AskQuestionSubmit").disabled = true;
                $.ajax({
                    type: "POST",
                    url: 'QA_Post_Question_Script.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response === "0") {
                            document.getElementById("ask_question_success").style.display = "block";
                        } else {
                            document.getElementById("ask_question_fail").style.display = "block";
                            console.log(response);

                        }
                    },
                    error: function(ts) {
                        console.log(ts.responseText);
                    }
                });
            });

        }); // Ready Closed
    </script>

</body>

</html>