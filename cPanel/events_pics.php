
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
      <li class="breadcrumb-item active" aria-current="page">Photography</li>
    </ol>
  </nav>

  <div class="card">

    <div class="card-header">
      <div class="row">

        <div class="col-md-10 mt-2">
          <h5 class="card-title">Pictures Table</h5>
        </div>

        <div class="col-md-2 mt-1">
          <button class="btn btn-sm btn-dark" type="button" data-coreui-toggle="modal" data-coreui-target="#add_photo">Add new picture</button>
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
                  <th>Description</th>
                  <th>Image</th>
                  <th>Uploading Date</th>
                  <th>Action</th>
                </tr>
              </thead>

              <?php
                include "../config.php";
                $fetchallphoto = mysqli_query($connect, "SELECT * FROM events_pics");
                while ($fetchphoto = mysqli_fetch_assoc($fetchallphoto)) {
              ?>

              <tbody class="text-center">
                <tr>
                  <td></td>
                  <td><?php echo $fetchphoto['id']; ?></td>
                  <td><?php echo $fetchphoto['name']; ?></td>
                  <td><?php echo $fetchphoto['photo_desc']; ?></td>
                  <td><?php echo $fetchphoto['image']; ?></td>
                  <td><?php echo $fetchphoto['date']; ?></td>
                  <td>

                    <a class="btn btn-sm btn-dark btn-center" type="submit" data-coreui-toggle="modal" data-coreui-target="#update_photo<?php echo $fetchphoto['id'] ?>">Update</a>

                    <a class="btn btn-sm btn-outline-danger btn-center" href="../coding.php?delete_photo=<?php echo $fetchphoto['id']; ?>">Delete</a>

                  </td>
                </tr>
              </tbody>

              <!-- Photo Updating Modal -->
              <div class="tab-content rounded-bottom">
                <div class="tab-pane p-0 active preview" role="tabpanel" id="preview-224">
                  <div class="modal fade" id="update_photo<?php echo $fetchphoto['id'] ?>" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLiveLabel">Update Picture</h5>
                          <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">

                          <form action="" method="POST" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                              <input class="form-control" type="hidden" name="id" value="<?php echo $fetchphoto['id']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input class="form-control" type="text" name="photo_name" value="<?php echo $fetchphoto['name']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input class="form-control" type="text" name="photo_desc" value="<?php echo $fetchphoto['photo_desc']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input class="form-control" type="file" id="formFile" name="update_photo_img" value="<?php echo $fetchphoto['image']; ?>">
                            </div>

                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
                              <button class="btn btn-dark" type="submit" name="update_photo">Save & Close</button>
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

              if (isset($_POST['update_photo'])) {
                include "../config.php";
                $photo_img = $_FILES['update_photo_img']['name'];
                $photo_size = $_FILES['update_photo_img']['size'];
                $photo_tmp_name = $_FILES['update_photo_img']['tmp_name'];

                $extension = pathinfo($photo_img,PATHINFO_EXTENSION);
                $destination = "web_images/photography/".$photo_img;

                if ($photo_size <= 5000000) {
                  if ($extension == "jpg" OR $extension == "png" OR $extension == "jpeg" OR $extension == "JPG" OR $extension == "JPEG" OR $extension == "PNG") {
                    if (move_uploaded_file($photo_tmp_name,$destination)) {

                      $id = $_POST['id'];
                      $photo_name = $_POST['photo_name'];
                      $photo_desc = $_POST['photo_desc'];
                      
                      $update_photo = mysqli_query($connect, "UPDATE events_pics SET name = '$photo_name',  photo_desc = '$photo_desc', image = '$photo_img' WHERE id = '$id' ");

                        echo "<script>
                                alert('Data updated successfully!');
                                location.assign('validate.php?events_pics');
                        </script>";
                        // header("location:cPanel/validate.php?events_pics");
                      
                    }else{
                      echo "<script>
                                alert('Data not updated!');
                                location.assign('validate.php?events_pics');
                      </script>";
                    }
                  }else{
                      echo "<script>
                                alert('Photo extension must be jpg, png or jpeg format!');
                                location.assign('validate.php?events_pics');
                      </script>";
                    }
                }else{
                      echo "<script>
                                alert('Photo size must be less than 5 MB or equal to 5 MB!');
                                location.assign('validate.php?events_pics');
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

  <!-- Photo Adding Modal -->
  <div class="tab-content rounded-bottom">
    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-224">
      <div class="modal fade" id="add_photo" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLiveLabel">Add New Picture</h5>
              <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <form action="../coding.php" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3">
                  <input class="form-control" type="text" name="photo_name" placeholder="Enter Photo Name">
                </div>
                
                <div class="mb-3">
                  <input class="form-control" type="textarea" name="photo_desc" placeholder="Description">
                </div>
                
                <div class="mb-3">
                  <input class="form-control" type="file" id="formFile" name="upload_photo">
                </div>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
                  <button class="btn btn-dark" type="submit" name="add_photo">Add & Close</button>
                </div>
                
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div> 