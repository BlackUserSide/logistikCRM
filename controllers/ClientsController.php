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
        if(!isset($_GET)){
            
        } else if ($_GET['cli'] === 'routes') {
            $status = $_GET['cli'];
            $this->pageData['statusLink'] = $this->model->getDataRoutes($status);
        } else if ($_GET['cli'] === 'carriers') {
            $status = $_GET['cli'];
            $this->pageData['statusLink'] = $this->model->getDataCar($status);
        } else {
            $status = $_GET['cli'] = 'companies';
            $this->pageData['statusLink'] = $this->model->getDataComp($status);
        }
        $this->pageData['titleMain'] = 'Клиенты';
        $this->pageData['countTask'] = count($this->model->getTask());
        $this->pageData['title'] = 'База клиентов';
        $this->view->render($this->pageTpl, $this->pageData);
    }
}