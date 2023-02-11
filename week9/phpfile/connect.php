<?php
$fullname = filter_input(INPUT_POST, 'fullname');
$email = filter_input(INPUT_POST, 'email');
$service = filter_input(INPUT_POST, 'services');
$messages = filter_input(INPUT_POST, 'messages');

if (!empty($fullname)){
  if (!empty($email)){
    if(!empty($service)){
      if(!empty($messages)){

        $host = "localhost";
        $dbusername = "webprogmi211";
        $dbpassword = "webprogmi211";
        $dbname = "webprogmi211";
        // Create connection
        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

        if (mysqli_connect_error()){
          die('Connect Error ('. mysqli_connect_errno() .') '
          . mysqli_connect_error());
          }
          else{
          $sql = "INSERT INTO cbmedallada_MyGuests (fullname, email, services, messages)
          values ('$fullname','$email','$service','$messages')";
          if ($conn->query($sql)){
          echo "New record is inserted sucessfully";
          }
          else{
          echo "Error: ". $sql ."
          ". $conn->error;
          }
          $conn->close();
          }
      }
      else{
        echo "Messages should not be empty";
        die();
      }
    }
    else{
      echo "Service should not be empty";
      die();
    }
  }
  else{
    echo "Email should not be empty";
    die();
  }
}
else{
  echo "Name should not be empty";
  die();
}


?>
