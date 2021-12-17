<?php
    require_once 'db/conn.php';


if(isset($_POST['submit'])){
    $id =  $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
   $specialty = $_POST['specialty'];

   
    }

else{
   

            header("Location: viewrecords.php");

    include 'includes/errormessage.php';

}

$result = $crud->editAttendee($id, $firstname, $lastname, $dateofbirth, $email, $contact, $specialty);
if($results){

    header("Location: viewrecords.php");

    include 'includes/successmessage.php';

}

else{
    include 'includes/errormessage.php';
    header("Location: viewrecords.php");

}

?>  