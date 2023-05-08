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
$unit="";

$res=mysqli_query($link,"select * from units where id=$id");
while($row=mysqli_fetch_array($res))
{
 $unit=$row["unit"];
 
}
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html"  class="tip-bottom"><i class="icon-home"></i>
            Edit unit</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit unit</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Unit Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Unit name" name="unit" value="<?php echo $unit;?>"/>
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
mysqli_query($link,"update units set unit='$_POST[unit]' where id=$id") or die(mysqli_error($link));
        ?>
         <script type="text/javascript">
  
          document.getElementById("success").style.display="block";
          setTimeout(function(){
            window.location="add_new_unit.php";
          },500);
         </script>
         <?php
  
}
?>
<!--end-main-container-part-->
<?php include "footer.php";?>
