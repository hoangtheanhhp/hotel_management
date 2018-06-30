<?php
    $request = $data['request'];
    if (isset($_POST['id'])) {
        $cRequest = new C_request;
        $cRequest->changeStatus($_POST['id']);
    }
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Yêu cầu</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Yêu cầu</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Yêu cầu</div>
                <div class="panel-body">
                    <?php
                    if (isset($_GET['resolveError'])) {
                        echo "<div class='alert alert-danger'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error on Resolve !
                            </div>";
                    }
                    if (isset($_GET['resolveSuccess'])) {
                        echo "<div class='alert alert-success'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Complaint Successfully Resolve !
                            </div>";
                    }
                    ?>
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%" id="rooms">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ tên khách hàng</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Yêu cầu</th>
                            <th>Liên Lạc</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($request as $r) {
                        ?>
                            <tr>
                                <td><?=$r->id?></td>
                                <td><?=$r->name?></td>
                                <td><?=$r->phone?></td>
                                <td><?=$r->email?></td>
                                <td><?=$r->room_type?></td>
                                <td>
                                    <form method="post" action="request.php">
                                        <input hidden name="id" value="<?=$r->id?>">
                                    <?php
                                    if ($r->status) {
                                        echo "<button class='btn btn-success' disabled>Đã liên lạc</button>";
                                    } else {
                                        echo "<button type='submit' class='btn btn-warning' >Liên lạc</button>";
                                    }
                                ?>
                                    </form>
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