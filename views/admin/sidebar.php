
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://icons.iconarchive.com/icons/graphicloads/colorful-long-shadow/64/User-icon.png" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"><?=$_SESSION['user_name'];?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span><?=isset($_SESSION['admin'])?'Admin':'Nhân Viên'?></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li class="<?= !strpos($_SERVER[REQUEST_URI],'/admin/index.php')?'':'active' ?>">
            <a href="index.php"><em class="fa fa-dashboard">&nbsp;</em>
                Quản lý phòng
            </a>
        </li>
        <li class="<?= !strpos($_SERVER[REQUEST_URI],'/admin/employee.php')?'':'active' ?>">
            <a href="employee.php"><em class="fa fa-user">&nbsp;</em>
                Quản lý nhân viên
            </a>
        </li>
        <?php if (isset($_SESSION['admin'])) {

        ?>
        <li class="<?= !strpos($_SERVER[REQUEST_URI],'/admin/add_employee.php')?'':'active' ?>">
            <a href="add_employee.php"><em class="fa fa-plus">&nbsp;</em>
                Thêm nhân viên
            </a>
        </li>
       
        <li class="<?= !strpos($_SERVER[REQUEST_URI],'/admin/room_type.php')?'':'active' ?>">
            <a href="room_type.php"><em class="fa fa-phone">&nbsp;</em>
                Loại phòng
            </a>
        </li>
         <?php
        }
        ?>
        <li class="<?= !strpos($_SERVER[REQUEST_URI],'/admin/request.php')?'':'active' ?>">
            <a href="request.php"><em class="fa fa-folder">&nbsp;</em>
                Yêu cầu
            </a>
        </li>
        <li><a href="../dangxuat.php"><em class="fa fa-power-off">&nbsp;</em> Đăng xuất</a></li>
    </ul>
</div><!--/.sidebar-->