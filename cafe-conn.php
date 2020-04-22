ggg
<?php
    $customerName = $_POST['customerName'];
    $customerEmail = $_POST['customerEmail'];
    $customerMessage = $_POST['customerMessage'];
    //Database connection
    $conn = new mysqli('localhost', 'root','3306','democafe');
    if($conn->connect_error){
        die('Connection Failed : '. $conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into enquiries(customerName, customerEmail, customerMessage) values(?, ?, ?)");
        $stmt->bind_param("sss", $customerName, $customerEmail, $customerMessage);
        $stmt->execute();
        echo("Message sent successfully..");
        $stmt->close();
        $conn->close();
    }

    header('Location: form-success.html');
		exit();
?>
