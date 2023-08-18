<?php
session_start();
include('./inc/connection.php');
include('./inc/visitor-logs.php');

$current_page = 'home';
$current_page = 'services';
$current_page = 'ourteam';

$siteurl = 'http://localhost/trphtml';

?>


    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>The Rainbow Print :: Design & Printing Services</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="The Rainbow Print, print, printing, print design, ui design, ui and ux design, website design, graphic design, logo design. banner design, stationery print, label print, t-shirt print, card print, lanyard print, design, website maintance and more" />
    <meta name="description" content="We’re Pixel Perfect Design & Printing Services at the rainbow print (trp) means those activities relating to the work of the printing, publishing or graphic arts industries and shall include any mechanical process whereby ink is transferred to paper or other materials." />
    <link rel="shortcut icon" href="<?php echo $siteurl; ?>/assets/images/trp-favicon.png" />
    <link rel="stylesheet" type="text/css" href="<?php echo $siteurl; ?>/assets/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $siteurl; ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $siteurl; ?>/assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $siteurl; ?>/assets/css/owl.theme.default.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $siteurl; ?>/assets/css/style.css" /> 
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
</head>
<body>




<div class="preloader" id="loader-1">
        <div id="loader"></div>
    </div>
   <header class="header">
    <nav class="header-menu navbar style-one navbar-area navbar-expand-lg py-20">
        <div class="topbar">
            <div class="container container-1570">
                <div class="tobar-content">
                    <div class="topbar-left text-lg-start text-center"><span class="off">20% OFF</span><span>Get 20% Discount on Your First Order</span></div>
                    <div class="navbar style-one navbar-area topbar-menu">
                        <div class="navbar-collapse">
                            <ul class="navbar-nav menu-open text-lg-end">
                                <li><a href="help.php">Customer Support</a></li>
                                <li><a href="contactus.php">Contact</a></li>
                                <?php
                                if(!isset($_SESSION['fname'])){
                                    ?>

                                    <li><a href="signup.php">Login / Signup</a></li>

                                    <?php 

                                        } else {

                                    ?>
                                    <li><a href="logout.php">Logout</a></li>


                                        <?php 



                                    }

                                ?>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="stickyNav" class="container container-1570">
            <div class="responsive-mobile-menu">
                <button class="menu toggle-btn d-block d-lg-none" data-target="#Iitechie_main_menu" aria-expanded="false" aria-label="Toggle navigation"><span class="icon-left"></span><span class="icon-right"></span></button>
            </div>
            <div class="logo">
                
                <a class="navbar-brand active" href="index.php">
                    <img class="img-fluid" src="<?php echo $siteurl; ?>/assets/images/trp-logo.png" alt="the rainbow print logo" /> 
                </a>
            </div>
            <div class="nav-right-part nav-right-part-mobile">
                <button class="search-bar-btn" href="#"><i class="fas fa-search"></i></button>
            </div>
            <div id="Iitechie_main_menu" class="collapse navbar-collapse">
                <ul class="navbar-nav menu-open text-lg-end">
                    <li><a href="<?php echo $siteurl; ?>/" class="<?php if ($current_page=="home") {echo "active"; }?>">Home</a></li>
                    <li><a href="<?php echo $siteurl; ?>/services.php" class="<?php if ($current_page=="services") {echo "active"; }?>">Design &amp; Printing</a></li>
                    <li class="menu-item-has-children">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#comingsoon">All Categories</a>
                        <!-- <div class="dropdown-megamenu sub-menu">
                            <div class="list-group list-group-flush">
                                <h7 class="mega-menu-heading">All Categories</h7>
                                <ul class="menu-list-group">
                                    <li class="list-group-item"><a  class="list-group-item-action" href="/about">Book Printing</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Book Printing</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Brochure Printing</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Business Card</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Catalogue Printing</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Flyer Printing</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Folder Printing</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Hamper Box</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Hang/Product Printing</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Invitation Card Printing</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Letterhead Printing</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Magazine Printing</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Newsletter Printing</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Digital Printing</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Offset Printing</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Poster Printing</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Digital Printing</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Printing &amp; Packaging</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Prospectus Printing</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Visiting Card Printing</a></li>
                                    <li class="list-group-item">
                                        <a   class="list-group-item-action" href="/about">
                                            Wall/Table Calendar <br />
                                            Printing
                                        </a>
                                    </li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">Wedding Gift</a></li>
                                    <li class="list-group-item"><a   class="list-group-item-action" href="/about">T-shirt Printing</a></li>
                                </ul>
                            </div>
                        </div> -->
                    </li>
                    <li class="menu-item-has-children">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#comingsoon"> Stationery</a>
                       <!--  <ul class="sub-menu">
                            <li><a   class="" href="/stetionery">Business Cards</a></li>
                            <li><a   class="" href="/stetionery">Business Cards</a></li>
                            <li><a   class="" href="/stetionery">Letterheads</a></li>
                            <li><a   class="" href="/stetionery">Envelopes</a></li>
                            <li><a   class="" href="/stetionery">Bill Book / Invoice</a></li>
                            <li><a   class="" href="/stetionery">Notebook / Diaries</a></li>
                            <li><a   class="" href="/stetionery">ID Cards</a></li>
                            <li><a   class="" href="/stetionery">Lanyards / Ribbon</a></li>
                        </ul> -->
                    </li>
                    <li class="menu-item-has-children">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#comingsoon">Labels &amp; Stickers</a>
                        <!-- <ul class="sub-menu">
                            <li><a   class="" href="/labelstickers">Business Cards</a></li>
                            <li><a   class="" href="/labelstickers">Letterheads</a></li>
                            <li><a   class="" href="/labelstickers">Envelopes</a></li>
                            <li><a   class="" href="/labelstickers">Bill Book / Invoice</a></li>
                            <li><a   class="" href="/labelstickers">Notebook / Diaries</a></li>
                            <li><a   class="" href="/labelstickers">ID Cards</a></li>
                            <li><a   class="" href="/labelstickers">Lanyards / Ribbon</a></li>
                        </ul> -->
                    </li>
                    <li><a href="<?php echo $siteurl; ?>/ourteam.php" class="<?php if ($current_page=="ourteam") {echo "active"; }?>">Our Team</a></li>
                </ul>
            </div>
            <div class="nav-right-part nav-right-part-desktop">
                <a class="whatsapp-btn" href="https://wa.me/+917568632450?text=Welcome%20to%20The%20Rainbow%20Print"><i class="fa-brands fa-whatsapp fa-2x"></i></a>
                <!-- <button class="search-bar-btn"><i class="fa-brands fa-whatsapp fa-2x"></i></button> -->
                <a class="btn my-button theme-btn" href="<?php echo $siteurl; ?>/contactus.php">Order Now <i class="fas fa-long-arrow-right"></i></a>
            </div>
        </div>
    </nav>
</header>


