<?php

class ZangeressenController extends BaseController
{
    private $zangeresModel;

    public function __construct()
    {
        $this->zangeresModel = $this->model('Zangeres');
    }

    public function index($display = 'none', $message = '')
    {
        $result = $this->zangeresModel->getAllZangeressen();

        $data = [
            'title' => 'Rijkste Zangeressen',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        $this->view('zangeressen/index', $data);
    }

    public function delete($id)
{
    $result = $this->zangeresModel->delete($id);

    header('Refresh: 3; url=' . URLROOT . '/ZangeressenController/index');

    $this->index('flex', 'Record is verwijderd');
}

    public function create()
    {
        $data = [
            'title' => 'Nieuwe zangeres toevoegen',
            'display' => 'none',
            'message' => '',
            'errors' => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $errors = [];

            if (empty($_POST['naam'])) {
                $errors['naam'] = 'Voer een naam in';
            }

            if (empty($_POST['land'])) {
                $errors['land'] = 'Voer een land in';
            }

            if (empty($_POST['vermogen']) || $_POST['vermogen'] <= 0) {
                $errors['vermogen'] = 'Voer een geldig vermogen in';
            }

            if (empty($_POST['leeftijd']) || $_POST['leeftijd'] < 10) {
                $errors['leeftijd'] = 'Leeftijd moet groter dan 10 zijn';
            }

            if (empty($_POST['aantalhits'])) {
                $errors['aantalhits'] = 'Voer aantal hits in';
            }

            if (empty($_POST['debuutjaar'])) {
                $errors['debuutjaar'] = 'Voer een debuutjaar in';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
                $this->zangeresModel->create($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'Record opgeslagen';
                $data['color'] = 'success';

                header('Refresh:3; url=' . URLROOT . '/ZangeressenController/index');
            }
        }

        $this->view('zangeressen/create', $data);
    }

    public function update($id = NULL)
    {
        $data = [
            'title' => 'Wijzig zangeres',
            'display' => 'none',
            'message' => '',
            'errors' => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $errors = [];

            if (empty($_POST['naam'])) {
                $errors['naam'] = 'Voer een naam in';
            }

            if (empty($_POST['land'])) {
                $errors['land'] = 'Voer een land in';
            }

            if ($_POST['vermogen'] <= 0) {
                $errors['vermogen'] = 'Ongeldig vermogen';
            }

            if ($_POST['leeftijd'] < 10) {
                $errors['leeftijd'] = 'Te jong';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
                $data['color'] = 'danger';
            } else {
                $this->zangeresModel->updateZangeres($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'Succesvol opgeslagen';
                $data['color'] = 'success';

                header('Refresh:3; url=' . URLROOT . '/ZangeressenController/index');
            }
        }

        $data['zangeres'] = $this->zangeresModel->getZangeresById($id);
        $this->view('zangeressen/update', $data);
    }
}