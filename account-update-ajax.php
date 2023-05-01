<?php 

include '../configuration.php';

header('Content-type: application/json');

if (isset($_POST)) {

    $user_id = $_GET['user_id'];
    $dataset = $_GET['dataset'];

    if ($dataset == 'name') {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $stmt = $conn->prepare("UPDATE customers SET firstname=?, lastname=? WHERE user_id=?");
        $stmt->execute([$firstname, $lastname, $user_id]);

        $stmt = $conn->prepare("UPDATE users SET name=? WHERE id=?");
        $stmt->execute(["{$firstname} {$lastname}", $user_id]);

        $data = [
            'status' => 'success',
            'message' => 'Name updated',
        ];

    } elseif ($dataset == 'mobile') {

        $mobile = $_POST['mobile'];

        if (isExistExcept("users","mobile",$mobile,"id",$user_id)) {

            $data = [
                'status' => 'error',
                'message' => 'Mobile number already in registered by other customer',
            ];

        } elseif (isExist("users","mobile",$mobile)) {

            $data = [
                'status' => 'error',
                'message' => 'Mobile number already in use',
            ];

        } else {

            $verification_code = codeGenerator("sms_code");

            $stmt = $conn->prepare("UPDATE customers SET verification_code=? WHERE user_id=?");
            $stmt->execute([$verification_code, $user_id]);

            $content = "Sison Water System App \n\nYour code for mobile number update is {$verification_code}. Please enter this code to proceed.\nThis is for mobile verification.";
            sendSms($mobile, $content);

            $data = [
                'status' => 'success',
                'message' => 'Please enter the code below to verify your mobile number and proceed with the updating process.',
            ];

        }

    } elseif ($dataset == 'mobile-otp') {

        $mobile = $_POST['mobile'];
        $verification_code = $_POST['verification_code'];

        $stmt = $conn->prepare('SELECT * FROM customers WHERE user_id=? AND verification_code=?');
        $stmt->execute([$user_id, $verification_code]);
        $valid = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($valid) {

            $stmt = $conn->prepare("UPDATE customers SET mobile=? WHERE user_id=?");
            $stmt->execute([$mobile, $user_id]);
          
            $stmt = $conn->prepare("UPDATE users SET mobile=? WHERE id=?");
            $stmt->execute([$mobile, $user_id]);
            
            $data = [
                'status' => 'success',
                'message' => 'Your mobile number has been verified and updated',
            ];
        
        } else {

            $data = [
                'status' => 'error',
                'message' => 'The verification code you entered is incorrect.',
            ];

        }

    } else {
      
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        $stmt= $conn->prepare("UPDATE users SET password=? WHERE id=?");
        $stmt->execute([md5($new_password), $user_id]);
        
        $data = [
            'status' => 'success',
            'message' => 'Password updated',
        ];

    }
     
    echo json_encode($data);
} 
