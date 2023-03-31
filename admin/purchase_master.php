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
              <label class="control-label">Quantity :</label>
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
  echo $row["businessman"];
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
              <label class="control-label">Expiry date :</label>
              <div class="controls">
                <input type="text" name="expiry_date" class="span11" placeholder="YY-MM_DD" required pattern="\d{4}-\d{2}-\d{2}"/>
              </div>
            </div>


            <div class="alert alert-danger" id="error" style="display:none">
            This Product already Exist! Please Try Another.
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
    if(xmlhttp.readystate== 4 && xmlhttp.status==200){
      document.getElementById("product_name_div").innerHTML=xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET","forajax/load_product_using_company.php?company_name="+company_name,true);
  xmlhttp.send();
}

function select_product(product_name,company_name){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function(){
    if(xmlhttp.readystate== 4 && xmlhttp.status==200){
      document.getElementById("unit_div").innerHTML=xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET","forajax/load_unit_using_company.php?product_name="+product_name+"&company_name="+company_name,true);
  xmlhttp.send();
  alert(product_name + "=="+ company_name);
}
function select_unit(unit,product_name,company_name){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function(){
    if(xmlhttp.readystate== 4 && xmlhttp.status==200){
      document.getElementById("packing_size_div").innerHTML=xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET","forajax/load_packingsize_using_company.php?unit="+unit+"&product_name="+product_name+"&company_name="+company_name,true);
  xmlhttp.send();
  alert(product_name + "=="+ company_name);
}


</script>

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
        mysqli_query($link,"insert into products values(NULL,'$_POST[company_name]','$_POST[product_name]','$_POST[unit]','$_POST[packing_size]') ")or die(mysqli_error($link));
        
        ?>
         <script type="text/javascript">
          document.getElementById("success").style.display="block";
          document.getElementById("error").style.display="none";
          setTimeout(function(){
            window.location.href=window.location.href;
          },500);
         </script>
         <?php
  
      }
    }
    
    ?>
<!--end-main-container-part-->
<?php include "footer.php";?>
