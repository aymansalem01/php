<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include("conn.php");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "GET" && !isset($_GET['id'])) {
    $sql = "SELECT * FROM teachers";
    $result = $conn->query($sql);
    $teacherss = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $teacherss[] = $row;
        }
        echo json_encode($teacherss);
    } else {
        echo json_encode(["message" => "No teacherss found"]);
    }
}
elseif ($method == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM teachers WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $teachers = $result->fetch_assoc();
        echo json_encode($teachers);
    } else {
        echo json_encode(["message" => "teachers not found"]);
    }
}
elseif ($method == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['name']) && isset($data['email'])) {
        $name = $data['name'];
        $subject_id = $data['subject_id'];
        $contact_info = $data['contact_info'];
        $sql = "INSERT INTO teachers (name, subject_id , contact_info) VALUES (?, ?,?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sss", $name ,$subject_id ,$contact_info ); 
            $stmt->execute();
            echo json_encode(["message" => "teachers added successfully"]);
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
        $subject_id = $data['subject_id'];
        $contact_info = $data['contact_info'];
        $sql = "UPDATE teachers SET name = ?, subject_id = ?,contact_info = ? WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssi", $name, $email, $id); 
            $stmt->execute();
            echo json_encode(["message" => "teachers updated successfully"]);
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
        $sql = "DELETE FROM teachers WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $id); 
            $stmt->execute();
            echo json_encode(["message" => "teachers deleted successfully"]);
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
