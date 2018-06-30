<?php
    $rType = $data['rType'];

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Quản lý loại phòng</li>
        </ol>
    </div><!--/.row-->

    <br>

    <div class="row">
        <div class="col-lg-12">

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Quản lý loại phòng
                    <a class="btn btn-info pull-right" href="add_roomtype.php">Thêm Loại Phòng</a>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%"
                           id="rooms">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ảnh</th>
                            <th>Tên phòng</th>
                            <th>Giá phòng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach( $rType as $r) {
                        ?>
                            <tr>
                                <td><?=$r->room_type_id?></td>
                                <td><img src="../images/<?=$r->image?>" tag="" height="100"></td>
                                <td><?=$r->room_type?></td>
                                <td><?=$r->price?></td>
                           
                               
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

    <div class="row">
        <div class="col-sm-12">
            <p class="back-link">Summer Hotel</a></p>
        </div>
    </div>

</div>    <!--/.main-->
