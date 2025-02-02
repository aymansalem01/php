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
                <label for="name" class="form-label"> Name</label>
                <input type="text" name="name" class="form-control" id="Name" placeholder="ahmed mohammad ali grewesh">
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="••••••••">
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
    $name = $_POST["name"];
    $password = $_POST["password"];
        $query2 = "INSERT INTO `users` (`email`, `password`, `name`) 
                VALUES ('$email', '$password', '$name')";
        $result = mysqli_query($conn, $query2);

        if (!$result) {
            die("Query Failed: " . mysqli_error($conn));
        }
        else {
            header('Location: login.php?insert_msg=Record successfully added');
            exit();
        }
    }
?>
