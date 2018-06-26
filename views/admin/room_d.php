<?php
    $detail = $data['detail'];
    var_dump($detail);
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active"><a href="index.php">Quản lý phòng</a></li>
            <li class="active"><a href="room_detail.php?room_id=<?=$detail->room_id?>">Thông tin phòng <?=$detail->room_no?></a></li>
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
                                    <th>Title</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Customer Name</td>
                                    <td id="customer_name"><?=$detail->customer_name?></td>
                                </tr>
                                <tr>
                                    <td>Contact Number</td>
                                    <td id="customer_contact_no"><?=$detail->contact_no?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td id="customer_email"><?=$detail->email?></td>
                                </tr>
                                <tr>
                                    <td>ID Card Type</td>
                                    <td id="customer_id_card_type"><?=$detail->id_card_type?></td>
                                </tr>
                                <tr>
                                    <td>ID Card Number</td>
                                    <td id="customer_id_card_number"><?=$detail->id_card_no?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td id="customer_address"><?=$detail->address?></td>
                                </tr>
                                <tr>
                                    <td>Remaining Amount</td>
                                    <td id="remaining_price"><?=$detail->remaining_price?> VNĐ</td>
                                </tr>
                                </tbody>
                            </table>
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
