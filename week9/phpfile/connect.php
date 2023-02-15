<?php
$fullname = filter_input(INPUT_POST, 'fullname');
$email = filter_input(INPUT_POST, 'email');
$service = filter_input(INPUT_POST, 'services');
$messages = filter_input(INPUT_POST, 'messages');

if (!empty($fullname)){
  if (!empty($email)){
    if(!empty($service)){
      if(!empty($messages)){

        $servername = "192.168.150.213";
        $username = "webprogmi211";
        $password = "j@zzyAngle30";
        $dbname = "webprogmi211";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

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
