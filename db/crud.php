<?php

        class crud{

            private $db;

            function __construct($conn){

                $this->db = $conn;

            }
                
             public function insertAttendees($firstname, $lastname, $dateofbirth, $email, $contact, $specialty,$avatar_path){
                try {

                    $sql = "INSERT INTO attendee (firstname,lastname,dateofbirth,emailaddress,contactnumber,specialty_id,avatar_path) 
                    VALUES (:fname,:lname,:dob,:email,:contact,:specialty,:avatar_path)";
                        $stmt = $this->db->prepare($sql);

                        $stmt->bindparam(':fname',$firstname);
                        $stmt->bindparam(':lname',$lastname);
                        $stmt->bindparam(':dob',$dateofbirth);
                        $stmt->bindparam(':email',$email);
                        $stmt->bindparam(':contact',$contact);
                        $stmt->bindparam(':specialty',$specialty);
                        $stmt->bindparam(':avatar_path',$avatar_path);


                        $stmt->execute();
                        return true;


                }catch (PDOException $e) {

                    echo $e->getMessage();
                    return false;

                }

             }

             public function editAttendee($id, $firstname, $lastname, $dateofbirth, $email, $contact, $specialty,$avatar_path){
                try{
                    $sql = " UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,
                    `emailaddress`=:email,`contactnumber`=:contact,`specialty_id`=:specialty WHERE attendee_id =:id ";

                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':id',$id);
                 $stmt->bindparam(':fname',$firstname);
                 $stmt->bindparam(':lname',$lastname);
                 $stmt->bindparam(':dob',$dateofbirth);
                 $stmt->bindparam(':email',$email);
                 $stmt->bindparam(':contact',$contact);
                 $stmt->bindparam(':specialty',$specialty);

                 $stmt->execute();
                 return true;

                }catch (PDOException $e) {

                    echo $e->getMessage();
                    return false;

               
                }  

             }

             public function getAttendees(){
                 try{
                    $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
               $result = $this->db->query($sql);
              return $result;
                 }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                 }
                
             }
                public function getAttendeesDetails($id){
                    try{
                    $sql = "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
             }

                    
             }

             public function deleteAttendees($id){
                 try{
                $sql = "delete from attendee where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
             }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;


            }
             }

            public function getSpecialties(){
                $sql = "SELECT * FROM `specialties`";
              $result = $this->db->query($sql);
              return $result;
      

            }
 }

?>