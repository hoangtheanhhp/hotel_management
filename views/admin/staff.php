<?php
    $cEmployee = new C_Employee;
    if (isset($_POST['del_id'])) {
        $cEmployee->destroy($_POST['del_id']);
    }
    $staff = $data['staff'];
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Quản lí nhân viên</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lí nhân viên</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Danh sách nhân viên:
                    <a href="add_employee.php" class="btn btn-info pull-right">Thêm Nhân Viên</a>
                </div>
                <div class="panel-body">
                    <?php
                    if (isset($_GET['error'])) {
                        echo "<div class='alert alert-danger'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error on Shift Change !
                            </div>";
                    }
                    if (isset($_GET['success'])) {
                        echo "<div class='alert alert-success'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Shift Successfully Changed!
                            </div>";
                    }
                    ?>
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%"
                           id="rooms">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ và tên</th>
                            <th>Nghiệp vụ</th>
                            <th>Ca làm việc</th>
                            <th>Ngày vào</th>
                            <th>Lương</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($staff as $s) {
                        ?>
                                <tr>

                                    <td><?=$s->emp_id?></td>
                                    <td><?=$s->emp_name?></td>
                                    <td><?=$s->staff_type?></td>
                                    <td><?=$s->shift . ' - ' . $s->shift_timing?></td>
                                    <td><?=date('M j, Y', strtotime($s->joining_date))?></td>
                                    <td><?=$s->salary?> VNĐ</td>
                                    <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a class="btn btn-primary" href="edit_employee.php?id=<?=$s->emp_id?>"><i class="fa fa-pencil"></i></a>
                                        </div>
                                        <div class="col-md-3">
                                            <form action="employee.php" method="post">
                                                <input hidden name="del_id" value="<?=$s->emp_id?>">
                                             <button
                                           class="btn btn-danger" onclick="return confirm('Are you Sure?')"><i
                                                    class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                        <div class="col-md-3">
                                            <a href='employee_detail.php?id=<?=$s->emp_id?>'
                                           class="btn btn-success" title="Employee Histery"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </div>
                                    </td>
                                </tr>


                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
        </div>
    </div>

</div>    <!--/.main-->