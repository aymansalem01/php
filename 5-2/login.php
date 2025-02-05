<?php 
    class Login{
        public $email;
        public $password;
        public $name;
        public $valid = true ;
        public function __construct($email,$password){
            $this->email = $email;
            $this->password = $password;
            $this->login();
        }
        public function login(){
            session_start();

            $this->check();
            $this->islogin();
            if($this->valid){
            $_SESSION['email'] = $this->email;
            $_SESSION['password'] = $this->password;
            $_SESSION['name'] = $this->name;
            header('location: ayman.php');
        }
        }
        public function check(){  
                include('conn.php');
                $query = "SELECT * FROM users WHERE email = '$this->email'";
                $result = mysqli_query($conna, $query);
                $user = mysqli_fetch_assoc($result);
                if (!$user) {
                    $this->valid = false;
                    die("User not found"); 
                } 
                if (trim($this->password) == trim($user['password'])) { 
                    $this->name =  $user['name'];
                } else {
                    $this->valid = false;
                    echo "Wrong password";
                }
            }
            public function islogin(){
                if(isset($_SESSION['email'])){
                    if($this->email == $_SESSION['email']){
                        $this->valid = false;
                        echo "this user logging ";
                    }
                }
            }
            public function logout(){
                session_destroy();
            }
            public function show(){
                echo "$this->email";
                echo "$this->password";
            }
        }



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div style="align-items:center;">
        <h1>LOGIN</h1>
<form class="mx-1 mx-md-4 pt-5" method="post" style="width: 400px; justify-content:center;" >
<div class="d-flex flex-row align-items-center mb-4">
    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
    <div data-mdb-input-init class="form-outline flex-fill mb-0">
    <input type="email" id="form3Example3c" class="form-control" name="email"  required/>
    <label class="form-label" for="form3Example3c">Your Email</label>
    </div>
</div>
<div class="d-flex flex-row align-items-center mb-4">
    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
    <div data-mdb-input-init class="form-outline flex-fill mb-0">
    <input type="password" id="form3Example4c" class="form-control" name="password"  required/>
    <label class="form-label" for="form3Example4c">Password</label>
    </div>
</div>
<div class="form-check d-flex justify-content-center mb-5">
    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
    <label class="form-check-label" for="form2Example3">
        I agree all statements in <a href="#!">Terms of service</a>
    </label>
</div>
<div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
    <button  type="submit" name="hello" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Register</button>
</div>
</form>
</div>
</body>
</html>
<?php  
    if(isset($_POST['hello'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = new Login($email,$password );
    }


?>