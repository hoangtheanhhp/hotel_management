 <?php
    $detail = $data['detail'];
    $cRoom = new C_room();
    if(isset($_POST['booking_id'])) {
         $cRoom->postCheckIn($_POST);
    }
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php">
                    <em class="fa fa-home"></em>
                </a></li>
            <li ><a href="index.php">Quản lý phòng</a></li>
            <li class="active"><a href="room_checkin.php?room_id=<?=$detail->room_id?>">Check in phòng <?=$detail->room_no?></a></li>
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
                </div>
                <div class="panel-body">
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
                                    <td id="getCustomerName"><?=$detail->customer_name?></td>
                                </tr>
                                <tr>
                                    <td>Room Type</td>
                                    <td id="getRoomType"><?=$detail->room_type?></td>
                                </tr>
                                <tr>
                                    <td>Room No</td>
                                    <td id="getRoomNo"><?=$detail->room_no?></td>
                                </tr>
                                <tr>
                                    <td>Check In</td>
                                    <td id="getCheckIn"><?=$detail->check_in?></td>
                                </tr>
                                <tr>
                                    <td>Check Out</td>
                                    <td id="getCheckOut"><?=$detail->check_out?></td>
                                </tr>
                                <tr>
                                    <td>Total Price</td>
                                    <td id="getTotalPrice"><?=$detail->total_price?></td>
                                </tr>
                                </tbody>
                            </table>
                            <form role="form" method="post" action="room_checkin.php">
                                <div class="payment-response"></div>
                                <div class="form-group col-lg-12">
                                    <label>Advance Payment</label>
                                    <input type="number" class="form-control" name="pay" placeholder="Số tiền khách đưa">
                                    <input hidden name="booking_id" value="<?=$detail->booking_id?>">
                                    <input hidden name="room_id" value="<?=$detail->room_id?>">
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Check In</button>
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

