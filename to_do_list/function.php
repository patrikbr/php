<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="to_do";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["add"])){
    set_data();
}


function set_data(){
    global $conn;
    $todo = $_POST['todo'];

    $sql = "INSERT INTO todo1  VALUES (Null,'$todo')";
        
    if (mysqli_query($conn, $sql)) {
        get_data();
    } else {
        // Return failure status and error message
        echo json_encode(array("status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error));
    }

}

function get_data(){

    global $conn;

    $sql = "Select * from todo1";

    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            $task = $row["todo"];
            $id = $row["ID"];
            echo  "<li id='task_$id' > $task </li>";      
        }
    } 
}

