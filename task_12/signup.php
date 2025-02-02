<?php include('conn.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 95vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }
        .signup-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        .btn-custom {
            background-color: #ff4d4d;
            color: white;
            border-radius: 50px;
            padding: 10px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <p>Create an Account, It's free</p>
        <form method="post">
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="example@gmail.com">
            </div>

            <div class="mb-3 text-start">
                <label for="Mobail" class="form-label">Mobail</label>
                <input type="number" name="number" class="form-control" id="Mobail" placeholder="077********">
            </div>

            <div class="mb-3 text-start">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" id="Name" placeholder="ahmed mohammad ali grewesh">
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="••••••••">
            </div>

            <div class="mb-3 text-start">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input type="password" name="con_pass" class="form-control" id="confirm-password" placeholder="••••••••">
            </div>

            <button type="submit" name="sign" class="btn btn-custom">Sign Up</button>
        </form>
        <p class="mt-3">Already have an account? <a href="login.php" class="fw-bold">Login</a></p>
    </div>
</body>
</html>

<?php
if (isset($_POST['sign'])) {
    $email = $_POST["email"];
    $mobile = $_POST["number"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $conf_pass = $_POST["con_pass"];
    $if = true;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $if = false;
        echo "Invalid email format.";
    }

    $name_parts = explode(" ", $name);
    if (count($name_parts) != 4 || !preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $if = false;
        echo "Full name must contain four sections and only letters.";
    }

    if (strlen($mobile) != 10 || !preg_match("/^[0-9]+$/", $mobile)) {
        $if = false;
        echo "Mobile number must be 10 .";
    }

    if (strlen($password) < 6) {
        $if = false;
        echo "Password must be at least 6 characters.";
    }

    if ($password != $conf_pass) {
        $if = false;
        echo "Passwords do not match.";
    }

    if ($if) {

        $query2 = "INSERT INTO `users` (`email`, `password`, `Full_name`, `mobail`) 
                VALUES ('$email', '$password', '$name', '$mobile')";
        $result2 = mysqli_query($conn, $query2);

        if (!$result2) {
            die("Query Failed: " . mysqli_error($conn));
        }

        $query1 = "INSERT INTO `roles` (`email`, `role`) VALUES ('$email', '1')";
        $result1 = mysqli_query($conn, $query1);

        if (!$result1) {
            die("Query Failed: " . mysqli_error($conn));
        } else {
            header('Location: login.php?insert_msg=Record successfully added');
            exit();
        }
    }
}
?>
