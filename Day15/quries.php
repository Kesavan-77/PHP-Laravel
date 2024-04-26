<?php
$servername = "localhost:3306";
$username = "kesavan";
$password = "Kesavan@1234";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

try {
    // Create database
    $sql = "CREATE DATABASE sample";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully<br>";
    } else {
        throw new Exception("Error creating database: " . $conn->error);
    }
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

try {
    // Use sample database
    $sql = "USE sample";
    if ($conn->query($sql) === TRUE) {
        echo "Working with the sample database<br>";
    } else {
        throw new Exception("Error using sample database: " . $conn->error);
    }
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

try {
    // Create table
    $sql = "CREATE TABLE STUDENTS(id INT(10), firstname VARCHAR(50), lastname VARCHAR(50), email VARCHAR(50))";
    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully<br>";
    } else {
        throw new Exception("Error creating table: " . $conn->error);
    }
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

try {
    // insert values
    $sql = 'INSERT INTO STUDENTS(id,firstname,lastname,email) VALUES(2,"kesavan","vel","kesavan@gmail.com")';
    if ($conn->query($sql) === TRUE) {
        echo "new record created successfully<br>";
    } else {
        throw new Exception("Error creating record: " . $conn->error);
    }
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

try {
    // insert multiple values
    $sql = 'INSERT INTO STUDENTS(id,firstname,lastname,email) VALUES(3,"praba","c","praba@gmail.com");';
    $sql .= 'INSERT INTO STUDENTS(id,firstname,lastname,email) VALUES(4,"harish","murugaian","harish@gmail.com");';
    if ($conn->multi_query($sql) === TRUE) {
        echo "new record created successfully<br>";
        
        // Consume all results
        do {
            if ($result = $conn->store_result()) {
                $result->free();
            }
        } while ($conn->more_results() && $conn->next_result());
    } else {
        throw new Exception("Error creating record: " . $conn->error);
    }
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}


try {
    //display values
    $sql = "SELECT id, firstname, lastname, email FROM STUDENTS ORDER BY firstname";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]." - EMAIL: ".$row["email"]."<br>";
        }
    } else {
        throw new Exception("Error fetching record: " . $conn->error);
    }

    // Consume all results
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}


try{
    //delete records
    $sql = "DELETE FROM STUDENTS WHERE id=3";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully <br>";
    } else {
        throw new Exception("Error deleting record: " . $conn->error);
    }
}catch(Exception $e){
    echo $e->getMessage() . "<br>";
}

try {
    //display values
    $sql = "SELECT id, firstname, lastname, email FROM STUDENTS ORDER BY firstname";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]." - EMAIL: ".$row["email"]."<br>";
        }
    } else {
        throw new Exception("Error fetching record: " . $conn->error);
    }

    // Consume all results
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}


try {
    // Delete database
    $sql = "DROP DATABASE sample";
    if ($conn->query($sql) === TRUE) {
        echo "Database deleted successfully<br>";
    } else {
        throw new Exception("Error deleting database: " . $conn->error);
    }
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

$conn->close();

?>