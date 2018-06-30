 <?php
    $staffType = $data['staffType'];
    $shifts = $data['shift'];
    $cardTypes = $data['cardType'];
    $cEmployee = new C_employee();
    if(isset($_POST['staff'])) {
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
                    <div class="emp-response"></div>
                    <form role="form" action="add_employee.php" method="post" data-toggle="validator">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Nghiệp vụ</label>
                                <select class="form-control" name="staff" required data-error="Hãy chọn loại nghiệp vụ">
                                    <option selected disabled>Chọn loại nghiệp vụ</option>
                                    <?php
                                        foreach($staffType as $staff)
                                        echo '<option value="' . $staff->staff_type_id . '">' . $staff->staff_type . '</option>';                                    
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Ca làm việc</label>
                                <select class="form-control" name="shift" required data-error="Hãy chọn ca làm việc">
                                    <option selected disabled>Chọn ca làm việc</option>
                                    <?php
                                        foreach($shifts as $shift)
                                            echo '<option value="' . $shift->shift_id . '">' . $shift->shift . ' - ' . $shift->shift_timing . '</option>';
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Họ</label>
                                <input type="text" class="form-control" placeholder="First Name" name="first_name" required data-error="Enter First Name">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Tên</label>
                                <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Giấy tờ</label>
                                <select class="form-control" name="card_type" required>
                                    <option selected disabled >Giấy tờ</option>
                                    <?php
                                        foreach($cardTypes as $cardType) {
                                            echo '<option value="' . $cardType->id_card_type_id . '">' . $cardType->id_card_type . '</option>';
                                        }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Số thẻ</label>
                                <input type="text" class="form-control" placeholder="Số thẻ" name="card_no" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Số điện thoại</label>
                                <input type="number" class="form-control" placeholder="Số điện thoại" name="contact_no" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" placeholder="Địa chỉ" name="address" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Lương</label>
                                <input type="number" class="form-control" placeholder="Lương" name="salary" data-error="Enter Salary" required>
                                <div class="help-block with-errors"></div>
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




