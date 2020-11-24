<html> 

    <style>
    
    </style>
    <head>
        <title>UBC Housing Database</title>
        <style>


        
        .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        cursor: pointer;
        }
        .tableWrapper {
        overflow: auto;
        height: 300px;
        box-sizing: border-box;
        }
        h1 {
            font-family: "Lucida Console", Courier, monospace;
            
        }
        h2 {
            font-family: "Lucida Console", Courier, monospace;
            
        }
        h2 {
            font-family: "Lucida Console", Courier, monospace;
            
        }
        h4 {
            font-family: "Lucida Console", Courier, monospace;
            
        }
        h5 {
            font-family: "Lucida Console", Courier, monospace;
            
        }
        h6 {
            font-family: "Lucida Console", Courier, monospace;
            
        }
        table {
            width: 100%;
            padding-top: 5px;
            border-spacing: 5px;
            border-collapse: separate;
            text-align: left;
            vertical-align: bottom;
            font-size: 16px;
        }
        thead tr th {
            position: sticky;
            top:0;
            height: 38px;
            padding-top: 16px;
            padding-bottom: 9px;
            padding-left: 16px;
            padding-right: 16px;
            background-color: rgb(77, 164, 235);
            color: #FFFFFF;
            font-family: "BlsW-Bd", "Trebuchet MS", Helvetica, Arial, sans-serif;
            font-weight: normal;
            border:2px solid black;
            
        }

        th:hover{
            background-color: rgb(77, 150, 200);
        }
        tr:nth-child(odd) {
            background-color: #B0E0E6;
        }
        tr:nth-child(even) {
            background-color: #f1f1f1;
        }
        td {
            padding-top: 9px;
            padding-bottom: 9px;
            padding-left: 16px;
            padding-right: 16px;
            color: #000000;
            font-weight: 300;
        }
        th {
            padding-top: 9px;
            padding-bottom: 9px;
            padding-left: 6px;
            padding-right: 16px;
            background-color: #6D7376;
            color: #FFFFFF;
            font-weight: 500;
        }

        .headerWrapper {
            text-align: center;
        }

        .headerWrapper a {
    webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;

    display: inline-block;
    
    border:2px solid black;
    background-color: rgba(255,255,255,0);
    color:black;
    padding: 20px;
    font-family: "BlsW-Bd", "Trebuchet MS", Helvetica, Arial, sans-serif;;
    font-weight: bold;
    font-size: 11pt;
    border-radius: 8px;
    transition: background-color 500ms, color 500ms;
    margin: 10px;
    text-align: center;

    
    
}
    form {
        font-size: 20;
    }

    .headerWrapper a:hover {
        background-color: rgb(80, 91, 97);
        color: whitesmoke;
        cursor:pointer;
        transition: background-color 500ms, color 500ms;
        
    }

    input[type=submit] {
        webkit-appearance: button;
        -moz-appearance: button;
        appearance: button;

        text-decoration: none;
        color: initial;

        display: inline-block;
        
        border:2px solid black;
        background-color: rgba(255,255,255,0);
        color:black;
        padding: 10px 30px 10px 30px;
        font-family: "BlsW-Bd", "Trebuchet MS", Helvetica, Arial, sans-serif;;
        font-weight: bold;
        font-size: 11pt;
        border-radius: 8px;
        transition: background-color 500ms, color 500ms;
        margin: 10px;
        text-align: center;
    }
    input[type=submit]:hover {
        background-color: rgb(80, 91, 97);
        color: whitesmoke;
        cursor:pointer;
        transition: background-color 500ms, color 500ms;

    }

    .image {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;
}

         

        #HouseMember {
            text-align: center;
        }

    

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #0000CD;}
        </style>

    </head>



    <body style="background-color: rgb(228,228,228)">

    <!-- TITLE -->
    <h1 style="text-align: center">UBC Housing Database</h1>
    
    <!-- Dropdown Menu -->
    <!-- <div class="wrapper" style="text-align: left; margin-top: 80px; margin-left: 50px">
        <div class="dropdown">
            <button class="dropbtn">Choose Query</button>
            <div class="dropdown-content">
                
                    <a href="milestone3.php?displayTupleRequest=&insertDisplay=Submit" id="insert">Insert</a>
                    <a href="milestone3.php?displayTupleRequest=&deleteDisplay=Submit" id="delete">Delete</a>
                    <a href="milestone3.php?displayTupleRequest=&updateRoomDisplay=Submit" id="update">Update</a>
                    <a href="milestone3.php?displayTupleRequest=&selectionDisplay=Submit" id="selection">Selection</a>
                    <a href="milestone3.php?displayTupleRequest=&projectionDisplay=Submit" id="projection">Projection</a>
                    <a href="milestone3.php?displayTupleRequest=&joinDisplay=Submit" id="join">Join</a>
                    <a href="milestone3.php?displayTupleRequest=&groupbyDisplay=Submit" id="groupby">Aggregation with Group By</a>
                    <a href="milestone3.php?displayTupleRequest=&havingDisplay=Submit" id="having">Aggregation with Having</a>
                    <a href="milestone3.php?displayTupleRequest=&nestedGroupByDisplay=Submit" id="nested">Nested Aggregation with Group By</a>
                    <a href="milestone3.php?displayTupleRequest=&divisionDisplay=Submit" id="division">Division</a>
            </span>
            
        </div>
    </div> -->

    <div style="display:inline-block" class="headerWrapper">
        <a href="milestone3.php?displayTupleRequest=&insertDisplay=Submit">Insert</a>
        <a href="milestone3.php?displayTupleRequest=&deleteDisplay=Submit">Delete</a>
        <a href="milestone3.php?displayTupleRequest=&updateRoomDisplay=Submit">Update</a>
        <a href="milestone3.php?displayTupleRequest=&selectionDisplay=Submit">Selection</a>
        <a href="milestone3.php?displayTupleRequest=&projectionDisplay=Submit">Projection</a>
        <a href="milestone3.php?displayTupleRequest=&joinDisplay=Submit">Join</a>
        <a href="milestone3.php?displayTupleRequest=&groupbyDisplay=Submit">Aggregation with Group By</a>
        <a href="milestone3.php?displayTupleRequest=&havingDisplay=Submit">Aggregation with Having</a>
        <a href="milestone3.php?displayTupleRequest=&nestedGroupByDisplay=Submit">Nested Aggregation with Group By</a>
        <a href="milestone3.php?displayTupleRequest=&divisionDisplay=Submit" >Division</a>
    
    </div>


    <!-- Insertion: Add a house member to a house in a residence -->
    <!-- Display Before Query Results  -->
    
    
    

    <!-- Display After Query Results  -->
    <div>
    </div>

        <?php
        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        

    // This function ensures that we are connected to the oracle database
        function connectToDB() {
            global $db_conn;
        
            $db_conn = OCILogon("ora_CWL", "aSTUDENTNUMBER", "dbhost.students.cs.ubc.ca:1522/stu");
            

            if ($db_conn) {  
                return true;
            } else {
            
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }


    //takes a plain (no bound variables) SQL command and executes it
        function executePlainSQL($cmdstr) { 
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr); 
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                throw new Exception("There's a problem here sir.");
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                throw new Exception("There's a problem here sir.");
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }

			return $statement;
        }


        function executeBoundSQL($cmdstr, $list) {
            /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
		In this case you don't need to create the statement several times. Bound variables cause a statement to only be
		parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection. 
		See the sample code below for how this function is used */

			global $db_conn, $success;
			$statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                throw new Exception("There's a problem here sir.");
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn);
                echo htmlentities($e['message']);
                $success = False;
            }

            foreach ($list as $tuple) {
                foreach ($tuple as $bind => $val) {
                    //echo $val;
                    //echo "<br>".$bind."<br>";
                    OCIBindByName($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
				}

                $r = OCIExecute($statement, OCI_DEFAULT);
                if (!$r) {
                    throw new Exception("There's a problem here sir.");
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }

        
        // Return table column names
        function getTableLabels($cmdstr) {
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }
            $r = oci_execute($statement, OCI_DESCRIBE_ONLY);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }

            $ncols = oci_num_fields($statement);

            $result = array();

            for ($i = 1; $i <= $ncols; $i++) {
                $column_name  = oci_field_name($statement, $i);
                array_push($result, $column_name);
            }

            return $result;
        }

        //prints results from a select statement
        function printResult($result, $fieldNames) { 
            echo "<div class=tablewrapper style='text-align: center'>";
            echo "<table>";

            echo "<thead>";
            foreach($fieldNames as $i) {
                echo "<th>" . $i . "</th>";
            }
            echo "</thead>";
            

            while ($row  = oci_fetch_array($result, OCI_BOTH)) {

               
                echo "<tr>";
                for($i=0; $i< count($row)/2; $i++) {
                    
                    echo "<td>" . $row[$i] . "</td>";
                }
                echo "</tr>";
                
            }

            echo "</table>";
            echo "</div>";
        }

        //Handles the UI display of "Insert" in the dropdown menu
        function handleInsertDisplay() {
            global $db_conn;
           
            echo "<h2>House Members</h2>";
            $result = executePlainSQL("SELECT * FROM HouseMember");
            $fieldNames = getTableLabels("SELECT * FROM HouseMember");

            echo printResult($result, $fieldNames);

            echo "<br>";
            echo "<h2>Rooms</h2>";
           
            $result2 = executePlainSQL("SELECT * FROM Room");
            $fieldNames2 = getTableLabels("SELECT * FROM Room");

            
            echo printResult($result2, $fieldNames2);
            

            echo "<br><br>";
            echo "<form method='POST' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "Insert a new house member (make sure roomID exists!): <br /><br />";
            echo "<input type='hidden' id='insertHouseMember' name='insertQueryRequest'>";
            echo "Student ID: <input type='text' name='studentID'> <br /><br />";
            echo "Room ID: <input type='text' name='roomID'> <br /><br />";
            echo "Age: <input type='text' name='age'> <br /><br />";
            echo "Name: <input type='text' name='name'> <br /><br />";
            echo "Gender: <input type='text' name='gender'> <br /><br />";
            echo "Major: <input type='text' name='major'> <br /><br />";
            echo "<input type='submit' value='Insert' name='insertSubmit'></p>";
            echo "</form>";

        
            $result = executePlainSQL("SELECT * FROM HouseMember");
            $fieldNames = getTableLabels("SELECT * FROM HouseMember");

           
        }

        //This and all the other 'Request' functions handle the running of the
        //submitted SQL query and preview of the result 
        function handleInsertRequest() {
            global $db_conn;

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":bind1" => $_POST['studentID'],
                ":bind2" => $_POST['roomID'],
                ":bind3" => $_POST['age'],
                ":bind4" => $_POST['name'],
                ":bind5" => $_POST['gender'],
                ":bind6" => $_POST['major']
            );

            $alltuples = array (
                $tuple
            );
            executeBoundSQL("insert into HouseMember values (:bind1, :bind2, :bind3, :bind4, :bind5, :bind6)", $alltuples);

            OCICommit($db_conn);


            $result = executePlainSQL("SELECT * FROM HouseMember");
			$fieldNames = getTableLabels("SELECT * FROM HouseMember");
            echo "<p style='font-size:20px'>House Member has been successfully added!</p>";
            echo "<h2>House Members</h2>";
            printResult($result, $fieldNames);

            echo"<br><h2>Your SQL Query:<h2><br>";
            echo "<img src='Insert.png' alt='Insert Query' class='image'>";
            echo"<br>";
        }

        //Handles the UI display of "Update" in the dropdown menu
        function handleUpdateRoomDisplay() {
            global $db_conn;
           
            echo "<h2>House Members</h2>";
            $result = executePlainSQL("SELECT * FROM HouseMember");
            $fieldNames = getTableLabels("SELECT * FROM HouseMember");

            
            echo printResult($result, $fieldNames);


            echo "<br>";
            echo "<h2>Rooms</h2>";
           
            $result2 = executePlainSQL("SELECT * FROM Room");
            $fieldNames2 = getTableLabels("SELECT * FROM Room");

            
            echo printResult($result2, $fieldNames2);
            

            echo "<br><br>";
            echo "<form method='POST' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "Insert the following values (make sure roomID exists!): <br /><br />";
            echo "<input type='hidden' id='updateHouseMember' name='updateRoomQueryRequest'>";
            echo "What is your student ID: <input type='text' name='studentID'> <br /><br />";
            echo "What is your NEW Room ID: <input type='text' name='roomID'> <br /><br />";
            echo "<input type='submit' value='Update' name='updateRoomSubmit'></p>";
            echo "</form>";


			$result = executePlainSQL("SELECT * FROM HouseMember");
            $fieldNames = getTableLabels("SELECT * FROM HouseMember");
           
        }
        
		function handleUpdateRoomRequest() {
            global $db_conn;
            
            //Getting the values from user and insert data into the table

            $roomID = $_POST['roomID'];
            $studentID = $_POST['studentID'];
            if ($roomID == '') {
                throw new Exception("empty roomID");
            }

            executePlainSQL("update HouseMember set roomID ='" . $roomID . "' where studentID ='" . $studentID . "'");
            OCICommit($db_conn);


            $result = executePlainSQL("SELECT * FROM HouseMember");
            $fieldNames = getTableLabels("SELECT * FROM HouseMember");

            echo "<p style='font-size:20px'>The room has been updated.</p>";
            echo "<h2>House Members</h2>";
            printResult($result, $fieldNames);

            echo"<br><h2>Your SQL Query:<h2><br>";
            echo "<img src='Update.png' alt='Update Query' class='image'>";
            echo"<br>";
		}
		
        //Handles the UI display of "Delete" in the dropdown menu
        function handleDeleteDisplay() {
            global $db_conn;
           
            echo "<h2>House Members</h2>";
            $result = executePlainSQL("SELECT * FROM HouseMember");
            $fieldNames = getTableLabels("SELECT * FROM HouseMember");

            
            echo printResult($result, $fieldNames);


            
            echo "<br><br>";
            echo "<form method='POST' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "<input type='hidden' id='deleteHouseMember' name='deleteQueryRequest'>";
            echo "What is your student ID: <input type='text' name='studentID'> <br /><br />";
            echo "What is your Room ID: <input type='text' name='roomID'> <br /><br />";
            echo "<input type='submit' value='Delete' name='deleteSubmit'></p>";
            echo "</form>";


           
        }

        function handleDeleteRequest() {
            global $db_conn;
            
            
            $roomID = $_POST['roomID'];
            $studentID = $_POST['studentID'];
            if ($roomID == '') {
                throw new Exception("empty roomID");
            }

            executePlainSQL("DELETE FROM HouseMember WHERE studentID ='" . $studentID . "'");
            OCICommit($db_conn);


            $result = executePlainSQL("SELECT * FROM HouseMember");
            $fieldNames = getTableLabels("SELECT * FROM HouseMember");
            echo "<p style='font-size:20px'>We are sorry to see you go:( </p>";
            echo "<h2>House Members</h2>";
            printResult($result, $fieldNames);
            
            echo"<br><h2>Your SQL Query:<h2><br>";
            echo "<img src='Delete.png' alt='Delete Query' class='image'>";
            echo"<br>";
		}

        //Handles the UI display of "Selection" in the dropdown menu
        function handleSelectionDisplay() {
            global $db_conn;
		   
            echo "<h2>Residences</h2>";
            $result = executePlainSQL("SELECT * FROM Residence");
			$fieldNames = getTableLabels("SELECT * FROM Residence");
			            
            printResult($result, $fieldNames);
        
            
            echo "<br><br>";
            echo "<form method='POST' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "Find residences that have a minimum price within your budget. <br /><br />";
            echo "<input type='hidden' id='selection' name='selectionQueryRequest'>";
            echo "What is your budget?: <input type='text' name='budget'> <br /><br />";
            echo "<input type='submit' value='Enter' name='selectionSubmit'></p>";
			echo "</form>";
			
			$result = executePlainSQL("SELECT * FROM HouseMember");
            $fieldNames = getTableLabels("SELECT * FROM HouseMember");
           
        }


 
        function handleSelectionRequest() {
			
            global $db_conn;

            $price = $_POST['budget'];

            $result = executePlainSQL("SELECT *
            FROM Residence
			WHERE minPrice <= '" . $price ."'");

			$fieldNames = getTableLabels("SELECT *
            FROM Residence
			WHERE minPrice <= '" . $price ."'");
            
            echo "<p style='font-size:20px'>Here are the residences that meet your budget requirements</p>";
            echo "<h2>Residences</h2>";
            printResult($result, $fieldNames);
            
            echo"<br><h2>Your SQL Query:<h2><br>";
            echo "<img src='Selection.png' alt='Selection Query' class='image'>";
            echo"<br>";

        }


        //Handles the UI display of "Projection" in the dropdown menu
        function handleProjectionDisplay() {
            global $db_conn;
           
            echo "<h2>Houses</h2>";

            $result = executePlainSQL("SELECT * FROM House");
            $fieldNames = getTableLabels("SELECT * FROM House");

            
            echo printResult($result, $fieldNames);
            


            echo "<br><br>";
            echo "<form method='GET' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "<input type='hidden' id='projectionHouseMember' name='projectionQueryRequest'>";
            echo "Click submit to see house names and whether they are mixed gender<br><br>";
            echo "<input type='submit' value='Submit' name='projectionSubmit'></p>";
            echo "</form>";

            $result = executePlainSQL("SELECT * FROM House");
            $fieldNames = getTableLabels("SELECT * FROM House");

        }

        

        function handleProjectionRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT houseName, isMixedGender FROM House");
            $fieldNames = getTableLabels("SELECT houseName, isMixedGender FROM House");
            echo "<h2>Houses</h2>";
            printResult($result, $fieldNames);
            
            echo"<br><h2>Your SQL Query:<h2><br>";
            echo "<img src='Projection.png' alt='Projection Query' class='image'>";
            echo"<br>";
            
        }

        //Handles the UI display of "Join" in the dropdown menu
        function handleJoinDisplay() {
            global $db_conn;
           
            echo "<h2>Houses</h2>";

            $result = executePlainSQL("SELECT * FROM House");
            $fieldNames = getTableLabels("SELECT * FROM House");

            
            echo printResult($result, $fieldNames);
            

            echo "<br><br>";
            echo "<h2>House Lounges</h2>";
            $result2 = executePlainSQL("SELECT * FROM HouseLoungeIncludes");
            $fieldNames2 = getTableLabels("SELECT * FROM HouseLoungeIncludes");


            echo printResult($result2, $fieldNames2);
            
            echo "<br><br>";
            echo "<form method='GET' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "<input type='hidden' id='joinHouseMember' name='joinQueryRequest'>";
            echo "Find house lounges that allow food and that are in houses that have kitchens.<br><br>";
            echo "<input type='submit' value='Submit' name='joinSubmit'></p>";
            echo "</form>";

            $result = executePlainSQL("SELECT * FROM House");
            $fieldNames = getTableLabels("SELECT * FROM House");

            $result2 = executePlainSQL("SELECT * FROM HouseLoungeIncludes");
            $fieldNames2 = getTableLabels("SELECT * FROM HouseLoungeIncludes");

        }


        function handleJoinRequest() {
            global $db_conn;

            
            $result = executePlainSQL("SELECT H.houseName, HL.loungeNumber
                                     FROM House H, HouseLoungeIncludes HL
                                     WHERE H.houseName = HL.houseName
                                     AND  HL.foodAllowed = 1 AND H.hasKitchens = 1");
            $fieldNames = getTableLabels("SELECT H.houseName, HL.loungeNumber
                                        FROM House H, HouseLoungeIncludes HL
                                        WHERE H.houseName = HL.houseName
                                        AND  HL.foodAllowed = 1 AND H.hasKitchens = 1");
            echo "<h2>Houses</h2>";
            printResult($result, $fieldNames);

            echo"<br><h2>Your SQL Query:<h2><br>";
            echo "<img src='Join.png' alt='Join Query' class='image'>";
            echo"<br>";
            
        }

        //Handles the UI display of "Division" in the dropdown menu
        function handleDivisionDisplay() {
            global $db_conn;
           
            echo "<h2>House Members</h2>";
            $result = executePlainSQL("SELECT * FROM HouseMember");
            $fieldNames = getTableLabels("SELECT * FROM HouseMember");

            
            echo printResult($result, $fieldNames);
            

            echo "<h2>Students taking courses</h2>";
            $result3 = executePlainSQL("SELECT * FROM TakeCourse");
            $fieldNames3 = getTableLabels("SELECT * FROM TakeCourse");

            
            echo printResult($result3, $fieldNames3);
            

            
            echo "<br><br>";
            echo "<form method='POST' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "Enter a room ID to find courses that are taken by all students in that room <br /><br />";
            echo "<input type='hidden' id='divisionHouseMember' name='divisionQueryRequest'>";
            echo "What is the roomID?: <input type='text' name='roomID'> <br /><br />";
            echo "<input type='submit' value='Confirm' name='divisionSubmit'></p>";
            echo "</form>";

        }

       

        function handleDivisionRequest() {
			
            global $db_conn;

            $roomID = $_POST['roomID'];

            if ($roomID == '') {
                throw new Exception("empty roomID");
            }
            


            $result = executePlainSQL("SELECT distinct tc.courseName, tc.courseNum
                                        from TakeCourse tc
                                        where not exists (select h.studentID
                                                        from HouseMember h
                                                        where h.roomID = '" . $roomID . "'
                                                        minus 
                                                        select tc2.studentID
                                                        from TakeCourse tc2
                                                        where tc2.courseName = tc.courseName 
                                                        and tc2.courseNum = tc.courseNum)");
            $fieldNames = getTableLabels("SELECT distinct tc.courseName, tc.courseNum
                                            from TakeCourse tc
                                            where not exists (select h.studentID
                                                            from HouseMember h
                                                            where h.roomID = '" . $roomID . "'
                                                            minus 
                                                            select tc2.studentID
                                                            from TakeCourse tc2
                                                            where tc2.courseName = tc.courseName 
                                                            and tc2.courseNum = tc.courseNum)");

            printResult($result, $fieldNames);
            
            echo"<br><h2>Your SQL Query:<h2><br>";
            echo "<img src='Division.png' alt='Division Query' class='image'>";
            echo"<br>";

            
        }

        //Handles the UI display of "Group By" in the dropdown menu
        function handleGroupByDisplay() {
            global $db_conn;
           
            echo "<h2>Students Taking Courses</h2>";

            $result = executePlainSQL("SELECT * FROM TakeCourse");
            $fieldNames = getTableLabels("SELECT * FROM TakeCourse");

            
            echo printResult($result, $fieldNames);
            

            echo "<br><br>";
            echo "<h2>Houses that Students live in</h2>";
            $result2 = executePlainSQL("SELECT * FROM StudentHouse");
            $fieldNames2 = getTableLabels("SELECT * FROM StudentHouse");

            
            echo printResult($result2, $fieldNames2);
            
            
            echo "<br><br>";
            echo "<form method='GET' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "<input type='hidden' id='groupByHouseMember' name='groupByQueryRequest'>";
            echo "Click submit to find the number of students taking each course for each house<br><br>";
            echo "<input type='submit' value='Submit' name='groupBySubmit'></p>";
            echo "</form>";

          
        }

       function handleGroupByRequest() {

            global $db_conn;

            
            $result = executePlainSQL("SELECT tc.courseName, tc.courseNum, h.houseName, COUNT(tc.courseName) AS Total_Students
                                        FROM TakeCourse tc, StudentHouse h
                                        WHERE tc.studentID = h.studentID
                                        GROUP BY tc.courseName, tc.courseNum, h.houseName");

            $fieldNames = getTableLabels("SELECT tc.courseName, tc.courseNum, h.houseName, COUNT(tc.courseName) AS Total_Students
                                            FROM TakeCourse tc, StudentHouse h
                                            WHERE tc.studentID = h.studentID
                                            GROUP BY tc.courseName, tc.courseNum, h.houseName");
            echo "<h2>Number of students taking each course for each house</h2><br>";
            printResult($result, $fieldNames);
            
            echo"<br><h2>Your SQL Query:<h2><br>";
            echo "<img src='Groupby.png' alt='Groupby Query' class='image'>";
            echo"<br>";

        }

        function handleHavingDisplay() {
            global $db_conn;
           
            echo "<h2>Houses</h2>";
            $result = executePlainSQL("SELECT * FROM House");
            $fieldNames = getTableLabels("SELECT * FROM House");

            
            echo printResult($result, $fieldNames);
            

            
            echo "<br><br>";
            echo "<form method='POST' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "<input type='hidden' id='havingHouseMember' name='havingQueryRequest'>";
            echo "Find residences that have <input type='text' name='numHouses'> or more houses <br /><br />";
            echo "<input type='submit' value='Submit' name='havingSubmit'></p>";
            echo "</form>";

        }



        //Handles the UI display of "Group By with Having" in the dropdown menu
        function handleHavingRequest() {

            global $db_conn;
            
            $numHouses = $_POST['numHouses'];
            
            $result = executePlainSQL("SELECT House.residenceName
                                        FROM House
                                        GROUP BY House.residenceName
                                        HAVING COUNT(*) >= '" . $numHouses . "'");

            $fieldNames = getTableLabels("SELECT House.residenceName
                                            FROM House
                                            GROUP BY House.residenceName
                                            HAVING COUNT(*) >= '" . $numHouses . "'");
                                            
            echo "<h2>Residences that have " . $numHouses . " or more house(s) </h2><br>";
            
            printResult($result, $fieldNames);
            
            echo"<br><h2>Your SQL Query:<h2><br>";
            echo "<img src='Groupbyhaving.png' alt='Groupby Having Query' class='image'>";
            echo"<br>";

        }

        function handleNestedGroupByDisplay() {
            global $db_conn;
           
            echo "<h2>House Members</h2>";
            $result = executePlainSQL("SELECT * FROM HouseMember");
            $fieldNames = getTableLabels("SELECT * FROM HouseMember");

            
            echo printResult($result, $fieldNames);
            

            echo "<h2>Rooms</h2>";
            $result2 = executePlainSQL("SELECT * FROM Room");
            $fieldNames2 = getTableLabels("SELECT * FROM Room");

            
            echo printResult($result2, $fieldNames2);
            

            
            echo "<br><br>";
            echo "<form method='GET' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "<input type='hidden' id='nestedGroupByQueryRequest' name='nestedGroupByQueryRequest'>";
            echo "Find the rooms with the largest average age on each floor. <br>";
            echo "<input type='submit' value='Submit' name='nestedGroupBySubmit'></p>";
            echo "</form>";

        }

        function handleNestedGroupByRequest() {
            global $db_conn;
            
            
            $result = executePlainSQL("SELECT r.floorID, r.roomID, round(avg(h.age), 2) AS Average_age
                                        from Room r, HouseMember h
                                        where r.roomID = h.roomID
                                        group by r.floorID, r.roomID
                                        HAVING avg(h.age) >= ALL (select avg(h2.age)
                                            from HouseMember h2, Room r2
                                            where h2.roomID = r2.RoomID and r2.floorID = r.floorID
                                            group by r2.roomID)");

            $fieldNames = getTableLabels("SELECT r.floorID, r.roomID, avg(h.age) AS Average_age
                                            from Room r, HouseMember h
                                            where r.roomID = h.roomID
                                            group by r.floorID, r.roomID
                                            HAVING avg(h.age) >= ALL (select avg(h2.age)
                                                from HouseMember h2, Room r2
                                                where h2.roomID = r2.RoomID and r2.floorID = r.floorID
                                                group by r2.roomID)");
                                            
            echo "<h2>Rooms with the largest average age on each floor </h2><br>";
            
            printResult($result, $fieldNames);
            
            echo"<br><h2>Your SQL Query:<h2><br>";
            echo "<img src='Nested.png' alt='Nested Aggregation Query' class='image'>";
            echo"<br>";
        }



// Responds to any POST request by calling the appropriate function
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('updateRoomQueryRequest', $_POST)) {
                    try {
                    handleUpdateRoomRequest();
                    } catch (Exception $e) {
                    echo "There is something wrong with your delete request (e.g. non-existent roomID, non-existent studentID). Please try again.";
                }
                } else if (array_key_exists('insertQueryRequest', $_POST)) {
                    try {
                    handleInsertRequest();
                    } catch (Exception $e) {
                        echo "There is something wrong with your insertion request (e.g. non-existent roomID, duplicate studentID). Please try again.";
                    }
                } else if (array_key_exists('deleteQueryRequest', $_POST)) {
                    try {
                        handleDeleteRequest();
                    } catch (Exception $e) {
                        echo "There is something wrong with your delete request (e.g. non-existent roomID, non-existent studentID). Please try again.";
                    }
                } else if (array_key_exists('selectionQueryRequest', $_POST)) {
                    try {
                        handleSelectionRequest();
                    } catch (Exception $e) {
                        echo "There is something wrong with your selction request (e.g. not an integer). Please try again.";
                    }
                } else if (array_key_exists('divisionQueryRequest', $_POST)) {
                    try {
                    handleDivisionRequest();
                    } catch (Exception $e) {
                        echo "There is something wrong with your division request (e.g. non-existent roomID). Please try again.";
                    }
                } else if (array_key_exists('havingQueryRequest', $_POST)) {
                    try{
                    handleHavingRequest();
                    } catch (Exception $e) {
                        echo "There is something wrong with your having request (e.g. not an integer). Please try again.";
                    }
                } 

                disconnectFromDB();
            }
        }

        function disconnectFromDB() {
            global $db_conn;
            OCILogoff($db_conn);
        }

        // Responds to any GET request by calling the appropriate function
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('selectTuples', $_GET)) {
                    handleSelectionRequest();
                } else if (array_key_exists('insertDisplay', $_GET)) {
                    handleInsertDisplay();
                } else if (array_key_exists('updateRoomDisplay', $_GET)) {
                    handleUpdateRoomDisplay();
                } else if (array_key_exists('deleteDisplay', $_GET)) {
                    handleDeleteDisplay();
                } else if (array_key_exists('selectionDisplay', $_GET)) {
                    handleSelectionDisplay();
                } else if (array_key_exists('joinDisplay', $_GET)) {
                    handleJoinDisplay();
                } else if (array_key_exists('joinQueryRequest', $_GET)) {
                    handleJoinRequest();
                } else if (array_key_exists('projectionDisplay', $_GET)) {
                    handleProjectionDisplay();
                } else if (array_key_exists('projectionQueryRequest', $_GET)) {
                    handleProjectionRequest();
                }else if (array_key_exists('divisionDisplay', $_GET)) {
                    handleDivisionDisplay();
                } else if (array_key_exists('groupbyDisplay', $_GET)) {
                    handleGroupByDisplay();
                } else if (array_key_exists('groupByQueryRequest', $_GET)) {
                    handleGroupByRequest();
                } else if (array_key_exists('havingDisplay', $_GET)) {
                    handleHavingDisplay();
                } else if (array_key_exists('nestedGroupByDisplay', $_GET)) {
                    handleNestedGroupByDisplay();
                } else if (array_key_exists('nestedGroupByQueryRequest', $_GET)) {
                    handleNestedGroupByRequest();
                }
                disconnectFromDB();
            }
        }
        
//Recognizes whether something is a POST or GET request
        if (isset($_POST['insertQueryRequest']) 
        || isset($_POST['updateRoomQueryRequest']) 
        || isset($_POST['selectionQueryRequest'])
        || isset($_POST['deleteQueryRequest'])
        || isset($_POST['selectionQueryRequest'])
        || isset($_POST['divisionQueryRequest'])
        || isset($_POST['havingQueryRequest'])) {
            handlePOSTRequest();
        } 
        
        else if (isset($_GET['selectTupleRequest'])
        || isset($_GET['displayTupleRequest'])
        || isset($_GET['projectionQueryRequest'])
        || isset($_GET['joinQueryRequest'])
        || isset($_GET['groupByQueryRequest'])
        || isset($_GET['nestedGroupByQueryRequest'])) {
            handleGETRequest();
        }
		
	
         ?>
    </body>
</html>
