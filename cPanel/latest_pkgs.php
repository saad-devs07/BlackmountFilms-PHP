
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
      <li class="breadcrumb-item active" aria-current="page">Latest Packages</li>
    </ol>
  </nav>

  <div class="card">

    <div class="card-header">
      <div class="row">

        <div class="col-md-10 mt-2">
          <h5 class="card-title">Latest Packages Table</h5>
        </div>

        <div class="col-md-2 mt-1">
          <button class="btn btn-sm btn-dark" type="button" data-coreui-toggle="modal" data-coreui-target="#staticBackdropLive">Add New Package</button>
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
                  <th>ID</th>
                  <th>Name</th>
                  <th>D-1</th>
                  <th>D-2</th>
                  <th>D-3</th>
                  <th>D-4</th>
                  <th>D-5</th>
                  <th>D-6</th>
                  <th>D-7</th>
                  <th>D-8</th>
                  <th>D-9</th>
                  <th>D-10</th>
                  <th>Valid Date</th>
                  <th>Image</th>
                  <th>Uploading Date</th>
                  <th>Action</th>
                </tr>
              </thead>

              <?php
                include "../config.php";
                $fetchallpkgs = mysqli_query($connect, "SELECT * FROM latest_pkgs");
                while ($fetchpkgs = mysqli_fetch_assoc($fetchallpkgs)) {
              ?>

              <tbody>
                <tr>
                  <td><?php echo $fetchpkgs['ID']; ?></td>
                  <td><?php echo $fetchpkgs['Pkg_Name']; ?></td>
                  <td><?php echo $fetchpkgs['d1']; ?></td>
                  <td><?php echo $fetchpkgs['d2']; ?></td>
                  <td><?php echo $fetchpkgs['d3']; ?></td>
                  <td><?php echo $fetchpkgs['d4']; ?></td>
                  <td><?php echo $fetchpkgs['d5']; ?></td>
                  <td><?php echo $fetchpkgs['d6']; ?></td>
                  <td><?php echo $fetchpkgs['d7']; ?></td>
                  <td><?php echo $fetchpkgs['d8']; ?></td>
                  <td><?php echo $fetchpkgs['d9']; ?></td>
                  <td><?php echo $fetchpkgs['d10']; ?></td>
                  <td><?php echo $fetchpkgs['valid_date']; ?></td>
                  <td><?php echo $fetchpkgs['Pkg_Image']; ?></td>
                  <td><?php echo $fetchpkgs['Date']; ?></td>
                  <td>

                    <a href="" class="btn btn-sm btn-dark btn-center" type="submit" data-coreui-toggle="modal" data-coreui-target="#update_package<?php echo $fetchpkgs['ID'] ?>">Update</a>

                    <a class="btn btn-sm btn-outline-danger btn-center" href="../coding.php?delete_pkg=<?php echo $fetchpkgs['ID']; ?>">Delete</a>

                  </td>
                </tr>
              </tbody>

              <!-- Packages Updating Modal -->
              <div class="tab-content rounded-bottom">
                <div class="tab-pane p-0 active preview" role="tabpanel" id="preview-224">
                  <div class="modal fade" id="update_package<?php echo $fetchpkgs['ID'] ?>" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLiveLabel">Update Package</h5>
                          <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">

                          <form action="" method="POST" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                              <input class="form-control" type="hidden" name="id" placeholder="Enter Package Name" value="<?php echo $fetchpkgs['ID']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input class="form-control" type="text" name="p_name" placeholder="Enter Package Name" value="<?php echo $fetchpkgs['Pkg_Name']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input type="text" class="form-control" name="d1" placeholder="Description 1" value="<?php echo $fetchpkgs['d1']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input type="text" class="form-control" name="d2" placeholder="Description 2" value="<?php echo $fetchpkgs['d2']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input type="text" class="form-control" name="d3" placeholder="Description 3" value="<?php echo $fetchpkgs['d3']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input type="text" class="form-control" name="d4" placeholder="Description 4" value="<?php echo $fetchpkgs['d4']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input type="text" class="form-control" name="d5" placeholder="Description 5" value="<?php echo $fetchpkgs['d5']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input type="text" class="form-control" name="d6" placeholder="Description 6" value="<?php echo $fetchpkgs['d6']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input type="text" class="form-control" name="d7" placeholder="Description 7" value="<?php echo $fetchpkgs['d7']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input type="text" class="form-control" name="d8" placeholder="Description 8" value="<?php echo $fetchpkgs['d8']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input type="text" class="form-control" name="d9" placeholder="Description 9" value="<?php echo $fetchpkgs['d9']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input type="text" class="form-control" name="d10" placeholder="Description 10" value="<?php echo $fetchpkgs['d10']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input type="text" class="form-control" name="v_date" placeholder="Valid Date" value="<?php echo $fetchpkgs['valid_date']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input class="form-control" type="file" id="formFile" name="update_img" value="<?php echo $fetchpkgs['Pkg_Image']; ?>">
                            </div>

                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
                              <button class="btn btn-dark" type="submit" name="update_pkg">Update & Close</button>
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

              if (isset($_POST['update_pkg'])) {
                include "../config.php";
                $p_img = $_FILES['update_img']['name'];
                $p_size = $_FILES['update_img']['size'];
                $tmp_name = $_FILES['update_img']['tmp_name'];

                $extention = pathinfo($p_img,PATHINFO_EXTENSION);
                $destination = "web_images/latest_pkgs/".$p_img;

                if ($p_size <= 3000000) {
                  if ($extention == "jpg" OR $extention == "png" OR $extention == "jpeg") {
                    if (move_uploaded_file($tmp_name,$destination)) {

                      $id = $_POST['id'];
                      $p_name = $_POST['p_name'];
                      $d1 = $_POST['d1'];
                      $d2 = $_POST['d2'];
                      $d3 = $_POST['d3'];
                      $d4 = $_POST['d4'];
                      $d5 = $_POST['d5'];
                      $d6 = $_POST['d6'];
                      $d7 = $_POST['d7'];
                      $d8 = $_POST['d8'];
                      $d9 = $_POST['d9'];
                      $d10 = $_POST['d10'];
                      $v_date = $_POST['v_date'];
                      
                      $update_pkg = mysqli_query($connect, "UPDATE latest_pkgs SET Pkg_Name = '$p_name', d1 = '$d1', d2 = '$d2', d3 = '$d3', d4 = '$d4', d5 = '$d5', d6 = '$d6', d7 = '$d7', d8 = '$d8', d9 = '$d9', d10 = '$d10', valid_date = '$v_date', Pkg_Image = '$p_img' WHERE ID = '$id' ");

                      echo "<script>
                              alert('Package Updated Successfully!');
                              location.assign('validate.php?latest_pkgs');
                      </script>";
                      
                    }else{
                      echo "<script>
                              alert('Package Not Updated');
                      </script>";
                    }
                  }else{
                      echo "<script>
                              alert('Picture Must Be in jpg, jpeg or png');
                              location.assign('validate.php?latest_pkgs');
                      </script>";
                    }
                }else{
                      echo "<script>
                              alert('Picture Size Must Be Lass Than 3MB');
                              location.assign('validate.php?latest_pkgs');
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





  <!-- Packages Adding Modal -->
  <div class="tab-content rounded-bottom">
    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-224">
      <div class="modal fade" id="staticBackdropLive" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLiveLabel">Add New Package</h5>
              <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <form action="../coding.php" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3">
                  <input class="form-control" type="text" name="p_name" placeholder="Enter Package Name">
                </div>
                
                <div class="mb-3">
                  <input type="text" class="form-control" name="d1" placeholder="Description 1">
                </div>
                
                <div class="mb-3">
                  <input type="text" class="form-control" name="d2" placeholder="Description 2">
                </div>
                
                <div class="mb-3">
                  <input type="text" class="form-control" name="d3" placeholder="Description 3">
                </div>
                
                <div class="mb-3">
                  <input type="text" class="form-control" name="d4" placeholder="Description 4">
                </div>
                
                <div class="mb-3">
                  <input type="text" class="form-control" name="d5" placeholder="Description 5">
                </div>
                
                <div class="mb-3">
                  <input type="text" class="form-control" name="d6" placeholder="Description 6">
                </div>
                
                <div class="mb-3">
                  <input type="text" class="form-control" name="d7" placeholder="Description 7">
                </div>
                
                <div class="mb-3">
                  <input type="text" class="form-control" name="d8" placeholder="Description 8">
                </div>
                
                <div class="mb-3">
                  <input type="text" class="form-control" name="d9" placeholder="Description 9">
                </div>
                
                <div class="mb-3">
                  <input type="text" class="form-control" name="d10" placeholder="Description 10">
                </div>
                
                <div class="mb-3">
                  <input type="text" class="form-control" name="v_date" placeholder="Valid Date">
                </div>
                
                <div class="mb-3">
                  <input class="form-control" type="file" id="formFile" name="upload_pkg">
                </div>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
                  <button class="btn btn-dark" type="submit" name="add_pkg">Add & Close</button>
                </div>
                
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div> 