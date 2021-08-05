<?php include '../include/header.php';
    include '../../assets/db.php';

?>


<!-- End Navbar -->
<div class="panel-header panel-header-lg">
  <div class="panel-header">
    <div class="header text-center">
      <h2 class="title">Add new category here</h2>

    </div>
  </div>
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <form id="formcat">
            <div class="row">
              <div class="col-md-5 pr-1">
                <h4 class="card-title">Add category </h4>
                <div class="alert alert-success alert-dismissible" style="display:none;" id="alertSuccess">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Success!</strong> Indicates a successful or positive action.
                </div>
                <div class="alert alert-danger alert-dismissible" id="alertFailed" style="display:none;">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Not Success!</strong> Indicates a not successful or negtive action.
                </div>
              </div>
              <div class="col-md-5 p-2 ">
                <div class="form-group">
                  <!-- <label>Add category</label> -->
                  <input type="text" name="name" class="form-control" placeholder="Add category">
                  <input type="hidden" name="newCategory">

                </div>
              </div>
              <div class="col-md-2 pl-1">
                <input type="submit" class="btn btn-primary" value="Submit">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th> Id </th>
              <th> Name</th>
              <th> TimeStemp</th>
              <th>Update </th>
              <th>Delete </th>
            </thead>
            <?php 
                        $s = 0;
                        $sql ="SELECT * FROM categories ";
                        $query =mysqli_query($conn,$sql);
                        while ($data = mysqli_fetch_array($query)) {
                        $s++;
                    ?>
            <tbody>
              <tr>
                <td><?php echo $data['id'];?></td>
                <td><?php echo $data['name'];?></td>
                <td><?php echo $data['timestamp'];?></td>
                <td> <a href="edit_category.php?id=<?php echo $data['id'];?>">
                    <button class="btn btn-info">Update</button>
                  </a>
                </td>
                <td> <button class="delid btn btn-danger" delid="<?php echo $data['id']?>">Delete</button>
                </td>
              </tr>
            </tbody>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
</div>


<?php include '../include/footer.php'?>
<script>
  $(function () {
    $('#formcat').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        url: '../core/actions.php',
        type: 'POST',
        data: $('#formcat').serialize(),
        success: function (val) {
          console.log(val);
          if (val == "1") {
            $("#alertSuccess").fadeIn();
            $("#alertSuccess").fadeOut(3000);
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else {
            $("#alertFailed").fadeIn();
            $("#alertFailed").fadeOut(3000);
          }
        }
      })
    })
    $('.delid').on('click', function (e) {
      e.preventDefault();
      var id = $(this).attr("delid");
      $.ajax({
        url: '../core/actions.php',
        type: 'POST',
        data: {
          delcat: 1,
          id: id
        },
        success: function (val) {
          console.log(val);
          if (val == "1") {
            $("#alertSuccess").fadeIn();
            $("#alertSuccess").fadeOut(2000);
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else {
            $("#alertFailed").fadeIn();
            $("#alertFailed").fadeOut(2000);
          }
        }
      })
    })
  })
</script>