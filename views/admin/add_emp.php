 <?php
    $cEmployee = new C_employee();
    if(isset($_POST['username'])) {
        $cEmployee->store($_POST);
    }
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Thêm Nhân Viên</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm Nhân Viên</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Đăng kí</div>
                <div class="panel-body">
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo "<div class='alert alert-danger'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; ".$_SESSION['error']."
                            </div>";
                    }
                    ?>
                    <form role="form" action="add_employee.php" method="post" data-toggle="validator">
                        <div class="row">
                        
                            <div class="form-group col-lg-6">
                                <label>Họ và tên</label>
                                <input type="text" class="form-control" placeholder="Hoang Van A" name="name" required data-error="Hãy nhập họ và tên">
                                <div class="help-block with-errors"></div>
                            </div>
                            
                            <div class="form-group col-lg-6">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="hoangvana@gmail.com" name="email" required data-error="Hãy nhập địa chỉ email">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="hoangvana" name="username" required data-error="Hãy nhập username">
                                <div class="help-block with-errors"></div>
                            </div>
                            
                            <div class="form-group col-lg-6">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="password" name="pasword" required data-error="Hãy nhập password">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Lương</label>
                                <input type="number" class="form-control" placeholder="Lương" name="salary" data-error="Hãy Nhập Lương" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Quyền</label>
                                <select class="form-control" name="admin">
                                    <option value="0">Nhân viên</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-lg btn-primary">Gửi yêu cầu</button>
                    </form>
                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-sm-12">
        </div>
    </div>

</div>    <!--/.main-->




