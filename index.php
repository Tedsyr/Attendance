
<?php 
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

      $results = $crud->getSpecialties();

    ?>

    <h1 class="text-center">Registration for IT Conference</h1>

  

    <form  method="post" action="success.php" enctype="multipart/form-data">
        <div class="form-group">
                   <label for="firstname">First Name</label>
                 <input required type="text" class="form-control" id="firstname" name="firstname" > </div>

               <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input  required type="text" class="form-control" id="lastname" name="lastname" > </div>
                 <div class="form-group">   <label for="dob">Date Of Birth</label>
                           <input type="text" class="form-control" id="dob" name="dob" > </div>
                           
                     <div class="form-group">
                             <label for="specialty">Area of Expertise</label>
                               <select class="form-select" id="specialty" name="specialty">   
                            <?php
                            while ( $r = $results->fetch(PDO::FETCH_ASSOC)){?>

                                <option value="<?php echo $r['specialty_id']; ?>"> <?php  echo $r['name']; ?></option>

                            <?php } ?>

                           </select>  
                    </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                         <input required type="text" class="form-control" name="email" id="email" aria-describedly="emailHelp">
                  <small id="emailHelp"name="email" class="form-text text muted">We'll never share your email with anyone else.</small>

                   </div>
               <div class="form-groupform-group">
                   <label for="phone">Contact Number</label>
                    <input type="text" class="form-control" id="contact"name="phone" aria-describedly="phoneHelp">
                  <small id="phoneHelp" class="form-text text muted">We'll never share your number with anyone else.</small>
                            <br/>
                 
          </div>
          <div class="custom-file">
                    <input type="file" accept= "image/*" class="custom-file-input" id="avatar"name="avatar">
                    <label class="custom-file-label" for="avatar" >Choose file</label>     
               <small id="avatar" class="form-text text-warning">file Upload is Optiional.</small>
                            </div>
             <button type="submit"name="submit" class="btn btn-primary btn-block">submit</button>

    </form>
      <br>
      <br>
    <?php require_once 'includes/footer.php'; ?>

