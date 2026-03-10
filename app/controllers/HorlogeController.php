<?php

class HorlogeController extends BaseController
{
    private $horlogeModel;

    public function __construct()
    {
        $this->horlogeModel = $this->model('Horloge');
    }

    public function index($display = 'none', $message = '')
    {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->horlogeModel->getAllHorloges();

        //var_dump($result);

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title'  => 'Overzicht Horloges',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen
         */
        $this->view('horloges/index', $data);
    }

    public function details($id)
    {
        $result = $this->horlogeModel->delete($id);
        
        header('Refresh:3; url=' . URLROOT . '/HorlogeController/index');

        $this->index('flex', 'Record is verwijderd');
    }
}