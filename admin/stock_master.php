<?php 
include "header.php";
include "../user/connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html"  class="tip-bottom"><i class="icon-home"></i>
            Stock Master</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
    <div class="span12">
      
       
       </div>
       <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sr No</th>
                  <th>Product Company</th>
                  <th>Product Name</th>
                  <th>Product Unit</th>
                  <th>Packing size</th>
                  <th>Product Quantity</th>
                  <th>Product Selling Price</th>
                  <th>Edit</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $count=0;
                $res=mysqli_query($link,"select * from stock_master");
                while($row=mysqli_fetch_array($res)){
                    $count=$count+1;
                  ?>
                  <tr class="odd gradeX">
                  <td><center><?php echo $count;?></center></td>
                  <td><center><?php echo $row["product_company"];?></center></td>
                  <td><center><?php echo $row["product_name"];?></center></td>
                  <td><center><?php echo $row["product_unit"];?></center></td>
                  <td><center><?php echo $row["packing_size"];?></center></td>
                  <td><center><?php echo $row["product_qty"];?></center></td>
                  <td><center><?php echo $row["product_selling_price"];?></center></td>
                  <td><center><a href="edit_stock_master.php?id=<?php echo $row["id"]; ?>"  style="color:green">Edit</a></center></td>
                  </tr>
                 <?php
                }
                ?>
                </tbody>
            </table>
          </div>
    </div>
</div>
</div>
</div>

    
<!--end-main-container-part-->
<?php include "footer.php";?>
