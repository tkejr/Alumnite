<?php

	include '../phpFiles/connection.php';
	include '../phpFiles/coin.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$id = $_GET["id"];
		$res = $_GET["res"];


		$sql = "UPDATE pdfs SET Pending='$res' WHERE ID='$id' ";
		if (mysqli_query($conn, $sql)) {
		    echo "Update Success";
		    
		    if($res == "No"){
		        
    		    $sqli="SELECT * FROM pdfs WHERE ID='$id' ";
        		$result=mysqli_query($conn,$sqli);	
        		$exists=mysqli_num_rows($result);
        		
        		$email = "";
        			
    			if($exists>0)
    			{
    				while($row = mysqli_fetch_assoc($result))
    				{
    					$email=$row['UploadedBy'];
    				}
    			}
    			else
    			{ 
    				echo "3";//id not found
    			}	
    		    
    		    
                $messa = addCoins(5, $email);
    			if ($messa === "Success") {
    				echo "\nCoins have been awarded";
    			}
    			else{
    				echo "\nThere was some error awarding the coins.";
    			}
    			
		    }
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}

		mysqli_close($conn);

	}
