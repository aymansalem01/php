<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include("conn.php");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "GET" && !isset($_GET['id'])) {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $users = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        echo json_encode($users);
    } else {
        echo json_encode(["message" => "No users found"]);
    }
}
elseif ($method == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo json_encode($user);
    } else {
        echo json_encode(["message" => "User not found"]);
    }
}
elseif ($method == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['name']) && isset($data['email'])) {
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        $sql = "INSERT INTO users (email, password , name) VALUES (?, ?,?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sss", $email ,$password ,$name ); 
            $stmt->execute();
            echo json_encode(["message" => "User added successfully"]);
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
        $email = $data['email'];
        $sql = "UPDATE users SET name = ?, email = ? WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssi", $name, $email, $id); 
            $stmt->execute();
            echo json_encode(["message" => "User updated successfully"]);
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
        $sql = "DELETE FROM users WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $id); 
            $stmt->execute();
            echo json_encode(["message" => "User deleted successfully"]);
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
