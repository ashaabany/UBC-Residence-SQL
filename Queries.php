<html> 

    <style>
    
    </style>
    <head>
        <title>CPSC 304 Milestone 3</title>
        <style>

        .wrapper {
            text-align:center
        }
        .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding-top: 16px;
        padding-bottom: 16px;
        padding-right: 26px;
        padding-left: 26px;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        border:2px solid black;
        }

        .dropdown {
        position: relative;
        display: inline-block;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        cursor: pointer;
        }

         

        #HouseMember {
            text-align: center;
        }

    

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}
        </style>

    </head>



    <body>

    <!-- TITLE -->
    <h1 style="text-align: center">Milestone 3: UBC Residence Organizer</h1>
    
    <!-- Dropdown Menu -->
    <div class="wrapper" style="text-align: left; margin-top: 80px; margin-left: 50px">
        <div class="dropdown">
            <button class="dropbtn">Choose Query</button>
            <div class="dropdown-content">
                    <a href="milestone3.php?displayTupleRequest=&insertDisplay=Submit" id="insert">Insert House Member</a>
                    <a href="milestone3.php?displayTupleRequest=&updateRoomDisplay=Submit" id="update">Update Room Status</a>
                    <a href="milestone3.php?displayTupleRequest=&updateStudySpaceDisplay=Submit" id="update">Update Study Space Status</a>
                    <a href="milestone3.php?displayTupleRequest=&deleteDisplay=Submit" id="delete">Remove House Member</a>
                    <a href="milestone3.php?displayTupleRequest=&selectionDisplay=Submit" id="selection">Budget Planning (Selection)</a>
                    <a href="milestone3.php?displayTupleRequest=&projectionDisplay=Submit" id="projection">Find mixed gender houses (Projection)</a>
                    <a href="milestone3.php?displayTupleRequest=&joinDisplay=Submit" id="join">Find lounges for food break (Join)</a>
                    <a href="milestone3.php?displayTupleRequest=&divisionDisplay=Submit" id="division">Similar courses with your roommates (Division)</a>
                    <a href="milestone3.php?displayTupleRequest=&groupbyDisplay=Submit" id="groupby">Find average age within each room (Group By)</a>
                    <a href="milestone3.php?displayTupleRequest=&havingDisplay=Submit" id="having">Find big residence (Group By/ Having)</a>
                    <a href="milestone3.php?displayTupleRequest=&nestedGroupByDisplay=Submit" id="nested">Find floormates with same courses (Nested Group By)</a>
            </div>
            
        </div>
    </div>


    <!-- Insertion: Add a house member to a house in a residence -->
    <!-- Display Before Query Results  -->
    
    
    

    <!-- Display After Query Results  -->
    <div>
    </div>

 

        <!-- <h2>Return residences where miniminum price is in your budget.</h2>
        <form method="GET" action="milestone3.php"> 
            <input type="hidden" id="selectTupleRequest" name="selectTupleRequest">
            <input type="submit" name="selectionRequest"></p>
        </form>
        
        <form method="POST" action="milestone3.php">
            Price: <input type="text" name="price"> <br /><br />
        </form>

        <h2>Display query results</h2>
        <form method="GET" action="milestone3.php">
            <input type="hidden" id="displayTupleRequest" name="displayTupleRequest">
            <input type="submit" name="insertDisplay"></p>
            
        </form> -->

        
        <?php
        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        

        function connectToDB() {
            global $db_conn;
            

            // Your username is ora_(CWL_ID) and the password is a(student number). For example, 
            // ora_platypus is the username and a12345678 is the password.
            $db_conn = OCILogon("ora_ashaaban", "a85490290", "dbhost.students.cs.ubc.ca:1522/stu");
            

            if ($db_conn) {  
                return true;
            } else {
            
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }

        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
            //echo "<br>running ".$cmdstr."<br>";
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr); 
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
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
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }

        
        // Return table column nam
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

        function printResult($result, $fieldNames) { //prints results from a select statement
            echo "<div class=tablewrapper style='text-align: center'>";
            echo "<table id='HouseMember'>";

            echo "<thead>";
            foreach($fieldNames as $i) {
                echo "<th>" . $i . "</th>";
            }
            echo "</thead>";
            
            //TODO: If statement for each query; hardcode table labels using "<th>"
           // echo "<tr><th>studentID<th><th>roomID<th></tr>";
            while ($row  = oci_fetch_array($result, OCI_BOTH)) {

               
                echo "<tr>";
                for($i=0; $i<= count($row)/2; $i++) {
                    
                    echo "<td>" . $row[$i] . "</td>";
                }
                echo "</tr>";
                
            }

            echo "</table>";
            echo "</div>";
        }

        
        function handleInsertDisplay() {
            global $db_conn;
           
            echo "<h2>House Members</h2>";
            $result = executePlainSQL("SELECT * FROM HouseMember");
            $fieldNames = getTableLabels("SELECT * FROM HouseMember");

            if (($row = oci_fetch_row($result)) != false) {
                echo printResult($result, $fieldNames);
            }

            echo "<br>";
            echo "<h2>Rooms</h2>";
           
            $result2 = executePlainSQL("SELECT * FROM Room");
            $fieldNames2 = getTableLabels("SELECT * FROM Room");

            if (($row = oci_fetch_row($result2)) != false) {
                echo printResult($result2, $fieldNames2);
            }

            echo "<br><br>";
            echo "<h3>Insert a new house member (make sure roomID exists!):</h3>";
            echo "<form method='POST' action='milestone3.php'> <!--refresh page when submitted-->";
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
			echo "House Member has been successfully added!";
            printResult($result, $fieldNames);
        }

        function handleUpdateRoomDisplay() {
            global $db_conn;
           
            echo "<h2>House Member</h2>";
            $result = executePlainSQL("SELECT * FROM HouseMember");
            $fieldNames = getTableLabels("SELECT * FROM HouseMember");

            if (($row = oci_fetch_row($result)) != false) {
                echo printResult($result, $fieldNames);
            }

            echo "<br>";
            echo "<h2>Rooms</h2>";
           
            $result2 = executePlainSQL("SELECT * FROM Room");
            $fieldNames2 = getTableLabels("SELECT * FROM Room");

            if (($row = oci_fetch_row($result2)) != false) {
                echo printResult($result2, $fieldNames2);
            }

            echo "<br><br>";
            echo "<h3>Insert the following values (make sure roomID exists!):</h3>";
            echo "<form method='POST' action='milestone3.php'> <!--refresh page when submitted-->";
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

            executePlainSQL("update HouseMember set roomID ='" . $roomID . "' where studentID ='" . $studentID . "'");
            OCICommit($db_conn);


            $result = executePlainSQL("SELECT * FROM HouseMember");
            $fieldNames = getTableLabels("SELECT * FROM HouseMember");
            printResult($result, $fieldNames);
		}
		

        function handleUpdateStudySpaceDisplay() {
            global $db_conn;
           
            echo "<h2>Residence</h2>";
            $result = executePlainSQL("SELECT * FROM Residence");
            $fieldNames = getTableLabels("SELECT * FROM Residence");

            if (($row = oci_fetch_row($result)) != false) {
                echo printResult($result, $fieldNames);
            }

            echo "<br><br>";
            echo "<form method='POST' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "<input type='hidden' id='updateHouseMember' name='updateStudySpaceQueryRequest'>";
            echo "Enter residence name: <input type='text' name='residenceName'> <br /><br />";
            echo "<input type='submit' value='Update' name='updateStudySpaceSubmit'></p>";
            echo "</form>";


           
        }

        // TODO: handleStudySpaceRoomRequest() function
        
        function handleDeleteDisplay() {
            global $db_conn;
           
            echo "<h2>House Member</h2>";
            $result = executePlainSQL("SELECT * FROM HouseMember");
            $fieldNames = getTableLabels("SELECT * FROM HouseMember");

            if (($row = oci_fetch_row($result)) != false) {
                echo printResult($result, $fieldNames);
            }

            
            echo "<br><br>";
            echo "<form method='POST' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "<input type='hidden' id='deleteHouseMember' name='deleteQueryRequest'>";
            echo "What is your student ID: <input type='text' name='studentID'> <br /><br />";
            echo "What is your Room ID: <input type='text' name='roomID'> <br /><br />";
            echo "We are sorry to see you go:( <br /><br />";
            echo "<input type='submit' value='Delete' name='deleteSubmit'></p>";
            echo "</form>";


           
        }

        function handleDeleteRequest() {
            global $db_conn;
            
            //Getting the values from user and insert data into the table

            $roomID = $_POST['roomID'];
            $studentID = $_POST['studentID'];

            executePlainSQL("DELETE FROM HouseMember WHERE studentID ='" . $studentID . "'");
            OCICommit($db_conn);


            $result = executePlainSQL("SELECT * FROM HouseMember");
            $fieldNames = getTableLabels("SELECT * FROM HouseMember");
            printResult($result, $fieldNames);
		}

        function handleSelectionDisplay() {
            global $db_conn;
		   

            echo "<h2>Residences</h2>";
            $result = executePlainSQL("SELECT * FROM Residence");
			$fieldNames = getTableLabels("SELECT * FROM Residence");
			

            //I dont think we should show a table for this query? The user then can simply look at table to see all price range rather than typing in budget
            if (($row = oci_fetch_row($result)) != false) {
                printResult($result, $fieldNames);
            }

            
            echo "<br><br>";
            echo "<form method='POST' action='milestone3.php'> <!--refresh page when submitted-->";
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

			printResult($result, $fieldNames);

            
        }



        function handleProjectionDisplay() {
            global $db_conn;
           
            echo "<h2>Houses</h2>";
            // $result = executePlainSQL("SELECT HouseLoungeIncludes.houseName, HouseLoungeIncludes.loungeNumber
            //                            FROM HouseName HouseLoungeIncludes
            //                            WHERE HouseName.houseName = HouseLoungeIncludes.houseName
            //                            AND  HouseLoungeIncludes.foodAllowed = 1 AND HouseName.hasKitchens = 1");
            // $fieldNames = getTableLabels("SELECT HouseLoungeIncludes.houseName, HouseLoungeIncludes.loungeNumber
            //                               FROM HouseName HouseLoungeIncludes
            //                               WHERE HouseName.houseName = HouseLoungeIncludes.houseName
            //                               AND  HouseLoungeIncludes.foodAllowed = 1 AND HouseName.hasKitchens = 1");\

            $result = executePlainSQL("SELECT * FROM House");
            $fieldNames = getTableLabels("SELECT * FROM House");

            if (($row = oci_fetch_row($result)) != false) {
                echo printResult($result, $fieldNames);
            }


            echo "<br><br>";
            echo "<form method='GET' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "<input type='hidden' id='projectionHouseMember' name='projectionQueryRequest'>";
            echo "Click submit to see house names and whether they are mixed gender<br><br>";
            echo "<input type='submit' value='Submit' name='projectionSubmit'></p>";
            echo "</form>";

            $result = executePlainSQL("SELECT * FROM House");
            $fieldNames = getTableLabels("SELECT * FROM House");

        }

        

           //What is this function???
        function handleProjectionRequest() {
			
            global $db_conn;


            $result = executePlainSQL("SELECT houseName, isMixedGender FROM House");
            $fieldNames = getTableLabels("SELECT houseName, isMixedGender FROM House");
			printResult($result, $fieldNames);

            
        }
        function handleJoinDisplay() {
            global $db_conn;
           
            echo "<h2>Houses</h2>";
            // $result = executePlainSQL("SELECT HouseLoungeIncludes.houseName, HouseLoungeIncludes.loungeNumber
            //                            FROM HouseName HouseLoungeIncludes
            //                            WHERE HouseName.houseName = HouseLoungeIncludes.houseName
            //                            AND  HouseLoungeIncludes.foodAllowed = 1 AND HouseName.hasKitchens = 1");
            // $fieldNames = getTableLabels("SELECT HouseLoungeIncludes.houseName, HouseLoungeIncludes.loungeNumber
            //                               FROM HouseName HouseLoungeIncludes
            //                               WHERE HouseName.houseName = HouseLoungeIncludes.houseName
            //                               AND  HouseLoungeIncludes.foodAllowed = 1 AND HouseName.hasKitchens = 1");\

            $result = executePlainSQL("SELECT * FROM House");
            $fieldNames = getTableLabels("SELECT * FROM House");

            if (($row = oci_fetch_row($result)) != false) {
                echo printResult($result, $fieldNames);
            }

            echo "<br><br>";
            $result2 = executePlainSQL("SELECT * FROM HouseLoungeIncludes");
            $fieldNames2 = getTableLabels("SELECT * FROM HouseLoungeIncludes");

            if (($row = oci_fetch_row($result2)) != false) {
                echo printResult($result2, $fieldNames2);
            }
            echo "<br><br>";
            echo "<form method='GET' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "<input type='hidden' id='joinHouseMember' name='joinQueryRequest'>";
            echo "Find house lounges that allow food and has a kitchen!<br><br>";
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
			printResult($result, $fieldNames);

            
        }

        function handleDivisionDisplay() {
            global $db_conn;
           
            echo "<h2>House Member</h2>";
            $result = executePlainSQL("SELECT * FROM HouseMember");
            $fieldNames = getTableLabels("SELECT * FROM HouseMember");

            if (($row = oci_fetch_row($result)) != false) {
                echo printResult($result, $fieldNames);
            }
            echo "<h2>Courses</h2>";
            $result2 = executePlainSQL("SELECT * FROM CourseNumber");
            $fieldNames2 = getTableLabels("SELECT * FROM CourseNumber");

            if (($row = oci_fetch_row($result2)) != false) {
                echo printResult($result2, $fieldNames2);
            }
            echo "<h2>Students taking courses</h2>";
            $result3 = executePlainSQL("SELECT * FROM TakeCourse");
            $fieldNames3 = getTableLabels("SELECT * FROM TakeCourse");

            if (($row = oci_fetch_row($result3)) != false) {
                echo printResult($result3, $fieldNames3);
            }

            
            echo "<br><br>";
            echo "<h3>Enter a course to find all the rooms where some student took that course:</h3>";
            echo "<form method='POST' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "<input type='hidden' id='divisionHouseMember' name='divisionQueryRequest'>";
            echo "What is the course name?: <input type='text' name='courseName'> <br /><br />";
            echo "What is the course number?: <input type='text' name='courseNum'> <br /><br />";
            echo "<input type='submit' value='Confirm' name='divisionSubmit'></p>";
            echo "</form>";

        }

       

        function handleDivisionRequest() {
			
            global $db_conn;

            $courseName = $_POST['courseName'];
            $courseNum = $_POST['courseNum'];


            $result = executePlainSQL("SELECT distinct h1.roomID
                                     from HouseMember h1
                                     where not exists (select tc.courseName
                                                        from TakeCourse tc
                                                        where tc.courseName = '" . $courseName ."'
                                                        AND tc.courseNum = '" . $courseNum ."'
                                                        minus
                                                        select tc2.courseName
                                                        from TakeCourse tc2
                                                        where tc2.studentID = h1.studentID
                                                        )");
            $fieldNames = getTableLabels("SELECT distinct h1.roomID
                                            from HouseMember h1
                                            where not exists (select tc.courseName
                                                              from TakeCourse tc
                                                              where tc.courseName = '" . $courseName ."'
                                                              AND tc.courseNum = '" . $courseNum ."'
                                                               minus
                                                               select tc2.courseName
                                                               from TakeCourse tc2
                                                              where tc2.studentID = h1.studentID
                                                                )");

			printResult($result, $fieldNames);

            
        }

        function handleGroupByDisplay() {
            global $db_conn;
           
            echo "<h2>Average age in each room</h2>";
            $result = executePlainSQL("SELECT roomID, AVG(age)
                                       FROM HouseMember
                                       GROUP BY roomID");
            $fieldNames = getTableLabels("SELECT roomID, AVG(age)
                                          FROM HouseMember
                                          GROUP BY roomID");

            if (($row = oci_fetch_row($result)) != false) {
                echo printResult($result, $fieldNames);
            }

            
            echo "<br><br>";
            echo "<form method='POST' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "<input type='hidden' id='groupByHouseMember' name='groupByQueryRequest'>";
            echo "Average age within each room <br /><br />";
            echo "</form>";

        }

        // TODO: handleGroupByRequest() function

        function handleHavingDisplay() {
            global $db_conn;
           
            echo "<h2>Average age in each room</h2>";
            $result = executePlainSQL("SELECT House.residenceName
                                       FROM House 
                                       GROUP BY House.residenceName
                                       HAVING COUNT(*) >= 5");
            $fieldNames = getTableLabels("SELECT House.residenceName
                                          FROM House 
                                          GROUP BY House.residenceName
                                          HAVING COUNT(*) >= 5");

            if (($row = oci_fetch_row($result)) != false) {
                echo printResult($result, $fieldNames);
            }

            
            echo "<br><br>";
            echo "<form method='POST' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "<input type='hidden' id='havingHouseMember' name='havingQueryRequest'>";
            echo "Find residences that have more than 5 houses <br /><br />";
            echo "</form>";

        }

        // TODO: handleHavingRequest() function

        function handleNestedGroupByDisplay() {
            global $db_conn;
           
            echo "<h2>HouseMember</h2>";
            $result = executePlainSQL("SELECT COUNT(hm.studentID)
                                       FROM HouseMember hm, Room r
                                       WHERE hm.roomID = r.roomID AND hm.floorID = ‘floorID’ AND studentID in (
                                                SELECT studentID
                                                FROM TakeCourse
                                                WHERE courseName = ‘courseName’ AND courseNum = ‘courseNum’)");
            $fieldNames = getTableLabels("SELECT COUNT(hm.studentID)
                                          FROM HouseMember hm, Room r
                                          WHERE hm.roomID = r.roomID AND hm.floorID = ‘floorID’ AND studentID in (
                                                    SELECT studentID
                                                    FROM TakeCourse
                                                    WHERE courseName = ‘courseName’ AND courseNum = ‘courseNum’)");

            if (($row = oci_fetch_row($result)) != false) {
                echo printResult($result, $fieldNames);
            }

            
            echo "<br><br>";
            echo "<form method='POST' action='milestone3.php'> <!--refresh page when submitted-->";
            echo "<input type='hidden' id='deleteHouseMember' name='deleteQueryRequest'>";
            echo "What course would you like to search for (enter course name, eg. CPSC)?: <input type='text' name='courseName'> <br /><br />";
            echo "Enter course num (eg. 304): <input type='text' name='courseNum'> <br /><br />";
            echo "Which floor do you live in (enter Floor ID)? : <input type='text' name='floorID'> <br /><br />";
            echo "<input type='submit' value='Submit' name='nestedGroupBySubmit'></p>";
            echo "</form>";

        }

        // TODO: handleHavingRequest() function




        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('updateRoomQueryRequest', $_POST)) {
                    handleUpdateRoomRequest();
                } else if (array_key_exists('updateStudySpaceQueryRequest', $_POST)) {
                    handleUpdateStudySpaceRequest();
                } else if (array_key_exists('insertQueryRequest', $_POST)) {
                    handleInsertRequest();
                } else if (array_key_exists('deleteQueryRequest', $_POST)) {
                    handleDeleteRequest();
                } else if (array_key_exists('selectionQueryRequest', $_POST)) {
                    handleSelectionRequest();
                } else if (array_key_exists('divisionQueryRequest', $_POST)) {
                    handleDivisionRequest();
                } else if (array_key_exists('havingQueryRequest', $_POST)) {
                    handleHavingRequest();
                } else if (array_key_exists('nestedGroupByQueryRequest', $_POST)) {
                    handleNestedGroupByRequest();
                }

                disconnectFromDB();
            }
        }

        function disconnectFromDB() {
            global $db_conn;
            OCILogoff($db_conn);
        }

        // HANDLE ALL GET ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('selectTuples', $_GET)) {
                    handleSelectionRequest();
                } else if (array_key_exists('insertDisplay', $_GET)) {
                    handleInsertDisplay();
                } else if (array_key_exists('updateRoomDisplay', $_GET)) {
                    handleUpdateRoomDisplay();
                } else if (array_key_exists('updateStudySpaceDisplay', $_GET)) {
                    handleUpdateStudySpaceDisplay();
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
                } else if (array_key_exists('groupByDisplay', $_GET)) {
                    handleGroupByDisplay();
                } else if (array_key_exists('havingDisplay', $_GET)) {
                    handleHavingDisplay();
                } else if (array_key_exists('nestedGroupByDisplay', $_GET)) {
                    handleNestedGroupByDisplay();
                }
                disconnectFromDB();
            }
        }

        if (isset($_POST['insertQueryRequest']) 
        || isset($_POST['updateRoomQueryRequest']) 
        || isset($_POST['selectionQueryRequest'])
        || isset($_POST['deleteQueryRequest'])
        || isset($_POST['selectionQueryRequest'])
        || isset($_POST['divisionQueryRequest'])
        ) {
            handlePOSTRequest();
        } 
        
        else if (isset($_GET['selectTupleRequest'])
        || isset($_GET['displayTupleRequest'])
        || isset($_GET['projectionQueryRequest'])
        || isset($_GET['joinQueryRequest'])) {
            handleGETRequest();
        }
		
	
         ?>
    </body>
    <script>
    // function menuClick(id) {
    //     var x = document.getElementById(id+"-");
    //     if (x.style.display === "none") {
    //         x.style.display = "block";
    //     } else {
    //         x.style.display = "none";
    //     }
    // }
    </script>
</html>
