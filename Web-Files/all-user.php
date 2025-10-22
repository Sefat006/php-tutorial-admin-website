<?php
  require_once "../Function/function.php";
  get_header();
  get_sidebar();

  //counting how many users is there so far
  $count_query = "SELECT COUNT(*) AS total_users FROM users";
  $count_result = mysqli_query($connect, $count_query);
  $count_data = mysqli_fetch_assoc($count_result);
  $total_users = $count_data['total_users'];
?>

  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>All User Information
                  </div>  
                  <div class="col-md-4 card_button_part">
                      <a href="add-user.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add User</a>
                  </div>  
              </div>
            </div>
            <div class="card-body">
              <h1>total users: <?php echo $total_users?></h1>
              <table class="table table-bordered table-striped table-hover custom_table">
                <thead class="table-dark">
                  <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- dynamic use of data/fetch -->
                  <?php
                  $i=1;
                    $sel="SELECT * FROM users ORDER BY user_id DESC";
                    $QR=mysqli_query($connect, $sel);
                    while($data=mysqli_fetch_array($QR)){
                  ?>

                  <tr>
                    <td><?= $i++?></td>
                    <td><?php echo $data['user_name']    ?></td>
                    <td><?php echo $data['user_phone']    ?></td>
                    <td><?php echo $data['user_email']    ?></td>
                    <td><?php echo $data['username']    ?></td>
                    <td>---</td>
                    <td>
                        <div class="dropdown-group" role="group">
                          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="view-user.php?v=<?php echo $data['user_id']; ?>">View</a></li>
                            <li><a class="dropdown-item" href="edit-user.php">Edit</a></li>
                            <li><a class="dropdown-item" href="delete.php?d=<?php echo $data['user_id']; ?>">Delete</a></li>
                          </ul>
                        </div>
                    </td>
                  </tr>
                  
                  <?php //php
                    }
                  ?>

                </tbody>
              </table>
            </div>
            <div class="card-footer">
              <div class="btn-group" role="group" aria-label="Button group">
                <button type="button" class="btn btn-sm btn-dark">Print</button>
                <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                <button type="button" class="btn btn-sm btn-dark">Excel</button>
              </div>
            </div>  
          </div>
      </div>
  </div>
</div>
</div>
</div>
</section>


<?php
    get_footer();
?>