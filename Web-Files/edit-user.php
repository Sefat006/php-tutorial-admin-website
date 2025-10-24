<?php 
  require_once "../Function/function.php";

  $id = $_GET['e'];
  $sel = "SELECT * FROM users WHERE user_id='$id'";
  $QR = mysqli_query($connect, $sel);
  $data = mysqli_fetch_array($QR);

  if(!empty($_POST)){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $photo = $_FILES['photo'];

    $update = "UPDATE users SET user_name='$name', user_phone='$phone', user_email='$email', role_id='$role' WHERE user_id='$id'";

    if(mysqli_query($connect, $update)){
    if($photo['name'] !== ''){
      $photoName = 'User_'.time().'_'.rand(60000,94329430).'.'.pathinfo($photo['name'],PATHINFO_EXTENSION);
      $updating = "UPDATE users SET user_photo='$photoName' WHERE user_id='$id'";

      if(mysqli_query($connect, $updating)){
        move_uploaded_file($photo['tmp_name'], '../Uploads/'.$photoName);
        header("Location: all-user.php");
      }else{
        echo "image update failed";
      }
    }
      // echo "Update successful";
      header("Location: all-user.php");
    }
  }

  needLogged();
  get_header();
  get_sidebar();
?>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="card mb-3">
                                  <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8 card_title_part">
                                            <i class="fab fa-gg-circle"></i>Update User Information
                                        </div>  
                                        <div class="col-md-4 card_button_part">
                                            <a href="all-user.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
                                        </div>  
                                    </div>
                                  </div>
                                  <div class="card-body">
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="name" value="<?php echo $data['user_name'] ?>">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="phone" value="<?php echo $data['user_phone'] ?>">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="email" class="form-control form_control" id="" name="email" value="<?php echo $data['user_email'] ?>">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">User Role<span class="req_star">*</span>:</label>
                                        <div class="col-sm-4">

                                          <select class="form-control form_control" id="" name="role">
                                            <option>Select Role</option>
                                            <!-- dynamic use of data/fetch -->
                                            <?php 
                                              $sel = "SELECT * FROM roles ORDER BY role_id ASC";
                                              $QR = mysqli_query($connect, $sel);
                                              while( $urole=mysqli_fetch_array($QR)){
                                            ?>
                                            <option 
                                            value="<?php echo $urole['role_id'] ?>"
                                            <?php 
                                              if($urole['role_id']==$data['role_id']){
                                                echo 'selected';
                                              }
                                            ?>
                                            >
                                              <?php echo $urole['role_name'] ?>
                                            </option>
                                            <?php } ?>
                                            <!-- end -->
                                          </select>

                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
                                        <div class="col-sm-4">
                                          <input type="file" class="form-control form_control" id="" name="photo">
                                        </div>
                                      </div>
                                  </div>
                                  <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
                                  </div>  
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php 
  get_footer();
?>