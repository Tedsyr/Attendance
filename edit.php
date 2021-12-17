
<?php 
    $title = 'Edit Record';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

      $results = $crud->getSpecialties();
      if(!isset($_GET['id']))
      {

  //  echo 'ERROR';
  include 'includes/errormessage.php';
  header("Location: viewrecords.php");
      }
      else{
         $id = $_GET['id'];
        $attendee = $crud->getAttendeesDetails($id);
          ?>

          <h1 class="text-center">Edit Record</h1>
    <form 
            method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee ['attendee_id']?>" />
        <div class="form-group">
                   <label for="firstname">First Name</label>
                 <input type="text" class="form-control" value="<?php echo $attendee ['firstname']?>"id="firstname" name="firstname" >
         </div>

               <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control"value="<?php echo $attendee ['lastname']?> "id="lastname" name="lastname" >
                 </div>

                 <br>

                 <div class="form-group">
                          <label for="dob">Date Of Birth</label>
                           <input type="text" class="form-control" value="<?php echo $attendee ['dateofbirth']?> "id="dob" name="dob" >
                     </div>

                     <br>
      

                     <div class="form-group">
                             <label for="specialty">Area of Expertise</label>
                               <select class="form-select" value="<?php echo $attendee ['specialty']?> "id="specialty" name="specialty">
                               
                            <?php
                            while ($r = $results->fetch(PDO::FETCH_ASSOC)){?>

                                <option value="<?php echo $r['specialty_id']; ?>"> <?php  if($r['specialty_id'] ==$attendee ['specialty_id'])
                                echo 'selected'?>
                                
                                <?php  echo $r['name']; ?>
                            </option>

                            <?php } ?>

                           </select>  
                    </div>

                             
               
      
                    <div class="form-group">
                        <label for="email">Email address</label>
                         <input type="text" class="form-control" name="email"value="<?php echo $attendee ['emailaddress']?> "id="email"
                         aria-describedly="emailHelp">
                  <div small id="emailHelp"name="email" class="form-text text muted">We'll never share your email with anyone else.</div>
                   </div>


                   <br>
      
               <div class="form-group">
                   <label for="phone">Contact Number</label>
                    <input type="text" class="form-control" value="<?php echo $attendee ['contactnumber']?> "id="contact"name="phone"
                    aria-describedly="phoneHelp">
                 <div  small id="phoneHelp" class="form-text text muted">We'll never share your number with anyone else.</div>
          </div>

             <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
    </form>

    <?php } ?>
      <br>
      <br>
      <br>
      <br>
      <br>
    <?php require_once 'includes/footer.php'; ?>

