<?php
include('controller.php');
include('../model/m_request.php');


class C_request extends Controller{
    public function create()
    {
        include_once 'views/request.php';
    }

    public function store($request=array())
    {
        $mRequest = new M_request;
        $mRequest->store($request);
        header('location:index.php');
    }

    public function index($request=array())
    {
        $mRequest = new M_request;
        $request = $mRequest->getAllRequests();
        $data = [
            'request' => $request, 
        ];
        return $this->loadView('req',$data);
    }

    public function changeStatus($id) {
        $mRequest = new M_request;
        $request = $mRequest->changeStatus($id);
        header('location:request.php');
    }
}

?>