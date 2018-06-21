<?php
    $rooms = $data['rooms'];
    $roomTypes = $data['roomTypes'];
    $cRoom = new C_room();
    if(isset($_POST['add_room'])) {
        $cRoom->store($_POST);
    }
    if(isset($_POST['del_id'])) {
        $cRoom->destroy($_POST['del_id']);
    }
    if(isset($_POST['edit_id'])) {
        $cRoom->update($_POST);
    }
    if(isset($_POST['book_id'])) {
        $cRoom->book($_POST['book_id']);
    }
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Quản lý phòng</li>
        </ol>
    </div><!--/.row-->

    <br>

    <div class="row">
        <div class="col-lg-12">
            <div id="success"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Quản lý phòng
                    <button class="btn btn-info pull-right" data-toggle="modal" data-target="#addRoom">Thêm Phòng</button>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%"
                           id="rooms">
                        <thead>
                        <tr>
                            <th>Số phòng</th>
                            <th>Loại</th>
                            <th>Trạng thái</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach( $rooms as $room) {
                        ?>
                            <tr>
                                <td><?=$room->room_no?></td>
                                <td><?=$room->room_type?></td>
                                <td>
                                    <?php
                                    if (!$room->status) {
                                        echo "<a class='btn btn-success' href='datphong.php?room_id=$room->room_id&room_type_id=$room->room_type_id'>Book</a>";
                                    } else {
                                        echo '<button class="btn btn-danger" disabled>Booked</button>';
                                    }
                                    ?>
                                    </form>
                                <td>
                                    <?php
                                    if ($room->status) {
                                        if (!$rooms->check_in_status) {
                                            echo '<button class="btn btn-success" id="checkInRoom"  data-id="' . $room->room_id . '" data-toggle="modal" data-target="#checkIn">Check In</button>';
                                        } else {
                                            echo '<a href="#" class="btn btn-danger">Checked In</a>';
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($room->status && $room->check_in_status) {
                                        echo '<button class="btn btn-success" id="checkOutRoom" data-id="' . $room->room_id . '">Check Out</button>';
                                    } elseif ($room->status == 0) {
                                        echo '-';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-4">
                                    <button <?=$room->status?'disabled':''?> title="Edit Room Information" data-toggle="modal"
                                            data-target="#editRoom" data-id="<?=$room->room_id?>"
                                            id="roomEdit" class="btn btn-info edit"><i class="fa fa-pencil"></i></button>
                                        </div>
                                        <div class="col-lg-4">
                                    <?php
                                    if ($room->status) {
                                        echo '<button title="Customer Information" data-toggle="modal" data-target="#cutomerDetailsModal" data-id="' . $rooms->room_id . '" id="cutomerDetails" class="btn btn-warning"><i class="fa fa-eye"></i></button>';
                                    }
                                    ?>
                                </div>
                                <div class="col-lg-4">
                                    <form action="index.php" method="post">
                                        <input hidden name='del_id' value="<?=$room->room_id?>">
                                        <button <?=$room->status?'disabled':''?> class="btn btn-danger" onclick="return confirm('Are you Sure?')"><i
                                                    class="fa fa-trash" alt="delete"></i></button>
                                    </form>
                                </div>
                                    </div>
                                </td>
                            </tr>


                        <?php
                            }
                        ?>

                        <?php
                            echo "Không có phòng nào";
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Add Room Modal -->
    <div id="addRoom" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm Phòng Mới</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" action="index.php" data-toggle="validator" role="form">
                                <div class="response"></div>
                                <div class="form-group">
                                    <label>Loại Phòng</label>
                                    <select class="form-control" name="room_type_id" required
                                            data-error="Select">
                                        <option selected disabled>Chọn</option>
                                        <?php
                                          foreach( $roomTypes as $roomType) {
                                            echo '<option value="' . $roomType->room_type_id . '">' . $roomType->room_type . '</option>';
                                          }
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label>Số Phòng</label>
                                    <input class="form-control" placeholder="Room No" name="room_no"
                                           data-error="Enter Room No" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <button type="submit" name="add_room" class="btn btn-success pull-right">Thêm Phòng</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--Edit Room Modal -->
    <div id="editRoom" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Room</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="editRoom" action="index.php" method="post" data-toggle="validator" role="form">
                                <div class="edit_response"></div>
                                <div class="form-group">
                                    <input hidden name="edit_id" value="0">
                                    <label>Loại Phòng</label>
                                    <select class="form-control" id="edit_room_type" required
                                            data-error="Select Loại Phòng">
                                        <option selected disabled>Select Loại Phòng</option>
                                        <?php
                                          foreach( $roomTypes as $roomType) {
                                            echo '<option value="' . $roomType->room_type_id . '">' . $roomType->room_type . '</option>';
                                          }
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label>Room No</label>
                                    <input class="form-control" placeholder="Room No" id="edit_room_no" required
                                           data-error="Enter Room No">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <input type="hidden" name="room_id">
                                <button class="btn btn-success pull-right">Edit Room</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!---customer details-->
    <div id="cutomerDetailsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Customer Detail</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Customer Name</td>
                                    <td id="customer_name"></td>
                                </tr>
                                <tr>
                                    <td>Contact Number</td>
                                    <td id="customer_contact_no"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td id="customer_email"></td>
                                </tr>
                                <tr>
                                    <td>ID Card Type</td>
                                    <td id="customer_id_card_type"></td>
                                </tr>
                                <tr>
                                    <td>ID Card Number</td>
                                    <td id="customer_id_card_number"></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td id="customer_address"></td>
                                </tr>
                                <tr>
                                    <td>Remaining Amount</td>
                                    <td id="remaining_price"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---customer details ends here-->

    <!-- Check In Modal -->
    <div id="checkIn" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Check In Room</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Customer Name</td>
                                    <td id="getCustomerName"></td>
                                </tr>
                                <tr>
                                    <td>Loại Phòng</td>
                                    <td id="getRoomType"></td>
                                </tr>
                                <tr>
                                    <td>Room No</td>
                                    <td id="getRoomNo"></td>
                                </tr>
                                <tr>
                                    <td>Check In</td>
                                    <td id="getCheckIn"></td>
                                </tr>
                                <tr>
                                    <td>Check Out</td>
                                    <td id="getCheckOut"></td>
                                </tr>
                                <tr>
                                    <td>Total Price</td>
                                    <td id="getTotalPrice"></td>
                                </tr>
                                </tbody>
                            </table>
                            <form role="form" id="advancePayment">
                                <div class="payment-response"></div>
                                <div class="form-group col-lg-12">
                                    <label>Advance Payment</label>
                                    <input type="number" class="form-control" id="advance_payment"
                                           placeholder="Advance Payment">
                                </div>
                                <input type="hidden" id="getBookingID" value="">
                                <button type="submit" class="btn btn-primary pull-right">Payment & Check In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Check Out Modal-->
    <div id="checkOut" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Check Out Room</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Customer Name</td>
                                    <td id="getCustomerName_n"></td>
                                </tr>
                                <tr>
                                    <td>Loại Phòng</td>
                                    <td id="getRoomType_n"></td>
                                </tr>
                                <tr>
                                    <td>Room No</td>
                                    <td id="getRoomNo_n"></td>
                                </tr>
                                <tr>
                                    <td>Check In</td>
                                    <td id="getCheckIn_n"></td>
                                </tr>
                                <tr>
                                    <td>Check Out</td>
                                    <td id="getCheckOut_n"></td>
                                </tr>
                                <tr>
                                    <td>Total Amount</td>
                                    <td id="getTotalPrice_n"></td>
                                </tr>
                                <tr>
                                    <td>Remaining Amount</td>
                                    <td id="getRemainingPrice_n"></td>
                                </tr>
                                </tbody>
                            </table>
                            <form role="form" id="checkOutRoom_n" data-toggle="validator">
                                <div class="checkout-response"></div>
                                <div class="form-group col-lg-12">
                                    <label>Remaining Payment</label>
                                    <input type="text" class="form-control" id="remaining_amount"
                                           placeholder="Remaining Payment" required
                                           data-error="Please Enter Remaining Amount">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <input type="hidden" id="getBookingId_n" value="">
                                <button type="submit" class="btn btn-primary pull-right">Payment & Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">
            <p class="back-link">Summer Hotel</a></p>
        </div>
    </div>

</div>    <!--/.main-->
