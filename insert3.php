<?php
    include_once 'demos/demo1.php';
    include 'cwindex.php';

    if(isset($_GET['insert'])){
        if(!empty($_GET['inscol3'])){

            $column = $_GET["col3"];
            $ins = $_GET["inscol3"];

            $inssql1 = implode("', '",$ins); //values to be inserted
            $inssql2 = "'" . $inssql1 . "'";
            //echo "$inssql2";
            $colsql = implode(", ",$column); //column name to be inserted

            $sql = "INSERT INTO lang($colsql) VALUES($inssql2)";
            if(mysqli_query($conn,$sql)){
                echo "<p> <font color=white>Values inserted";
            }
            else
                echo "<p> <font color=white>Values not inserted";

            echo "<br>";
        }
    }

    echo "<br>";
    echo "<table border='1' cellpadding='2' bordercolor='#fff200'>";
    echo "<tr>";
    if(isset($_GET['insert'])){
        if(!empty($_GET["col3"])){
            foreach($_GET["col3"] as $col3){
                echo"<th><p> <font color=white>$col3</th>";
            }
            echo"<th><p> <font color=white>ACTIONS</th>";
        echo"</tr>";

		$sql = "SELECT * FROM lang;";
        $result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($_GET["col3"] as $col3){
                    echo "<td><p> <font color=white>".$row["$col3"]."</td>";
                }
                echo "<td><input type = 'submit' value = 'UPDATE' id='update_btn' class= 'update'> <input type = 'submit' value = 'DELETE' id='delete_btn' class= 'delete'></td>";
                echo "</tr>";
            }
        }
        else{
            echo "<p> <font color=white>Please select at least one column";
        }
    }
        echo "</table>";



?>