<?php
include "headerFiles.php";
$quesId = $_GET["id"];
//    $quesId = "1";

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

    <div class="container-fluid" style="margin-top: 20px; padding: 20px;">

        <div class="row">

            <div class="col-sm-12 quesDetails">

                <?php
                include "phpFiles/connection.php";

                $tblName = "Questions";

                $sql = "SELECT * from $tblName where QuesId = $quesId";
                $result = mysqli_query($conn, $sql) or die("SELECT Error: ");

                while ($row = mysqli_fetch_array($result)) {

                    $id = $row['QuesId'];
                    $ques = $row['Question'];
                    $desc = $row['Description'];
                    $className = $row['Class_name'];
                    $askedBy = $row['AskedBy'];
                ?>

                    <div class="row">
                        <div class="col-sm-12 quesClass"><?php echo $ques; ?></div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-12 descClass"><?php echo $desc; ?></div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-12">Class Name :- <?php echo $className; ?></div>
                    </div>

                <?
                }
                ?>

            </div>

        </div>

    </div><!--Conatiner Close-->


    <!--The answers container-->
    <div class="container" id="myList" style="margin-top: 20px;">

        <ul class="list" style="padding-bottom: 20px; margin-top: 10px;">
            <?php
            include "phpFiles/connection.php";

            $tblName = "Answers";

            $sql = "SELECT * from $tblName a left join userinfo i on a.AnsweredBy = i.Email WHERE Linked_quesId = $quesId";
            $result = mysqli_query($conn, $sql) or die("SELECT Error: ");

            $answerdBy = "";

            while ($row = mysqli_fetch_array($result)) {

                $ansId = $row['AnsID'];
                $ans = $row['Answer'];
                $answerdBy = $row['AnsweredBy'];

                $name = $row['Name'];
            ?>


                <div class="row QARow">


                    <div class="col-sm-12">

                        <div class="row">
                            <div class="col-sm-12 quesClass"><?php echo $ans; ?></div>
                        </div>

                        <div class="row" style="margin-top: 10px;">
                            <div class="col-sm-12 AnswerdByClass" style="text-align: right;">
                                By :-
                                <?
                                echo $name;
                                ?>

                            </div>
                        </div>

                    </div>


                </div>
            <?
            }
            ?>

            <div class="row QARow">
                <div class="comment">
                    <form id="Qa_ans_post" method="POST">
                        <div class="row justify-content-center">
                            <textarea id="commentTA" name="commentTA" type="text " rows="5" onkeyup="Allow()" placeholder="Add your Answer"></textarea>
                        </div>

                        <input type="hidden" value="<?php echo $quesId; ?>" name="linkedQuesId" />

                        <div class="row float-right">
                            <button type="submit" id="commentSubmit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </ul>

        <div class="container" id="result_container">

            <div class="alert alert-success" id="ask_question_success">
                <strong>Successfully posted!</strong>
            </div>

            <div class="alert alert-danger" id="ask_question_fail">
                <strong>Some Error Occured!</strong>
            </div>

        </div>


    </div>


    <script type="application/javascript">
        var options = {
            valueNames: ['quesClass', 'AnswerdByClass']
        };

        var myListOBJ = new List('myList', options);

        $(document).ready(function() {

            alert("Document Ready. ");


            $('#Qa_ans_post').submit(function(e) {
                e.preventDefault();
                document.getElementById("commentSubmit").disabled = true;
                $.ajax({
                    type: "POST",
                    url: 'QA_post_ans_script.php',
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



        });
    </script>

</body>

</html>