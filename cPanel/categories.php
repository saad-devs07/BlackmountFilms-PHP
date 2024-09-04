
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
      <li class="breadcrumb-item active" aria-current="page">Categories</li>
    </ol>
  </nav>

  <div class="card">

    <div class="card-header">
      <div class="row">

        <div class="col-md-10 mt-2">
          <h5 class="card-title">Categories Table</h5>
        </div>

        <div class="col-md-2 mt-1">
          <button class="btn btn-sm btn-dark" type="button" data-coreui-toggle="modal" data-coreui-target="#add_category">Add New Category</button>
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
                $fetchallcategory = mysqli_query($connect, "SELECT * FROM categories");
                while ($fetchcategory = mysqli_fetch_assoc($fetchallcategory)) {
              ?>

              <tbody class="text-center">
                <tr>
                  <td></td>
                  <td><?php echo $fetchcategory['id']; ?></td>
                  <td><?php echo $fetchcategory['name']; ?></td>
                  <td><?php echo $fetchcategory['cat_desc']; ?></td>
                  <td><?php echo $fetchcategory['image']; ?></td>
                  <td><?php echo $fetchcategory['Date']; ?></td>
                  <td>

                    <a href="" class="btn btn-sm btn-dark btn-center" type="submit" data-coreui-toggle="modal" data-coreui-target="#update_category<?php echo $fetchcategory['id'] ?>">Update</a>

                    <a class="btn btn-sm btn-outline-danger btn-center" href="../coding.php?delete_category=<?php echo $fetchcategory['id']; ?>">Delete</a>

                  </td>
                </tr>
              </tbody>

              <!-- Clients Updating Modal -->
              <div class="tab-content rounded-bottom">
                <div class="tab-pane p-0 active preview" role="tabpanel" id="preview-224">
                  <div class="modal fade" id="update_category<?php echo $fetchcategory['id'] ?>" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLiveLabel">Update Category</h5>
                          <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">

                          <form action="" method="POST" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                              <input class="form-control" type="hidden" name="id" placeholder="Enter Package Name" value="<?php echo $fetchcategory['id']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input class="form-control" type="text" name="category_name" placeholder="Enter Client Name" value="<?php echo $fetchcategory['name']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input class="form-control" type="text" name="category_desc" placeholder="Enter Client Name" value="<?php echo $fetchcategory['cat_desc']; ?>">
                            </div>
                            
                            <div class="mb-3">
                              <input class="form-control" type="file" id="formFile" name="update_category_img" value="<?php echo $fetchcategory['image']; ?>">
                            </div>

                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
                              <button class="btn btn-dark" type="submit" name="update_category">Update & Close</button>
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

              if (isset($_POST['update_category'])) {
                include "../config.php";
                $cat_img = $_FILES['update_category_img']['name'];
                $cat_size = $_FILES['update_category_img']['size'];
                $cat_tmp_name = $_FILES['update_category_img']['tmp_name'];

                $extention = pathinfo($cat_img,PATHINFO_EXTENSION);
                $destination = "web_images/categories/".$cat_img;

                if ($cat_size <= 3000000) {
                  if ($extention == "jpg" OR $extention == "png" OR $extention == "jpeg") {
                    if (move_uploaded_file($cat_tmp_name,$destination)) {

                      $id = $_POST['id'];
                      $category_name = $_POST['category_name'];
                      $category_desc = $_POST['category_desc'];
                      
                      $update_category = mysqli_query($connect, "UPDATE categories SET name = '$category_name',  cat_desc = '$category_desc', image = '$cat_img' WHERE id = '$id' ");

                            echo "<script>
                                    alert('Category Updated Successfully!');
                                    location.assign('validate.php?categories');
                            </script>";
                      
                    }else{
                      echo "<script>
                              alert('Category Not Updated');
                                    location.assign('validate.php?categories');
                      </script>";
                    }
                  }else{
                      echo "<script>
                              alert('Picture Must Be in jpg, jpeg or png');
                                    location.assign('validate.php?categories');
                      </script>";
                    }
                }else{
                      echo "<script>
                              alert('Picture Size Must Be Lass Than 3MB');
                                    location.assign('validate.php?categories');
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

  <!-- Categories Adding Modal -->
  <div class="tab-content rounded-bottom">
    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-224">
      <div class="modal fade" id="add_category" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLiveLabel">Add New Category</h5>
              <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <form action="../coding.php" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3">
                  <input class="form-control" type="text" name="category_name" placeholder="Enter Category Name">
                </div>
                
                <div class="mb-3">
                  <input class="form-control" type="textarea" name="cat_desc" placeholder="Description">
                </div>
                
                <div class="mb-3">
                  <input class="form-control" type="file" id="formFile" name="upload_category">
                </div>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
                  <button class="btn btn-dark" type="submit" name="add_category">Add & Close</button>
                </div>
                
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div> 