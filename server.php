<?php
$name = $_POST['name'];  
$pass = $_POST['pass'];  

$con = new mysqli("localhost","root","","arz");
if($con->connect_error)
{
    die("failed to connect: ".$con->connect_error);
}else{

    $stmt=$con->prepare("select * from register where name = ?");
    $stmt->bind_param("s",$name);
    $stmt=$con->prepare("select * from register where pass = ?");
    $stmt->bind_param("s",$pass);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
            if($data['pass']===$pass){
               header('Location: index1.html');
            }
        
    }else{
        header('Location: login1.html');
    }
}
?>