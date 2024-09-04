
  <!-- Sidebar Start -->
  <?php include "sidebar.php"; ?>
  <!-- Sidebar End -->

  <div class="wrapper d-flex flex-column min-vh-100 bg-light">

  <!-- Navbar Start -->
  <?php include "navbar.php"; ?>
  <!-- Navbar End --> 

  <nav class="ms-4 mb-2" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-decoration-none" href="validate.php?dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Clients</li>
    </ol>
  </nav>

  <div class="card">

    <div class="card-header">
      <div class="row">

        <div class="col-md-10 mt-2">
          <h5 class="card-title">Clients Table</h5>
        </div>

        <div class="col-md-2 mt-1">
          <button class="btn btn-sm btn-dark" type="button" data-coreui-toggle="modal" data-coreui-target="#add_client">Add New Client</button>
        </div>
        
      </div>
    </div>

  <div class="card-body col-md-12">

    <div class="example">

      <div class="tab-content rounded-bottom">
        <div class="tab-pane p-0 active preview" role="tabpanel" id="preview-359">
            <div class="table-responsive">
            <table class="table table-hover">
              <thead class="text-center">
                <tr>
                  <th></th>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Uploading Date</th>
                  <th>Action</th>
                </tr>
              </thead>

              <?php
                include "../config.php";
                $fetchallclients = mysqli_query($connect, "SELECT * FROM clients");
                while ($fetchclients = mysqli_fetch_assoc($fetchallclients)) {
              ?>

              <tbody class="text-center">
                <tr>
                  <td></td>
                  <td><?php echo $fetchclients['ID']; ?></td>
                  <td><?php echo $fetchclients['Name']; ?></td>
                  <td><?php echo $fetchclients['Image']; ?></td>
                  <td><?php echo $fetchclients['Date']; ?></td>
                  <td>

                    <a href="" class="btn btn-sm btn-dark btn-center" type="submit" data-coreui-toggle="modal" data-coreui-target="#update_client<?php echo $fetchclients['ID'] ?>">Update</a>

                    <a class="btn btn-sm btn-outline-danger btn-center" href="../coding.php?delete_client=<?php echo $fetchclients['ID']; ?>">Delete</a>

                  </td>
                </tr>
              </tbody>

              <!-- Clients Updating Modal -->
              <div class="tab-content rounded-bottom">
                <div class="tab-pane p-0 active preview" role="tabpanel" id="preview-224">
                  <div class="modal fade" id="update_client<?php echo $fetchclients['ID'] ?>" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLiveLabel">Update Client</h5>
                          <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">

                          <form action="" method="POST" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                              <input class="form-control" type="hidden" name="id" placeholder="Enter Package Name" value="<?php echo $fetchclients['ID']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input class="form-control" type="text" name="client_name" placeholder="Enter Client Name" value="<?php echo $fetchclients['Name']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input class="form-control" type="file" id="formFile" name="update_client_img" value="<?php echo $fetchclients['Image']; ?>">
                            </div>

                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
                              <button class="btn btn-dark" type="submit" name="update_client">Update & Close</button>
                            </div>
                            
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <?php } ?>

              <?php

              if (isset($_POST['update_client'])) {
                include "../config.php";
                $cl_img = $_FILES['update_client_img']['name'];
                $cl_size = $_FILES['update_client_img']['size'];
                $cl_tmp_name = $_FILES['update_client_img']['tmp_name'];

                $extention = pathinfo($cl_img,PATHINFO_EXTENSION);
                $destination = "web_images/clients/".$cl_img;

                if ($cl_size <= 3000000) {
                  if ($extention == "jpg" OR $extention == "png" OR $extention == "jpeg") {
                    if (move_uploaded_file($cl_tmp_name,$destination)) {

                      $id = $_POST['id'];
                      $client_name = $_POST['client_name'];
                      
                      $update_client = mysqli_query($connect, "UPDATE clients SET Name = '$client_name',  Image = '$cl_img' WHERE ID = '$id' ");

                      echo "<script>
                              alert('Client Updated Successfully!');
                              location.assign('validate.php?clients');
                      </script>";
                      
                    }else{
                      echo "<script>
                              alert('Client Not Updated');
                              location.assign('validate.php?clients');
                      </script>";
                    }
                  }else{
                      echo "<script>
                              alert('Picture Must Be in jpg, jpeg or png');
                              location.assign('validate.php?clients');
                      </script>";
                    }
                }else{
                      echo "<script>
                              alert('Picture Size Must Be Lass Than 3MB');
                              location.assign('validate.php?clients');
                      </script>";
                    }
              }
                          

              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>





  <!-- Clients Adding Modal -->
  <div class="tab-content rounded-bottom">
    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-224">
      <div class="modal fade" id="add_client" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLiveLabel">Add New Client</h5>
              <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <form action="../coding.php" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3">
                  <input class="form-control" type="text" name="client_name" placeholder="Enter Client Name">
                </div>
                
                <div class="mb-3">
                  <input class="form-control" type="file" id="formFile" name="upload_client">
                </div>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
                  <button class="btn btn-dark" type="submit" name="add_client">Add & Close</button>
                </div>
                
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div> 