<?php

class Signup{
    public $email;
    public $password;
    public $name;
    public $valid = true;
    public function __construct($eamil ,$password , $name)
    {
        $this->email = $eamil;
        $this->password = $password;
        $this->name = $name;

    }
    public function check(){
        if(!filter_var($this->email , FILTER_VALIDATE_EMAIL)){
            $this->valid = false;
            echo "ايميلك غلط ياغالي";
        }
        elseif(strlen($this->password) < 6){
            $this->valid = false;
            echo "كلمة السر  غلط ياغالي";
        }
        elseif(strlen($this->name)<4){
            $this->valid = false;
            echo "اسمك لازم يكون اقل اشي 4 احرف ";
        }
    }
    public function postdata(){
            include 'conn.php';
            $this->check();
            if($this->valid){
            $sql = "INSERT INTO `users` (`email`, `password`, `name`) VALUES ('$this->email','$this->password','$this->name')";
            $result = mysqli_query($conna , $sql);
            header('location: login.php');
            if (!$result) {
            die("Query Failed: " . mysqli_error($conna));
            
        }
        }
    }
}
?>
<!DOCTYPE html>
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
        <h1>SIGNUP</h1>
<form class="mx-1 mx-md-4 pt-5" method="post" style="width: 400px; justify-content:center;" >
<div class="d-flex flex-row align-items-center mb-4">
    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
    <div data-mdb-input-init class="form-outline flex-fill mb-0">
    <input type="text" id="form3Example1c" class="form-control" name="name" required/>
    <label class="form-label" for="form3Example1c">Your Name</label>
    </div>
</div>

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
    <button  type="submit" name="sign" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Register</button>
</div>

</form>
</div>
</body>
</html>
<?php 
if (isset($_POST['sign'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $user = new Signup($email,$password,$name);
    $user->postdata();
}
?>