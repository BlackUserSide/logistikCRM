<?php


class IndexController extends Controller
{
    private $pageTpl = '/views/index.tpl.php';

    public function __construct()
    {
        $this->model = new IndexModel();
        $this->view = new View();
    }

    public function index()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /cabinet');
        }
        $this->pageData['title'] = 'Главная страница || ТрансCRM';
        $this->view->render($this->pageTpl, $this->pageData);
    }
    public function loginUser()
    {
        if (!empty($_POST)) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            if ($this->model->loginUser($login, $password)) {
                echo json_encode(array('status' => 'success'));
            } else {
                echo json_encode(array('status' => 'uncorrect'));
            }
        } else {
            echo json_encode(array('status' => 'empty'));
        }
    }
    
}
