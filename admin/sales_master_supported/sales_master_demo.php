<?php
include "header.php";
include "../user/connection.php";
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
                    Sale a products</a></div>
        </div>

        <div class="container-fluid">
            <form name="form1" action="" method="post" class="form-horizontal nopadding">
                <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>Sale a Products</h5>
                            </div>

                            <div class="widget-content nopadding">


                                <div class=" span4">
                                    <br>

                                    <div>
                                        <label>Full Name</label>
                                        <input type="text" class="span12" name="full_name">
                                    </div>
                                </div>

                                <div class="span3">
                                    <br>

                                    <div>
                                        <label>Bill Type</label>
                                        <select class="span12" name="bill_type">
                                            <option>Cash</option>
                                            <option>Debit</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="span2">
                                    <br>

                                    <div>
                                        <label>Date</label>
                                        <input type="text" class="span12" name="date"
                                               value="<?php echo date("Y-m-d") ?>"
                                               readonly>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>

                <!-- new row-->
                <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                    <div class="span12">


                        <center><h4>Select A Product</h4></center>


                        <div class="span2">
                            <div>
                                <label>Product Company</label>
                                <select class="span11" name="company_name" id="company_name"
                                        onchange="select_company(this.value)">
                                    <option>Select</option>
                                    <?php
                                    $res = mysqli_query($link, "select * from company_name");
                                    while ($row = mysqli_fetch_array($res)) {
                                        echo "<option>";
                                        echo $row["company_name"];
                                        echo "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="span2">
                            <div>
                                <label>Product Name</label>
                                <div id="product_name_div">
                                    <select class="span11">
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="span1">
                            <div>
                                <label>Unit</label>
                                <div id="unit_div">
                                    <select class="span11">
                                        <option>Select</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="span2">
                            <div>
                                <label>Packing Size</label>
                                <div id="packing_size_div">
                                    <select class="span11">
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="span1">
                            <div>
                                <label>Price</label>
                                <input type="text" class="span11" name="price" id="price" readonly value="0">
                            </div>
                        </div>

                        <div class="span1">
                            <div>
                                <label>Enter Qty</label>
                                <input type="text" class="span11" name="qty" id="qty" autocomplete="off">
                            </div>
                        </div>



                        <div class="span1">
                            <div>
                                <label>Total</label>
                                <input type="text" class="span11" name="total" id="total" value="0" readonly>
                            </div>
                        </div>

                        <div class="span1">
                            <div>
                                <label>&nbsp</label>
                                <input type="button" class="span11 btn btn-success" value="Add">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- end new row-->


            </form>




            <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                <div class="span12">
                    <center><h4>Taken Products</h4></center>

                    <table class="table table-bordered">
                        <tr>
                            <th>Product Company</th>
                            <th>Product Name</th>
                            <th>Product Unit</th>
                            <th>Product Size</th>
                            <th>Product Price</th>
                            <th>Product Qty</th>
                            <th>Total</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        <tr>
                            <td>Amul</td>
                            <td>Buutter</td>
                            <td>Grams</td>
                            <td>500</td>
                            <td>10</td>
                            <td>5</td>
                            <td>50</td>
                            <td style="color: green">Edit</td>
                            <td style="color:red">Delete</td>
                        </tr>
                    </table>

                    <h4>
                        <div style="float: right"><span style="float:left;">Total:&#8377;</span><span style="float: left">525</span></div>
                    </h4>


                    <br><br><br><br>

                    <center>
                        <input type="submit" value="generate bill" class="btn btn-success">
                    </center>

                </div>
            </div>
        </div>
    </div>







<?php
include "footer.php";
?>