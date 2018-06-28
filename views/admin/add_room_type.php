<?php
    $cRoomType = new C_roomtype;
    if( isset($_POST['name'])) {
        $cRoomType->store($_POST);
    }
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Thêm loại phòng</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm loại phòng</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Loại phòng:</div>
                <div class="panel-body">
                    <div class="emp-response"></div>
                    <form role="form" action="add_roomtype.php" method="post" data-toggle="validator" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Tên loại phòng</label> 
                                <input class="form-control" required data-error="Hãy nhập loại phòng" placeholder="Phòng Cao Cấp" name="name">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Giá</label>
                                <input class="form-control" required data-error="Hãy nhập số tiền" placeholder="1000" name="price">                               
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Ảnh</label>
                                <input type="file" name="image" class="form-control-file" >
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




