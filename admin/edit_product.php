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
$id=$_GET["id"];
$company_name="";
$product_name="";
$unit="";
$packing_size="";
$res=mysqli_query($link,"select * from products where id=$id");
while($row=mysqli_fetch_array($res))
{
 $company_name=$row["company_name"];
 $product_name=$row["product_name"];
 $unit=$row["unit"];
 $packing_size=$row["packing_size"];
 
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html"  class="tip-bottom"><i class="icon-home"></i>
            Edit product</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit product</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">

          <div class="control-group">
              <label class="control-label">Select company</label>
              <div class="controls">
                <select name="company_name" class="span11" >
                <?php
                $res=mysqli_query($link,"select * from company_name");
                while($row=mysqli_fetch_array($res)){
                  ?>
                  <option <?php if ($row["company_name"]==$company_name){echo "selected";} ?>>
                  <?php
                  echo $row["company_name"];
                  echo "</option>";
                }
                ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Product Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Product name" name="product_name" value="<?php echo $product_name;?>"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select unit</label>
              <div class="controls">
                <select name="unit" class="span11">
                <?php
                $res=mysqli_query($link,"select * from units");
                while($row=mysqli_fetch_array($res)){
                  ?>
                  <option <?php if ($row["unit"]==$unit){echo "selected";} ?>>
                  <?php
                  echo $row["unit"];
                  echo "</option>";
                }
                ?>
                </select>
              </div>
            </div>

            
            <div class="control-group">
              <label class="control-label">Packing size :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Packing size" name="packing_size" value="<?php echo $packing_size;?>"/>
              </div>
            </div>
            
                        
            <div class="form-actions"> 
              <button type="submit" name="submit1" class="btn btn-success" >Save</button>
            </div>
            
            <div class="alert alert-success" id="success" style="display:none">
            Record Updated Successfully!.
            </div>

          </form>
        </div>
       </div>
       
</div>
</div>
</div>

<?php
    if(isset($_POST["submit1"]))
    {
      $count=0;
      $res=mysqli_query($link,"select * from products where company_name='$_POST[company_name]' && product_name='$_POST[product_name]' && unit='$_POST[unit]' && packing_size='$_POST[paking_size]' ");
      $count=mysqli_num_rows($res);
      if($count>0)
      {
       ?>
       <script type="text/javascript">
        document.getElementById("success").style.display="none";
        document.getElementById("error").style.display="block";
       </script>
       <?php
      }
      else{
       
       mysqli_query($link,"update products set company_name='$_POST[company_name]',product_name='$_POST[product_name]',unit='$_POST[unit]',packing_size='$_POST[packing_size]' where id=$id") or die(mysqli_error($link));
        ?>
         <script type="text/javascript">
  
          document.getElementById("success").style.display="block";
          setTimeout(function(){
            window.location="add_new_product.php";
          },3000);
         </script>
         <?php
  
}
}
?>
<!--end-main-container-part-->
<?php include "footer.php";?>
