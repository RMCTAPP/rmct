<?php 

include '../shared/configuration.php';

header('Content-type: application/json');

if (isset($_POST)) {

    $name = $_POST['name'];
    $contact_no = $_POST['contact_no'];
    $contact_no = str_replace('_','', $contact_no);
    $is_pwd = isset($_POST['is_pwd'])?1:0;
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    if (strlen($contact_no) < 11 || strlen($contact_no) > 11) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Please enter valid mobile number.'
        ]);
        exit();
    } 

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Please enter valid email format.'
        ]);
        exit();
    }

    $stmt = $conn->prepare('SELECT * FROM customers WHERE contact_no = ?');
    $stmt->execute([$contact_no]);
    $customerContact = $stmt->fetch();

    $stmt = $conn->prepare('SELECT * FROM customers WHERE email = ?');
    $stmt->execute([$email]);
    $customerEmail = $stmt->fetch();

    if ($customerEmail || $customerContact) {

        if ($customerEmail) {

            $data = [
                'status' => 'error',
                'message' => 'Email already exist.',
            ];

        } else {

            $data = [
                'status' => 'error',
                'message' => 'Contact number already exist.',
            ];

        }

    } else {
        
        $app_token = hash('sha256', $email . time() . time());

        $stmt = $conn->prepare("INSERT INTO customers (app_token, name, contact_no, email, password, address) VALUES (?,?,?,?,?,?)");
        $stmt->execute([$app_token, $name, $contact_no, $email, md5($password), $address]);
    
        $data = [
            'status' => 'success',
            'message' => 'Registration successful.',
        ];

    }

    echo json_encode($data);
} 
