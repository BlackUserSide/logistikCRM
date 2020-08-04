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
        $this->pageData['dataTransaction'] = array_reverse($this->model->getDatTransaction());
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
            $this->model->addTransaction($date, $company, $customer, $route, $sumIn, $formPay, $sumPay, $datePay, $income);
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
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
}