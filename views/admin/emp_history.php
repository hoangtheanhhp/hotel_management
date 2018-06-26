<?php
    $employee = $data['employee'];
    $history = $data['history'];
    $staffs = $data['staff'];
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Employee History</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Employee History</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Employee History</div>
                <div class="panel-body">
                    <p><b>Employee Name: </b> <?=$employee->emp_name?> </p>
                    <p><b>Employee Salary: </b> <?=$employee->salary.'/-' ?></p>
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%"
                           id="rooms">
                        <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Shift</th>
                            <th>From Date</th>
                            <th>To Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $count = 0;
                            foreach( $history as $staff) {
                                $count++;
                        ?>
                            <tr>
                                <td><?=$count ?></td>
                                <td><?=$staff->shift.' - '.$staff->shift_timing ?></td>
                                <td><?=date('M j, Y', strtotime($staff->from_date)) ?></td>
                                <td>
                                    <?php
                                    if ($staff->to_date == NULL){
                                        echo "<div class='color-blue'>Currently Working</div>";
                                    }else{
                                        echo date('M j, Y', strtotime($staff->to_date));


                                    }?>
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

    <div class="row">
        <div class="col-sm-12">
            <p class="back-link">MIS Developed by <a href="https://www.pcsaini.in">pcsaini</a></p>
        </div>
    </div>

</div>    <!--/.main-->