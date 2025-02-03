<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include("conn.php");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "GET" && !isset($_GET['id'])) {
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);
    $students = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
        echo json_encode($students);
    } else {
        echo json_encode(["message" => "No students found"]);
    }
}
elseif ($method == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $students = $result->fetch_assoc();
        echo json_encode($students);
    } else {
        echo json_encode(["message" => "students not found"]);
    }
}
elseif ($method == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['name']) && isset($data['email'])) {
        $name = $data['name'];
        $class = $data['class'];
        $date_of_birth = $data['date_of_birth'];
        $address = $data['address'];
        $contact_info = $data['contact_info'];

        $sql = "INSERT INTO students (name, class , date_of_birth , address , contact_info) VALUES (?, ?,?,?,?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssss", $name ,$class ,$date_of_birth,$address,$contact_info ); 
            $stmt->execute();
            echo json_encode(["message" => "students added successfully"]);
            $stmt->close();
        } else {
            echo json_encode(["message" => "Error in query preparation"]);
        }
    } else {
        echo json_encode(["message" => "Missing required data"]);
    }
}
elseif ($method == "PUT") {
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (isset($data['id']) && isset($data['name']) && isset($data['email'])) {
        $id = $data['id'];
        $name = $data['name'];
        $class = $data['class'];
        $date_of_birth = $data['date_of_birth'];
        $address = $data['address'];
        $contact_info = $data['contact_info'];

        $sql = "UPDATE students SET name = ?, class = ? ,date_of_birth = ? ,address = ? , contact_info = ?  WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssssi", $name, $class,$date_of_birth,$address,$contact_info, $id); 
            $stmt->execute();
            echo json_encode(["message" => "students updated successfully"]);
            $stmt->close();
        } else {
            echo json_encode(["message" => "Error in query preparation"]);
        }
    } else {
        echo json_encode(["message" => "Missing required data"]);
    }
}
elseif ($method == "DELETE") {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['id'])) {
        $id = $data['id'];
        $sql = "DELETE FROM students WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $id); 
            $stmt->execute();
            echo json_encode(["message" => "students deleted successfully"]);
            $stmt->close();
        } else {
            echo json_encode(["message" => "Error in query preparation"]);
        }
    } else {
        echo json_encode(["message" => "Missing required data"]);
    }
}
$conn->close();
?>
