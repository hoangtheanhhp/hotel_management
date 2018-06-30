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
    if(isset($_POST['edit_room'])) {
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
                                        if (!$room->check_in_status) {
                                            echo '<a class="btn btn-success" href="room_checkin.php?room_id=' . $room->room_id . '">Check In</button>';
                                        } else {
                                            echo '<a disabled class="btn btn-danger">Checked In</a>';
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($room->status && $room->check_in_status) {
                                        echo '<a class="btn btn-success" href="room_checkout.php?room_id=' . $room->room_id . '">Check Out</a>';
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
                                        echo '<a class="btn btn-warning" href="room_detail.php?room_id='.$room->room_id.'"><i class="fa fa-eye"></i></a>';
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
                                    <select class="form-control" name="room_type_id" required
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
                                    <input class="form-control" placeholder="Room No" name="room_no" required
                                           data-error="Enter Room No">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <button type="submit" name="edit_room" class="btn btn-success pull-right">Edit Room</button>
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
