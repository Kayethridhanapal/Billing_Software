<!DOCTYPE html>
<html lang="en">
<head>
    <title>ARTHAA TEXTILES</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/fullcalendar.css"/>
    <link rel="stylesheet" href="css/matrix-style.css"/>
    <link rel="stylesheet" href="css/matrix-media.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/jquery.gritter.css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>


<div id="header">

    <h2 style="color: white;position: absolute">
        <a href="dashboard.html" style="color:white; margin-left: 30px; margin-top: 40px">ARTHAA</a>
    </h2>
</div>



<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class="dropdown" id="profile-messages">
            <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i
                    class="icon icon-user"></i> <span class="text">Welcome Admin</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                
                <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>


    </ul>
</div>

<!--sidebar-menu-->
<div id="sidebar">
    <ul>
        <li class="active">
            <a href="index.html"><i class="icon icon-home"></i><span>Dashboard</span></a>
        </li>
        <li>
            <a href="add_new_user.php"><i class="icon icon-user"></i><span>Add new user</span></a>
        </li>
        <li>
            <a href="add_new_party.php"><i class="icon icon-user"></i><span>Add new party</span></a>
        </li>
        <li>
            <a href="add_new_company.php"><i class="icon icon-user"></i><span>Add new company</span></a>
        </li>

        <li>
            <a href="add_new_product.php"><i class="icon icon-user"></i><span>Add new product</span></a>
        </li>
        <li>
            <a href="purchase_master.php"><i class="icon icon-user"></i><span>Purchase master</span></a>
        </li>
        <li>
            <a href="sales_master.php"><i class="icon icon-user"></i><span>Sales master</span></a>
        </li>
        <li>
            <a href="stock_master.php"><i class="icon icon-user"></i><span>Stock master</span></a>
        </li>
        <li>
            <a href="view_bills.php"><i class="icon icon-user"></i><span>View Bills</span></a>
        </li>
        <li>
            <a href="return_product_list.php"><i class="icon icon-user"></i><span>Return products list</span></a>
        </li>

         <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Reports</span> <span
                class="label label-important">+</span></a>
            <ul>
                <li><a href="purchase_report.php">Purchase Report</a></li>
                <li><a href="view_bills.php">Sales Report</a></li>
                <li><a href="stock_master.php">Stock Report</a></li>
                <li><a href="return_product_list.php">Return Products Report</a></li>
                <li><a href="party_report_list.php">Party Report</a></li>
                <li><a href="expiry_report.php">Expiry Report</a></li>
           </ul>
        </li> 

    </ul>
</div>
<!--sidebar-menu-->
<div id="search">

        <a href="logout.php" style="color:white"><i class="icon icon-share-alt"></i><span>LogOut</span></a>

</div>