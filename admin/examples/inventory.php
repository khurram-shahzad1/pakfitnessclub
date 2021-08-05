<?php include '../include/header.php';
include '../../assets/db.php';
?>

<!-- End Navbar -->
<div class="panel-header panel-header-lg">
<div class="panel-header">
        <div class="header text-center">
          <h2 class="title">Inventory</h2>
        </div>
      </div>
</div>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
               <!-- <div class="card-header"> -->
              
              <!-- </div>  -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th> Id </th>
                      <th> Category</th>
                      <th> Name</th>
                      <th >Image </th>
                      <th >Stock </th>
                      <th >Stock In </th>
                      <th >Stock Out </th>
                    </thead>
                    <?php 
                    $s = 0;
                    $products =mysqli_query($conn,"SELECT * FROM products ");
                    while ($data = mysqli_fetch_array($products)) {
                        $s++;
                        $catId = $data['cat_id'];
                        $fetchCat = mysqli_query($conn, "SELECT * FROM categories WHERE id = '$catId'");
                        $fetchCat = mysqli_fetch_array($fetchCat);
                ?>
                    <tbody>
                    <tr>
                <td><?php echo $s;?></td>
                <td><?php echo $fetchCat['name'];?></td>
                <td><?php echo $data['name'];?></td>
                <td><img src="../../assets/img/product/<?php echo $data['image'];?>" width="100px" alt=""></td>
                <td><?php echo $data['inventory'];?></td>
                <td>
                    <input type="number" class="form-control" style="width:100px" id="i<?php echo $data['id'];?>">
                    <br>
                    <button class="btn btn-sm btn-warning addInventory" pid="<?php echo $data['id'];?>">Save</button>
                </td>
                <td>
                    <input type="number" class="form-control" style="width:100px" id="">
                    <br>
                    <button class="btn btn-sm btn-warning delInventory" pid="<?php echo $data['id'];?>">Save</button>
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
        $('.addInventory').on('click',(function(e) {
			e.preventDefault();
			var pid = $(this).attr('pid');
            var val = $('#i'+pid).val();
            console.log(val);
			$.ajax({
				type:'POST',
				url: '../core/actions.php',
				data:{addInventory:pid, value:val},
				success:function(data){
					console.log(data);
                    location.reload();
				}
			});
		}));
        $('.delInventory').on('click',(function(e) {
			e.preventDefault();
			var pid = $(this).attr('pid');
            // var val = $('#i'+pid).val();
            var val = $(this).parent().children('input').val();
            console.log(val);
			$.ajax({
				type:'POST',
				url: '../core/actions.php',
				data:{delInventory:pid, value:val},
				success:function(data){
					console.log(data);
                    location.reload();
				}
			});
		}));
    })

</script>