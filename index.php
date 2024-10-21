 <!-- back -->
<?php
                                                                                    
                                                                                    $conn = mysqli_connect('localhost','root','','mec'); 
                                                                                    
                                                                                    if (!$conn) {
                                                                                      die("Connection failed: " . mysqli_connect_error());
                                                                                  }
                                                                                      // print_r(mysqli_fetch_all($select)) ;
                                                                                    // comment => isset => return true or false
                                                                                    $message ='';
                                                                                  
                                                                                  if(isset($_POST['submit'])){
                                                                                   $name = $_POST['name'];
                                                                                   $email = $_POST['email'];
                                                                                   $gender = $_POST['gender'];
                                                                                   $address = $_POST['address'];
                                                                                   $salary = $_POST['salary'];
                                                                                   $phone = $_POST['phone'];
                                                                                   $department =$_POST['department']; 
                                                                                   $sql = "INSERT INTO employees (name,email,gender,address,salary,phone,  department) VALUES ('$name','$email','$gender','$address','$salary' ,'phone'
                                                                                   , '$department')";
                                                                                  // echo $sql;  // Debug the query
                                                                                  // $result = mysqli_query($conn, $sql);
                                                                                   $result =  mysqli_query($conn,$sql);
                                                                                    if(!$result){ 
                                                                                  echo "Error:" . mysqli_error($conn);
                                                                                    }  
                                                                                  if($result){  
                                                                                    $message = "Employees added successfully";
                                                                                  }
                                                                                  }
                                                                                  
                                                                                  //    if( ! $conn) {
                                                                                  // echo "connect error" . mysqli_connect_error($conn);
                                                                                  //    }                                     i                                  
                                                                                     if(isset($_GET['delete'])){
                                                                                      $id = $_GET['delete'];
                                                                                      $deleteQuery = "DELETE FROM  employees where id =  $id "; 
                                                                                       $delete = mysqli_query($conn,$deleteQuery);
                                                                                       if($delete){
                                                                                     header("LOCATION:index.php");
                                                                                  }  
                                                                                     }                                                                                             
                                                                                    //edit
                                                                                    $name = '';
                                                                                    $email = '';
                                                                                    $gender = '';
                                                                                    $address = '';
                                                                                    $salary = '';
                                                                                     $phone = '';
                                                                                    $department =''; 
                                                                                    $isEditMode = false;
                                                                                    if(isset($_GET['edit'])){
                                                                                      $id = $_GET['edit'];
                                                                                      $selectQuery = "SELECT * FROM  employees where id = $id ";
                                                                                      $selectOne =mysqli_query($conn,$selectQuery);
                                                                                      $row = mysqli_fetch_assoc($selectOne) ;
                                                                                      $name = $row['name'];
                                                                                   $email = $row['email'];
                                                                                   $gender = $row['gender'];
                                                                                   $address = $row['address'];

                                                                                   $salary = $row['salary'];
                                                                                   $phone = $row['phone'];
                                                                                   $department =$row['department']; 
                                                                                   $isEditMode = true;
                                                                                  
                                                                                    }                                                                               
                                                                                                                                                                                   
                                                                                  $selectQuery ="SELECT * FROM  employees";
                                                                                    $select = mysqli_query($conn,$selectQuery);
                                                                                  
                                                                                  
                                                                                  ?>
                                                                                   <!DOCTYPE html>
                                                                                  <html lang="en">
                                                                                    <head>
                                                                                      <meta charset="utf-8">
                                                                                      <meta name="viewport" content="width=device-width, initial-scale=1">
                                                                                      <title>crud system in company</title>
                                                                                      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                                                                                    </head>
                                                                                    <style>
                                                                                      body{
                                                                                        background-color: #4e4e4e;
                                                                                        color: white;
                                                                                      }
                                                                                    </style>
                                                                                    <body>
                                                                                      <!-- front -->
                                                                                        <div class="container col-7 mt-5">
                                                                                           <div class="card bg-dark text-light mb-4">
                                                                                            <?php if(!empty($message)):?>
                                                                                            <div class="alert alert-success">
                                                                                              <?php echo $message  ?>
                                                                                            </div>
                                                                                            <?php endif?>
                                                                                             <!-- padding -->
                                                                                            <div class="card-body"> 
                                                                                               <form  method="post">
                                                                                               <div class="row">
                                                                                                <div class="col-md-6 mb-2">
                                                                                              <label for="name" class="form-label">Name</label>
                                                                                               <input type="text" name="name" value="<?=$name ?>" id="name" class="form-control" >
                                                                                             </div>
                                                                                             <div class="col-md-6 mb-2">
                                                                                              <label for="email" class="form-label">Email</label>
                                                                                               <input type="email" name="email" value="<?= $email ?>" id="email" class="form-control" >
                                                                                             </div>
                                                                                             <div class="col-md-6 mb-2">
                                                                                              <label for="gender" class="form-label">gender</label>
                                                                                             <select name="gender" id="gender"  class="form-select">
                                                                                              <option  value="Male">Male</option>
                                                                                              <option value="Female">Female</option>
                                                                                             </select>
                                                                                             </div>
                                                                                             <div class="col-md-6 mb-2">
                                                                                              <label for="address" class="form-label">address</label>
                                                                                                <textarea rows="1" name="address"  id="address" class="form-control" ><?= $address ?></textarea>
                                                                                             </div>
                                                                                             <div class="col-md-6 mb-2">
                                                                                              <label for="salary" class="form-label">salary</label>
                                                                                               <input type="number" value="<?= $salary ?>" name="salary" id="salary" class="form-control" >
                                                                                             </div>
                                                                                             <div class="col-md-6 mb-2">
                                                                                              <label for="phone" class="form-label">phone</label>
                                                                                               <input type="number" value="<?= $phone ?>" name="phone" id="phone" class="form-control" >
                                                                                             </div>
                                                                                             
                                                                                             <div class="col-12   mb-2">
                                                                                              <label for="department" class="form-label">department</label>
                                                                                             <select name="department" value="<?= $department ?>" id="department" class="form-select">
                                                                                           
                                                                                              <option value="IT">IT</option>
                                                                                                <option value="HR">HR</option>
                                                                                              <option value="Sales">Sales</option>
                                                                                              <option value="SoftWare"> SoftWare</option>
                                                                                              <option value="WEB">WEB</option>
                                                                                             </select>
                                                                                             </div>
                                                                                             <div class="col-12 text-center mb-2">
                                                                                              <?php if($isEditMode): ?>
                                                                                                <button class="btn btn-warning" name="update">Update</button>
                                                                                                <a href="index.php" class="btn btn-secondary">Cancel</a>
                                                                                                <?php else: ?>
                                                                                              <button class="btn btn-primary" name="submit">Submit</button>
                                                                                               <?php endif ?>
                                                                                             </div>
                                                                                                </div>
                                                                                               </form>
                                                                                  
                                                                                            </div>
                                                                                           </div>
                                                                                           <div class="card bg-dark text-light">
                                                                                            <div class="card-body table-responsive">
                                                                                             <table class="table table-dark">
                                                                                              <thead>
                                                                                                <tr>
                                                                                                  <th>#</th>
                                                                                                  <th>Name</th>
                                                                                                  <th>email</th>
                                                                                                  <th>gender</th>
                                                                                                  <th>salary</th>
                                                                                                  <th>phone</th>
                                                                                                  <th>address</th>
                                                                                                  <th>department</th>
                                                                                                  <th colspan="2">Actions</th>
                                                                                                </tr>
                                                                                              </thead>
                                                                                              <tbody>
                                                                                                <?php foreach($select as $i => $emp): ?>
                                                                                                <tr>
                                                                                                  
                                                                                                  <td><? echo $i + 1?></td>
                                                                                                   <td><?php echo $emp['name'] ?></td>
                                                                                                   <td><?php echo $emp['email'] ?></td>
                                                                                                   <td><?php echo $emp['gender'] ?></td>
                                                                                                   <td><?php echo $emp['salary'] ?></td>
                                                                                                   <td><?php echo $emp['address'] ?></td>
                                                                                                   <td><?php echo $emp['phone'] ?></td>
                                                                                                   <td><?php echo $emp['department'] ?></td>
                                                                                                   <td>
                                                                                                    <a href="?delete=<?php echo $emp['id'] ?>" class="btn btn-danger">Delete</a>
                                                                                                   
                                                                                                   </td>
                                                                                                   <td>
                                                                                                   <a href="?edit=<?php echo $emp['id'] ?>" class="btn btn-info">Edit</a>
                                                                                                   </td>
                                                                                                </tr>
                                                                                                  <?php endforeach; ?>
                                                                                              </tbody>
                                                                                            
                                                                                             </table>
                                                                                            </div>
                                                                                           </div>
                                                                                           
                                                                                        </div>
                                                                                      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
                                                                                    </body>
                                                                                  </html>