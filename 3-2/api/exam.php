<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include("conn.php");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "GET" && !isset($_GET['id'])) {
    $sql = "SELECT * FROM exams";
    $result = $conn->query($sql);
    $exams = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $exams[] = $row;
        }
        echo json_encode($exams);
    } else {
        echo json_encode(["message" => "No exams found"]);
    }
}
elseif ($method == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM exams WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $exams = $result->fetch_assoc();
        echo json_encode($exams);
    } else {
        echo json_encode(["message" => "exams not found"]);
    }
}
elseif ($method == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['name']) && isset($data['email'])) {
        $subject_id = $data['subject_id'];
        $exam_date = $data['exam_date'];
        $max_score = $data['max_score'];
        $sql = "INSERT INTO exams (subject_id, pasexam_datesword , max_score) VALUES (?, ?,?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sss", $subject_id ,$pasexam_datesword ,$max_score ); 
            $stmt->execute();
            echo json_encode(["message" => "exams added successfully"]);
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
        $subject_id = $data['subject_id'];
        $exam_date = $data['exam_date'];
        $max_score = $data['max_score'];
        $sql = "UPDATE exams SET subject_id = ?, exam_date = ? , max_score = ?   WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssi", $subject_id, $exam_date,$max_score , $id); 
            $stmt->execute();
            echo json_encode(["message" => "exams updated successfully"]);
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
        $sql = "DELETE FROM exams WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $id); 
            $stmt->execute();
            echo json_encode(["message" => "exams deleted successfully"]);
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
