<?php
// Initialize session
//session_start();
if (!isset($_SESSION['admin_id'])) {
    header('location: ' . URLROOT . '/pages/about');
    exit;
}
?>
<section id="sidebar">
    <a href="#" class="brand">
        <i class="bx bxs-smile"></i>
        <span class="text">
            Hello <?= $_SESSION['admin_name'] ?>
        </span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="#" data-tab="dashboard-tab">
                <i class="bx bxs-dashboard"></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#" data-tab="genre-tab">
                <i class="bx bxs-category"></i>
                <span class="text">Genre</span>
            </a>
        </li>
        <li>
            <a href="<?= APPROOT ?>/views/admin/song" data-tab="song-tab">
                <i class="bx bxs-music"></i>
                <span class="text">Song</span>
            </a>
        </li>
        <li>
            <a href="#" data-tab="songrequest-tab">
                <i class="bx bx-music"></i>
                <span class="text">Song request</span>
            </a>
        </li>
        <li>
            <a href="#" data-tab="artists-tab">
                <i class="bx bx-user-pin"></i>
                <span class="text">Artists</span>
            </a>
        </li>
        <li>
            <a href="#" data-tab="user-tab">
                <i class="bx bxs-group"></i>
                <span class="text">User</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="#">
                <i class="bx bxs-cog"></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="<?=URLROOT?>/users/logoutAdmin" class="logout">
                <i class="bx bxs-log-out-circle"></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>