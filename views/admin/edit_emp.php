 <?php
    $staffType = $data['staffType'];
    $shifts = $data['shift'];
    $cardTypes = $data['cardType'];
    $staff = $data['staff'];
    $cEmployee = new C_employee();
    if(isset($_POST['staff'])) {
        $cEmployee->update($_GET['id'],$_POST);
    }
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Edit Employee</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Employee</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Employee Detail:</div>
                <div class="panel-body">
                    <div class="emp-response"></div>
                    <form role="form" action="edit_employee.php?id=<?=$staff->emp_id?>" method="post" data-toggle="validator">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Staff</label>
                                <select class="form-control" name="staff" required data-error="Select Staff Type">
                                    <?php
                                        foreach($staffType as $s)
                                        if ($s->staff_type_id==$staff->staff_type_id) {
                                            echo '<option selected value="' . $s->staff_type_id . '" >' . $s->staff_type . '</option>';                                    
                                        } else {
                                            echo '<option value="' . $s->staff_type_id . '" >' . $s->staff_type . '</option>';                                    
                                        }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Shift</label>
                                <select class="form-control" name="shift" required data-error="Select Shift Type">
                                    <?php
                                        foreach($shifts as $shift)
                                        if ($shift->shift_id==$staff->shift_id) {                                        
                                            echo '<option selected value="' . $shift->shift_id . '">' . $shift->shift . ' - ' . $shift->shift_timing . '</option>';
                                        } else {
                                            echo '<option value="' . $shift->shift_id . '">' . $shift->shift . ' - ' . $shift->shift_timing . '</option>';
                                        }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" value="<?=explode(' ', $staff->emp_name)[0]?>" name="first_name" required data-error="Enter First Name">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name" value="<?=explode(' ', $staff->emp_name)[1]?>" name="last_name">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>ID Card Type</label>
                                <select class="form-control" name="card_type" required>
                                    <?php
                                        foreach($cardTypes as $cardType) {
                                        if ($cardType->id_card_type_id==$staff->id_card_type) {                                        
                                            echo '<option selected value="' . $cardType->id_card_type_id . '">' . $cardType->id_card_type . '</option>';
                                        } else
                                        {
                                            echo '<option value="' . $cardType->id_card_type_id . '">' . $cardType->id_card_type . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>ID Card No</label>
                                <input type="text" class="form-control" placeholder="ID Card No" value="<?=$staff->id_card_no?>" name="card_no" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Contact Number</label>
                                <input type="number" class="form-control" placeholder="Contact Number" value="<?=$staff->contact_no?>" name="contact_no" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="address" value="<?=$staff->address?>" name="address" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Salary</label>
                                <input type="number" class="form-control" placeholder="Salary" name="salary" value="<?=$staff->salary?>" data-error="Enter Salary" required>
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        <button type="reset" class="btn btn-lg btn-danger">Reset</button>
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




