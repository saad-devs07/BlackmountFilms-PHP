<!-- Login - Register Code -->
<?php
// Register Code
if (isset($_POST['register'])) {
	include "config.php";
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$role = "client";

	if ($password == $cpassword) {
		$insert = mysqli_query($connect, "INSERT INTO register (Name, Email, Password, Role) VALUES ('$name', '$email', '$password', '$role')");
		echo "<script>
				alert('Registered Successfully!');
				location.assign('cPanel/index.php');
			</script>";

	}else{
		echo "<script>
				alert('Password & Confirm Password Must Match!');
				location.assign('cPanel/register.php');
			</script>";
	}
}

// Login Code
if (isset($_POST['login'])) {
	include "config.php";
	$email = $_POST['email'];
	$password = $_POST['password'];
	$fetchdata = mysqli_query($connect, "SELECT * FROM register WHERE Email = '$email' AND Password = '$password' ");

	if ($isdataexist = mysqli_num_rows($fetchdata) > 0) {
		while ($data = mysqli_fetch_assoc($fetchdata) ) {
			
		if ($data['Role'] == "admin") {

			session_start();
			$_SESSION['id'] = $data['ID'];
			$_SESSION['name'] = $data['Name'];
			$_SESSION['email'] = $data['Email'];
			header('location:cPanel/validate.php?dashboard');

		}else{
		echo "<script>
					alert('Blackmount Website Coming Soon!');
					location.assign('cPanel/index.php');
				</script>";
			}
		} 
	}else{
		echo "<script>
					alert('Account Not Exist!');
					location.assign('cPanel/register.php');
				</script>";
		}
}
?>

<!-- Latest Packages Code -->
<?php
// Package Modal Code
if (isset($_POST['add_pkg'])) {
  include "config.php";
  $pkg_img = $_FILES['upload_pkg']['name'];
  $pkg_size = $_FILES['upload_pkg']['size'];
  $tmp_name = $_FILES['upload_pkg']['tmp_name'];

  $extention = pathinfo($pkg_img,PATHINFO_EXTENSION);
  $destination = "cPanel/web_images/latest_pkgs/".$pkg_img;

  if ($pkg_size <= 3000000) {
    if ($extention == "jpg" OR $extention == "png" OR $extention == "jpeg") {
      if (move_uploaded_file($tmp_name,$destination)) {

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
        
        $insert_pkg = mysqli_query($connect, "INSERT INTO latest_pkgs (Pkg_Name,d1,d2,d3,d4,d5,d6,d7,d8,d9,d10,valid_date,Pkg_Image) 
        VALUES('$p_name', '$d1', '$d2', '$d3', '$d4', '$d5', '$d6', '$d7', '$d8', '$d9', '$d10', '$v_date', '$pkg_img')");

        echo "<script>
                alert('Package Uploaded Successfully');
                location.assign('cPanel/validate.php?latest_pkgs');
        </script>";
      }else{
        echo "<script>
                alert('Package Not Uploaded');
                location.assign('cPanel/validate.php?latest_pkgs');
        </script>";
      }
    }else{
        echo "<script>
                alert('Picture Must Be in jpg, jpeg or png');
                location.assign('cPanel/validate.php?latest_pkgs');
        </script>";
      }
  }else{
        echo "<script>
                alert('Picture Size Must Be Lass Than 3MB');
                location.assign('cPanel/validate.php?latest_pkgs');
        </script>";
      }
}

// Package Deleting Code
if (isset($_GET['delete_pkg'])) {
	include "config.php";
	$delete = $_GET['delete_pkg'];
	$delete_pkg = mysqli_query($connect, "DELETE FROM latest_pkgs WHERE ID = '$delete' ");

	echo "<script>
				alert('Data Deleted Successfully!');
                location.assign('cPanel/validate.php?latest_pkgs');
			</script>";
}

?>

<!-- Clients Code -->
<?php
// Clients Modal Code
if (isset($_POST['add_client'])) {
  include "config.php";
  $cl_img = $_FILES['upload_client']['name'];
  $cl_size = $_FILES['upload_client']['size'];
  $cl_tmp_name = $_FILES['upload_client']['tmp_name'];

  $extention = pathinfo($cl_img,PATHINFO_EXTENSION);
  $destination = "cPanel/web_images/clients/".$cl_img;

  if ($cl_size <= 3000000) {
    if ($extention == "jpg" OR $extention == "png" OR $extention == "jpeg") {
      if (move_uploaded_file($cl_tmp_name,$destination)) {

				$client_name = $_POST['client_name'];
        
        $insert_client = mysqli_query($connect, "INSERT INTO clients (Name,Image) 
        VALUES('$client_name','$cl_img')");

        echo "<script>
                alert('Client Uploaded Successfully');
                location.assign('cPanel/validate.php?clients');
        </script>";
      }else{
        echo "<script>
                alert('Client Not Uploaded');
                location.assign('cPanel/validate.php?clients');
        </script>";
      }
    }else{
        echo "<script>
                alert('Picture Must Be in jpg, jpeg or png');
                location.assign('cPanel/validate.php?clients');
        </script>";
      }
  }else{
        echo "<script>
                alert('Picture Size Must Be Lass Than 3MB');
                location.assign('cPanel/validate.php?clients');
        </script>";
      }
}

// Clients Deleting Code
if (isset($_GET['delete_client'])) {
	include "config.php";
	$delete = $_GET['delete_client'];
	$delete_client = mysqli_query($connect, "DELETE FROM clients WHERE ID = '$delete' ");

	echo "<script>
				alert('Data Deleted Successfully!');
                location.assign('cPanel/validate.php?clients');
			</script>";
}

?>

<!-- Categories Code -->
<?php
// Categories Modal Code
if (isset($_POST['add_category'])) {
  include "config.php";
  $cat_img = $_FILES['upload_category']['name'];
  $cat_size = $_FILES['upload_category']['size'];
  $cat_tmp_name = $_FILES['upload_category']['tmp_name'];

  $extention = pathinfo($cat_img,PATHINFO_EXTENSION);
  $destination = "cPanel/web_images/categories/".$cat_img;

  if ($cat_size <= 3000000) {
    if ($extention == "jpg" OR $extention == "png" OR $extention == "jpeg") {
      if (move_uploaded_file($cat_tmp_name,$destination)) {

				$category_name = $_POST['category_name'];
				$cat_desc = $_POST['cat_desc'];
			        
			  $insert_category = mysqli_query($connect, "INSERT INTO categories (name,cat_desc,image) 
			  VALUES('$category_name','$cat_desc','$cat_img')");

			  echo "<script>
			          alert('Category Uploaded Successfully');
			          location.assign('cPanel/validate.php?categories');
			  </script>";

      }else{
        echo "<script>
                alert('Category Not Uploaded');
			          location.assign('cPanel/validate.php?categories');
        </script>";
      }
    }else{
        echo "<script>
                alert('Picture Must Be in jpg, jpeg or png');
			          location.assign('cPanel/validate.php?categories');
        </script>";
      }
  }else{
        echo "<script>
                alert('Picture Size Must Be Lass Than 3MB');
			          location.assign('cPanel/validate.php?categories');
        </script>";
      }
}


// Categories Deleting Code
if (isset($_GET['delete_category'])) {
	include "config.php";
	$delete = $_GET['delete_category'];
	$delete_category = mysqli_query($connect, "DELETE FROM categories WHERE id = '$delete' ");

	echo "<script>
				alert('Data Deleted Successfully!');
                location.assign('cPanel/validate.php?categories');
			</script>";
}

?>

<!-- Photography Code -->
<?php 

if(isset($_POST['add_photo'])){
  include "config.php";
  $photo_img = $_FILES['upload_photo']['name'];
  $photo_size = $_FILES['upload_photo']['size'];
  $photo_tmp_name =$_FILES['upload_photo']['tmp_name'];

  $extension = pathinfo($photo_img,PATHINFO_EXTENSION);
  $destination = "cPanel/web_images/photography/".$photo_img;

  if($photo_size <= 5000000){
    if($extension == "jpg" OR $extension == "png" OR $extension == "jpeg" OR $extension == "JPG" OR $extension == "JPEG" OR $extension == "PNG"){
      if(move_uploaded_file($photo_tmp_name,$destination)){

        $photo_name = $_POST['photo_name'];
        $photo_desc = $_POST['photo_desc'];

        $insert_photo = mysqli_query($connect, "INSERT INTO events_pics (name, photo_desc, image) VALUES ('$photo_name', '$photo_desc', '$photo_img') ");

        echo "<script>
                alert('Data uploaded successfully!');
                location.assign('cPanel/validate.php?events_pics');
              </script>";
      }else{
        echo "<script>
                alert('Data not uploaded!');
                location.assign('cPanel/validate.php?events_pics');
              </script>";
      }
    }else{
      echo "<script>
                alert('Photo extension must be jpg, png or jpeg format!');
                location.assign('cPanel/validate.php?events_pics');
              </script>";
    }
  }else{
    echo "<script>
                alert('Photo size must be less than 5 MB or equal to 5 MB!');
                location.assign('cPanel/validate.php?events_pics');
              </script>";
  }
}

// Photo Deleting Code
if(isset($_GET['delete_photo'])){
  include "config.php";
  $delete_photo = $_GET['delete_photo'];
  $delete = mysqli_query($connect, "DELETE FROM events_pics WHERE id = '$delete_photo' ");
  
  // echo "<script>
  //               alert('Data deleted successfully!');
  //               location.assign('cPanel/validate.php?events_pics');
  //             </script>";
  header("location:cPanel/validate.php?events_pics");

}

?>