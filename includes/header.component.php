<?php
    session_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.fa {
  font-size: 50px;
  cursor: pointer;
  user-select: none;
}

.fa:hover {
  color: darkblue;
}
</style>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="#" >Camagru</a>
        <?php
        if (!isset($_SESSION['username']))
        {
        ?>
            <button type="button" class="btn btn-success" id="openModal" onclick="loginModal()">Login</button>
        <?php
        }
        ?>
    </div>
</nav>