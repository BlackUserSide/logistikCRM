<?php


class UsersController extends Controller
{
    private $pageTpl = '/views/users.tpl.php';

    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /');
        }
        $this->pageData['titleMain'] = 'Сотрудники';
        $this->pageData['countTask'] = count($this->model->getTask());
        $this->model = new UsersModel();
        $this->view = new View();        
    }

    public function index()
    {
        $this->pageData['title'] = 'Список сотрудников';
        $this->view->render($this->pageTpl, $this->pageData);
    }
}