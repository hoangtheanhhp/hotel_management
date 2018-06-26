<?php
    $roomInfo = $data['info'];
    $rooms = $data['rooms'];
    $roomTypes = $data['roomTypes'];
    $room_id = $data['room_id'];
    $room_type_id = $data['room_type_id'];
    $cardTypes = $data['cardTypes'];
    $cRoom = new C_room;
    if (isset($_POST['email'])) {
        $_POST['room_id'] = $room_id;
        $_POST['room_type_id'] = $room_type_id;
        $cRoom->booking($_POST);
    }
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Reservation</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Reservation</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <form role="form" id="booking" action="datphong.php?room_id=<?=$room_id?>&room_type_id=<?=$room_type_id?>" method="post" data-toggle="validator">
                <div class="response"></div>
                <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group col-lg-6">
                                    <label>Room Type</label>
                                    <select name="room_type_id" class="form-control" disabled>
                                        <?php
                                            foreach($roomTypes as $r) {
                                                if ($r->room_type_id == $room_type_id) {
                                                    echo "<option selected value='$r->room_type_id'>$r->room_type</option>";
                                                } else {
                                                    echo "<option value='$r->room_type_id'>$r->room_type</option>";

                                                }
                                            }
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Room No</label>
                                    <select name="room_id" class="form-control" disabled>
                                        <?php
                                            foreach($rooms as $r) {
                                                if ($r->room_id == $room_id) {
                                                    echo "<option selected value='$r->room_id'>$r->room_no</option>";
                                                } else {
                                                    echo "<option value='$r->room_id'>$r->room_no</option>";

                                                }
                                            }
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Check In Date</label>
                                    <input type="text" class="form-control" value=<?=date('d-m-Y')?> name="check_in_date" id="check_in_date" data-error="Select Check In Date" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Check Out Date</label>
                                    <input type="text" class="form-control" value=<?=date('d-m-Y')?> name="check_out_date" id="check_out_date" data-error="Select Check Out Date" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-lg-12">
                                    <h4 style="font-weight: bold">Số ngày : <span id="staying_day">0</span> Days</h4>
                                    <h4 style="font-weight: bold">Giá: <span id="price"><?=$roomInfo->price?></span> VNĐ</h4>
                                    <h4 style="font-weight: bold">Tổng : <span id="total_price">0</span> VNĐ</h4>
                                </div>
                            </div>
                        </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Customer Detail:</div>
                        <div class="panel-body">
                            <div class="form-group col-lg-6">
                                <label>Ho va Ten</label>
                                <input class="form-control" placeholder="Ho va ten" name="name" data-error="Enter Name" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Contact No</label>
                                <input type="number" class="form-control" data-error="Enter Min 10 Digit" data-minlength="10" placeholder="Contact No" name="contact_no" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" name="email" data-error="Enter Valid Email Address" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>ID Card Type</label>
                                <select class="form-control" name="id_card" data-error="Select ID Card Type" required onchange="validId(this.value);">
                                    <?php
                                    foreach($cardTypes as $cardType) {
                                            echo '<option value="' . $cardType->id_card_type_id . '">' . $cardType->id_card_type . '</option>';
                                        }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>ID Card No</label>
                                <input type="text" class="form-control" placeholder="ID Card No" name="card_no" data-error="Enter Valid ID Card No" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Address</label>
                                <textarea class="form-control" rows="3" name="address" required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary pull-right">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <p class="back-link">MIS Developed by <a href="https://www.pcsaini.in">Team 2</a></p>
        </div>
    </div>

</div>    <!--/.main-->

</div>


