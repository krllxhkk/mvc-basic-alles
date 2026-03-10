<?php

class SneakerController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('Sneaker');
    }

    public function index($display = 'none', $message = '')
    {
        $result = $this->sneakerModel->getAllSneakers();

        $data = [
            'title' => 'Mooiste Sneakers',
            'display' => $display,
            'message' => $message,
            'sneakers' => $result
        ];

        $this->view('sneakers/index', $data);
    }
    public function details($id)
    {
        $result = $this->sneakerModel->delete($id);
        
        header('Refresh:3; url=' . URLROOT . '/SneakerController/index');

        $this->index('flex', 'Record is verwijderd');
    }
}