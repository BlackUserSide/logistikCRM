<?php



class ClientsController extends Controller
{

    private $pageTpl = '/views/clients.tpl.php';
    private $mailTpl = '/views/mail/mail.html';
    public function __construct()
    {
        $this->model = new ClientsModel();
        $this->view = new View();
    }
    public function index()
    {
        if (empty($_GET)) {
            header('Location: /cabinet/clients?cli=company');
        }
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
    public function getCall()
    {
        if (!empty($_POST)) {
            $number = $_POST['number'];
            $numberUser = $_SESSION['user']['number'];
            $this->callNumber($numberUser, $number);
        } else {
        }
    }
    public function callNumber($numberUser, $externalNumber)
    {
        $key = '0c0b9c-d0e48c2';
        $secret = '90821b-5114b4-6da922-aee308-c315bce0';
        $api = new BinotelApi($key, $secret);
        $result = $api->sendRequest('calls/internal-number-to-external-number', array(
            'internalNumber' => $numberUser,
            'externalNumber' => $externalNumber
        ));
        if ($result['status'] === 'success') {
            return true;
        } else {
            printf('REST API ошибка %s: %s %s', $result['code'], $result['message'], PHP_EOL);
        }
    }
    public function sendMailAll()
    {
        if (!empty($_POST)) {
            $text = $_POST['textMail'];
            $data = $this->model->getAllCompany();
            foreach ($data as $key => $val) {
                $mail = $val['mail'];
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                $emeilText = file_get_contents(ROOT . $this->mailTpl);
                $emeilText = str_replace('%textMail%', $text, $emeilText);
                mail($mail, "Сообщение от команды TransCorporation", $emeilText, $headers);
            }
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'wrong'));
        }
    }
    public function sendMail()
    {
        if (!empty($_POST)) {
            $mail = $_POST['mail'];
            $text = $_POST['textMail'];
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $emeilText = file_get_contents(ROOT . $this->mailTpl);
            $emeilText = str_replace('%textMail%', $text, $emeilText);
            mail($mail, "Сообщение от команды TransCorporation", $emeilText, $headers);
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'wrong'));
        }
    }
}
