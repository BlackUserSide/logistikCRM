<?php 

class TransactionsController extends Controller
{
    private $pageTpl = '/views/transactions.tpl.php';
    
    public function __construct()
    {
        $this->model = new TransactionsModel();
        $this->view = new View();
    }

    public function index ()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /');
        }
        $this->pageData['titleMain'] = 'Сделки';
        $this->pageData['countTask'] = count($this->model->getTask());
        $this->pageData['title'] = 'Сделки';
        if ($_SESSION['user']['status'] == '1') {
            $this->pageData['dataTransaction'] = array_reverse($this->model->getDatTransaction());
        } else if ($_SESSION['user']['status'] == '2') {
            $this->pageData['dataTransaction'] = array_reverse($this->model->getDatTransactionUser($_SESSION['user']['id']));
        } else {
            $this->pageData['dataTransaction'] = array_reverse($this->model->getDatTransaction());
        }
        
        $this->view->render($this->pageTpl, $this->pageData);
    }
    public function addTransaction()
    {
        if (!empty($_POST)) {
            $date = $_POST['date'];
            $company = $_POST['company'];
            $customer = $_POST['customer'];
            $route = $_POST['route'];
            $sumIn = $_POST['sumIn'];
            $formPay = $_POST['formPay'];
            $datePay =$_POST['datePay'];
            $sumPay = $_POST['sumPay'];
            $income = $_POST['income'];
            $idUser = $_SESSION['user']['id'];
            $nameComp = $_POST['nameCompany'];
            $idCompany = $this->model->getIdCompany($nameComp);
            $this->model->addTransaction($date, $company, $customer, $route, $sumIn, $formPay, $sumPay, $datePay, $income, $idUser, $idCompany);
            echo json_encode(array('status' => 'success', 'id' => $nameComp));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }
    public function testcomp() {
        $nameComp = 'test';
        $idCompany = $this->model->getIdCompany($nameComp); 
        echo $idCompany;
    }
    public function getDataChange()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $data = $this->model->getDataChange($id);
            echo json_encode(array('status' => 'success', 'data' => $data));
        } else {

        }
    }
    public function updateTransaction()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $val = $_POST['valChange'];
            $changeInp = $_POST['changeInp'];
            $this->model->updateTransaction($id, $val, $changeInp);
            echo json_encode(array('status' => 'success'));
        } else {

        }
    }
    public function getNameCompany()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $name = $this->model->getNameCompany($id);
            echo json_encode(array('statsu' => 'success', 'data' => $name));
        }
    }
}