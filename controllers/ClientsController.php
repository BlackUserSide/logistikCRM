<?php



class ClientsController extends Controller
{
    private $pageTpl = '/views/clients.tpl.php';

    public function __construct()
    {
        $this->model = new ClientsModel();
        $this->view = new View();
    }
    public function index()
    {
        if (!isset($_GET)) {
        } else if ($_GET['cli'] === 'routes') {
            $this->pageData['getDataRoutes'] = $this->model->getDataRoutes();
        } else if ($_GET['cli'] === 'carriers') {
            $this->pageData['getDataCar'] = $this->model->getDataCar();
        } else {
            $this->pageData['getDataComp'] = $this->model->getDataComp();
        }
        if (!isset($_SESSION['user'])) {
            header('Location: /');
        }
        $this->pageData['titleMain'] = 'Клиенты';
        $this->pageData['countTask'] = count($this->model->getTask());
        $this->pageData['title'] = 'База клиентов';
        $this->view->render($this->pageTpl, $this->pageData);
    }
    public function dellOne()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $this->model->deleOne($id);
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }
    public function getNameCompany()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $result = $this->model->getNameCompany($id);
            echo json_encode(array('status' => 'success', 'data' => $result));
        } else {
            echo json_encode(array('status' => 'erorr'));
        }
    }
    public function addCompany()
    {
        if (!empty($_POST)) {
            $name = $_POST['nameCompany'];
            $country = $_POST['country'];
            $city = $_POST['city'];
            $phone = $_POST['phone'];
            $mail = $_POST['email'];
            $adress = $_POST['adress'];
            $contact = $_POST['contactName'];
            $this->model->addCompany($name, $country, $city, $phone, $mail, $adress, $contact);
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'wrong'));
        }
    }
    public function addRoutes()
    {
        if (!empty($_POST)) {
            $route = $_POST['routes'];
            $price = $_POST['price'];
            $kilometers = $_POST['kilometers'];
            $idComp = $_POST['idComp'];
            $idCar = $_POST['idCarr'];
            $this->model->addRoutes($route, $price, $kilometers, $idComp, $idCar);
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'wrong'));
        }
    }
    public function addCarr()
    {
        if (!empty($_POST)) {
            $carModel = $_POST['carModel'];
            $carNumber = $_POST['carNumber'];
            $nameDriver = $_POST['nameDriver'];
            $driverContact = $_POST['driverContact'];
            $typeCar = $_POST['typeCar'];
            $cubes = $_POST['cubes'];
            $this->model->addCarr($carModel, $carNumber, $nameDriver, $driverContact, $typeCar, $cubes);
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }
    public function dellOneRoutes()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $this->model->dellOneRoutes($id);
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }
    public function dellOneCarr()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $this->model->dellOneCarr($id);
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }
}
