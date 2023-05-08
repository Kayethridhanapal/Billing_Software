<?php 
session_start();
if(!isset($_SESSION["user"])){
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
            Add new purchase</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add new purchase</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">

          <div class="control-group">
              <label class="control-label">Select company</label>
              <div class="controls">
                <select name="company_name" class="span11" id="company_name" onchange="select_company(this.value)">
                <option>select</option>
                <?php
                $res=mysqli_query($link,"select * from company_name");
                while($row=mysqli_fetch_array($res)){
                  echo "<option>";
                  echo $row["company_name"];
                  echo "</option>";
                }
                ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"> Select Product Name :</label>
              <div class="controls" id="product_name_div">
                <select class="span11">
                    <option>select</option>
                </select>           
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select unit</label>
              <div class="controls" id="unit_div">
                <select  class="span11">
                <option>Select</option>
                </select>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Packing size :</label>
              <div class="controls" id="packing_size_div">
              <select  class="span11">
                <option>Select</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"> Enter Quantity :</label>
              <div class="controls">
      
                <input type="text" name="qty" value="0" class="span11"/>
                
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Price :</label>
              <div class="controls">
              
                <input type="text" name="price" value="0" class="span11"/>
              
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select party name:</label>
              <div class="controls" >
              <select  class="span11" name="party_name">
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
            </div>
            
            <div class="control-group">
              <label class="control-label">Select purchase type:</label>
              <div class="controls" >
              <select  class="span11" name="purchase_type">
                <option>Select</option>
                <option>Cash</option>
                <option>Debit</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Date of Purchase :</label>
              <div class="controls">
                <input type="text" name="dt" id="dt" class="span11" placeholder="YY-MM_DD" required pattern="\d{4}-\d{2}-\d{2}"/>
              </div>
            </div>
            
            <div class="form-actions"> 
              <button type="submit" name="submit1" class="btn btn-success" >Purchase now</button>
            </div>
            
            <div class="alert alert-success" id="success" style="display:none">
            Purchase Inserted Successfully!.
            </div>

          </form>
        </div>
       </div>
       </div>
</div>
</div>

<script type="text/javascript">
function select_company(company_name)
{
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function(){
    if(xmlhttp.readyState== 4 && xmlhttp.status==200){
      document.getElementById("product_name_div").innerHTML=xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET","forajax/load_product_using_company.php?company_name="+company_name,true);
  xmlhttp.send();
}

function select_product(product_name,company_name){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function(){
    if(xmlhttp.readyState== 4 && xmlhttp.status==200){
      document.getElementById("unit_div").innerHTML=xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET","forajax/load_unit_using_company.php?product_name="+product_name+"&company_name="+company_name,true);
  xmlhttp.send();
  
}
function select_unit(unit,product_name,company_name){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function(){
    if(xmlhttp.readyState== 4 && xmlhttp.status==200){
      document.getElementById("packing_size_div").innerHTML=xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET","forajax/load_packingsize_using_company.php?unit="+unit+"&product_name="+product_name+"&company_name="+company_name,true);
  xmlhttp.send();
}


</script>

    <?php
    if(isset($_POST["submit1"]))
    {
      $today_date=date("Y-m-d");
      mysqli_query($link,"insert into purchase_master values(NULL,'$_POST[company_name]','$_POST[product_name]','$_POST[unit]','$_POST[packing_size]','$_POST[qty]','$_POST[price]','$_POST[party_name]','$_POST[purchase_type]','$_POST[dt]','$today_date','$_SESSION[user]') ")or die(mysqli_error($link));
      $count=0;
      $res=mysqli_query($link,"select * from stock_master where product_company='$_POST[company_name]' && product_name='$_POST[product_name]' && product_unit='$_POST[unit]' ");
      $count=mysqli_num_rows($res);
      if($count==0)
      {
        mysqli_query($link,"insert into stock_master values(NULL,'$_POST[company_name]','$_POST[product_name]','$_POST[unit]','$_POST[packing_size]','$_POST[qty]','0') ")or die(mysqli_error($link));
      }
      else{
        mysqli_query($link,"update stock_master set product_qty=product_qty+$_POST[qty] where product_company='$_POST[company_name]' && product_name='$_POST[product_name]' && product_unit='$_POST[unit]'") or die(mysqli_error($link));
         
      }

       ?>
       <script type="text/javascript">
        document.getElementById("success").style.display="block";
        
       </script>
       <?php
      
    }
    
    ?>
<!--end-main-container-part-->
<?php include "footer.php";?>

