<?php 
session_start();
if(!isset($_SESSION["admin"])){
  ?>
  <script type="text/javascript">
  window.location="index.php";
  </script>
  <?php
}
?>
<?php 
include "header.php";
include "../user/connection.php";
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html"  class="tip-bottom"><i class="icon-home"></i>
            Return Products List</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        
        <form class="form-inline" action="" name="form1" method="post">
                    <div class="form-group">
                        <label for="email">Select Company Name</label>
                    <select class="form-control" name="company_name">
                    <option>select</option>
                <?php
                $res=mysqli_query($link,"select * from party_info");
                while($row=mysqli_fetch_array($res)){
                  echo "<option>";
                  echo $row["businessname"];
                  echo "</option>";
                }
                ?>
                </select>    
                </div>
                    
                <button type="submit" name="submit1" class="btn btn-success">Show Return Purchase From This Company</button>
                <button type="button" name="submit2" class="btn btn-warning" onclick="window.location.href=window.location.href">Clear Search</button>
                </form>
                <br>
                <?php 
                    if(isset($_POST["submit1"])){
                        ?>
                          <table class="table  table-bordered">
            <tr>
                <th>Company Name</th>
                <th> Product Name</th>
                <th> Unit </th>
                <th> Packing Size</th>
                <th> Quantity </th>
                <th> Price </th>
                <th> Party Name </th>
                <th> Purchase Type </th>
                <th> Expiry Date </th>
                <th> Purchase Date </th>
                <th>Username </th>
            </tr>
            <?php
            $res=mysqli_query($link,"select * from purchase_master where party_name='$_POST[company_name]'");
            while($row=mysqli_fetch_array($res))
            {
             echo "<tr>";
             echo "<td>";echo $row["company_name"];echo "</td>";
             echo "<td>";echo $row["product_name"];echo "</td>";
             echo "<td>";echo $row["unit"];echo "</td>";
             echo "<td>";echo $row["packing_size"];echo "</td>";
             echo "<td>";echo $row["quantity"];echo "</td>";
             echo "<td>";echo $row["price"];echo "</td>"; 
             echo "<td>";echo $row["party_name"];echo "</td>";
             echo "<td>";echo $row["purchase_type"];echo "</td>";
             echo "<td>";echo $row["expiry_date"];echo "</td>";
             echo "<td>";echo $row["purchase_date"];echo "</td>";
             echo "<td>";echo $row["username"];echo "</td>";
             echo "</tr>";
            
            }
            ?>
        </table>
                         <?php
                    }
                    ?>
        
       
        </div>

    </div>
</div>

<!--end-main-container-part-->
<?php include "footer.php";?>
