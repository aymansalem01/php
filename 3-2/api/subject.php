<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include("conn.php");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "GET" && !isset($_GET['id'])) {
    $sql = "SELECT * FROM subjects";
    $result = $conn->query($sql);
    $subjectss = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $subjectss[] = $row;
        }
        echo json_encode($subjectss);
    } else {
        echo json_encode(["message" => "No subjectss found"]);
    }
}
elseif ($method == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM subjects WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $subjects = $result->fetch_assoc();
        echo json_encode($subjects);
    } else {
        echo json_encode(["message" => "subjects not found"]);
    }
}
elseif ($method == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['name']) && isset($data['email'])) {
        $name = $data['name'];
        $description = $data['description'];
        $sql = "INSERT INTO subjects (name, description ) VALUES (?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ss", $name ,$description); 
            $stmt->execute();
            echo json_encode(["message" => "subjects added successfully"]);
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
        $description = $data['description'];
        $sql = "UPDATE subjects SET name = ?, description = ? WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssi", $name, $description, $id); 
            $stmt->execute();
            echo json_encode(["message" => "subjects updated successfully"]);
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
        $sql = "DELETE FROM subjects WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $id); 
            $stmt->execute();
            echo json_encode(["message" => "subjects deleted successfully"]);
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
