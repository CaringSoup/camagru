<?php
    session_start();
?>
<div class="col-md-2" style="background: grey;">
    <ul class="nav flex-column">
        <li class="nav-item">
        <?php if ($_SESSION['username']) { ?>
        <a class="nav-link" href="?page=Profile"
        <?php
            if ($_GET['page'] == "Profile")
            echo "style='display: none;'";
        ?>
        >Profile</a>
        </li>
        <?php } ?>
        <li class="nav-item">
        <a class="nav-link" href="?page=Camera">
        Camera</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="?page=Gallery"
        <?php
            if ($_GET['page'] == "Gallery")
            echo "style='display: none;'";
        ?>
        >Gallery</a>
        </li>
        <li class="nav-item">
        <?php 
        if (isset($_SESSION['username']))
        {
        ?>
        <a class="nav-link" href="modal/logout.php">Sign out</a>
        <?php
        }
        ?>
        </li>
    </ul>
</div>