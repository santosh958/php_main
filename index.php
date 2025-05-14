<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   
    <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="my_jquery_functions.js"></script>
       
    <link rel="stylesheet" href="css/bootstrap.css">     
   
  </head>
  <body>

    <?php
    include 'dbcon.php';
    include 'styles.php';
    if (isset($_POST['submit'])){
        $n = $_POST['na'];
        $e = $_POST['email'];
        $emailquery = " select * from student where email='$e' ";
        $query = mysqli_query($con, $emailquery);
        $emailcount = mysqli_num_rows($query);
        if($emailcount>0)
        {
          echo "email id already exists";
        }
        else{
          $insertquery = "insert into student (student_name, email) values('$n','$e')";
           if(mysqli_query($con, $insertquery))
           {
           ?>
             <script>
                  alert("inserted successfully");
              </script>

            <?php
            }
           else{
            ?>
              <script>
                   alert("insertion failed");
               </script>

            <?php
           }
        }
      }
    ?>

    
    <h1>STUDENT DATABASE</h1>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
    <div class="container my-4">
    <table class="table table-dark table-hover table-striped" id="student_table">
        <thead>
          <tr>
            <th scope="col">SNo.</th>
            <th scope="col">Student Name</th>
            <th scope="col">Email Id</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Phani</td>
            <td>Phani@gmail.com</td>
            <td>
            <button type="button" class="btn btn-success" onclick="makeFormVisible();onEdit(this);" id = "edit">EDIT</button>
            <button type="button" class="btn btn-success" onclick="onDelete(this);" id = "del">DELETE</button>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Tulasi</td>
            <td>Tulasi@gmail.com</td>
            <td>
            <button type="button" class="btn btn-success" onclick="makeFormVisible();onEdit(this);" id = "edit">EDIT</button>
            <button type="button" class="btn btn-success" onclick="onDelete(this);"  id = "del">DELETE</button>
            </td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>Batchu</td>
            <td>Batchu@gmail.com</td>
            <td>
            <button type="button" class="btn btn-success" onclick="makeFormVisible();onEdit(this);" id = "edit">EDIT</button>
            <button type="button" class="btn btn-success" onclick="onDelete(this);" id = "del">DELETE</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  <div class="container my-4" id = "form" >
  <form action="post-method.php" method="POST" onsubmit="event.preventDefault();onFormSubmit();">
      <label for="name" class="form-label">Student Name</label>
      <input type="name" name = "na" class="form-control" id="name" required>
      <label for="email_id" class="form-label">E-mail ID</label>
      <input type="email"  name = "email" class="form-control" id="email_id" required>
      <div id = "btn">
        <button type="submit" name='submit' onclick="disappearForm();" class="btn btn-dark" >DONE</button>
      </div>
  </form>
</div>

</body>
</html>
