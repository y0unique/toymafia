<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
        <div class="sidebar-brand-icon">
            <!-- <img src="images/logo/DepEd_logo.png"
                style="height: 50px; width:50px; margin-right:5px;"> -->
            <i class="fab fa-d-and-d text-danger"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Deped Manila</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="index">
        <a class="nav-link" href="index">
            <i class="fas fa-home"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Issuances
    </div>

    <li class="nav-item" id="issuances">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseIssuances" aria-expanded="true" aria-controls="collapseIssuances" id="acollapseIssuances">
            <i class="fas fa-file-alt"></i>
            <span>Issuances</span>
        </a>
        <div id="collapseIssuances" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Issuances:</h6>
                <a class="collapse-item" id="aIssuances" href="issuances">Issuances Posting</a>
                <a class="collapse-item" id="aIssuancesCatergories" href="issuancescatergory">Issuances Categories</a>
            </div>
        </div>
    </li>

    <?php
        if($_SESSION['webType']== "superadmin" || $_SESSION['webType']== "admin"){?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Directories
    </div>


    <!-- Nav Item - Division of City Schools Menu -->
    <li class="nav-item" id="offices">
        <a class="nav-link" href="offices">
            <i class="fas fa-building"></i>
            <span>Division of City Schools</span>
        </a>
    </li>

    <!-- Nav Item - Schools Menu -->
    <li class="nav-item" id="schools">
    <a class="nav-link" href="schools">
        <i class="fas fa-school"></i>
        <span>Schools</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Files
    </div>  

    <!-- Nav Item - Miscellaneous Menu -->
    <li class="nav-item" id="miscellaneous">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemiscellaneous" aria-expanded="true" aria-controls="collapsemiscellaneous" id="acollapsemiscellaneous">
            <i class="fas fa-images"></i>
            <span>Miscellaneous</span>
        </a>
        <div id="collapsemiscellaneous" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Miscellaneous:</h6>
                <a class="collapse-item" id="acarousel" href="carousel">Carousel</a>
                <a class="collapse-item" id="asocialmedia" href="socialmedia">Social Media</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Files Menu -->
    <li class="nav-item" id="files">
    <a class="nav-link" href="files">
        <i class="fas fa-file-archive"></i>
        <span>Files</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        BAC FILES
    </div>
    <!-- Nav Item - BAC Menu -->
    <li class="nav-item" id="bac">
    <a class="nav-link" href="bac">
        <i class="fas fa-file-archive"></i>
        <span>BAC</span></a>
    </li>
    <!-- Nav Item - BAC Menu -->
    <li class="nav-item" id="files">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBac" aria-expanded="true" aria-controls="collapseBac" id="acollapseBac">
            <i class="fas fa-file-pdf"></i>
            <span>BAC Files</span>
        </a>
        <div id="collapseBac" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">BAC Files:</h6>
                <a class="collapse-item" id="aBacfiles" href="bac">All Bac Files</a>
                <a class="collapse-item" id="ainvitationtobid" href="#">Invitation To Bid</a>
                <a class="collapse-item" id="aprocurements" href="#">Procurement</a>
                <a class="collapse-item" id="atransparencies" href="#">Transparencies</a>
                <a class="collapse-item" id="atransparencies" href="#">Invitation To Bid</a>
            </div>
        </div>
    </li>

    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User Management
    </div>

        <!-- Nav Item - Files Menu -->
        <li class="nav-item" id="management">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers" id="acollapseUsers">
                <i class="fas fa-fw fa-cog"></i>
                <span>User Management</span>
            </a>
            <div id="collapseUsers" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">User Management:</h6>
                    <a class="collapse-item" id="ausers" href="users">Users</a>
                    <a class="collapse-item" id="atimelog" href="timelog">Time Log</a>
                </div>
            </div>
        </li>
    <?php }?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->