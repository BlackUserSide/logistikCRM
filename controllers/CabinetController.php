<?php



class CabinetController extends Controller
{

    private $pageTpl = '/views/cabinet.tpl.php';
    public function __construct()
    {
        $this->model = new CabinetModel();
        $this->view = new View();
    }

    public function index()
    {

        if (!isset($_SESSION['user'])) {
            header('Location: /');
        }
        
        $this->pageData['title'] = 'Главная страница || TransCRM';
        $this->view->render($this->pageTpl, $this->pageData);
    }
    public function logOut()
    {
        session_destroy();
        echo json_encode(array('status' => 'success'));
    }
    
    
}
