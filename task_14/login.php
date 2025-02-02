<?php include('conn.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: white;
            padding: 30px;
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        .btn-custom {
            background-color: #4a6cf7;
            color: white;
            border-radius: 50px;
            padding: 10px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <p>Welcome back! Login with your credentials</p>
        <form method="post">
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="example@gmail.com">
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="••••••••">
            </div>
            <button type="submit" name="hello" class="btn btn-custom">Login</button>
    
        <p class="mt-3">Don't have an account? <a href="signup.php" class="fw-bold" >Sign Up</a></p>
        </form>
    </div>
</body>
</html>
<?php 
if(isset($_POST['hello'])) {  
    include('conn.php');
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $query1 = "SELECT * FROM `users` WHERE email = '$email'";
    $result1 = mysqli_query($conn, $query1);

    if (!$result1) {
        die("Query Failed: " . mysqli_error($conn));
    }

    $user = mysqli_fetch_assoc($result1);

    if (!$user) {
        die("User not found"); 
    } 
    if (trim($password) == trim($user['password'])) { 
        session_start();
        $_SESSION['name'] = $user["Full_name"];
        $_SESSION['email'] = $email; 
        header('location: admin.php');
        exit();
    } else {
        echo "Wrong password";
    }
}
?>

