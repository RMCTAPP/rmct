<?php 

include '../shared/configuration.php'; 

header('Content-type: application/json');

if (isset($_POST)) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = $conn->prepare("SELECT * FROM customers WHERE email = ? AND password = ?");
    $query->execute([$username, $password]);

    if ($query->rowCount() >= 1) {

        $customer = $query->fetch();
        $_SESSION['customer'] = $customer;

        $data = [
            'status' => 'success',
            'message' => 'Login success',
            'data' => [
                'type' => 'customer',
                'uid' => $customer['app_token']
            ]
        ]; 

    } else {

        $data = [
            'status' => 'error',
            'message' => 'Invalid email and/or password!',
        ]; 

    }
 
    echo json_encode($data);
} 
