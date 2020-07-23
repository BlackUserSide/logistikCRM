<?php


class UsersController extends Controller
{
    private $pageTpl = '/views/users.tpl.php';

    public function __construct()
    {
        $this->model = new UsersModel();
        $this->view = new View();
    }

    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /');
        }

        $this->pageData['titleMain'] = 'Сотрудники';
        $this->pageData['countTask'] = count($this->model->getTask());
        $this->pageData['title'] = 'Список сотрудников';
        $this->pageData['usersList'] = array_reverse($this->model->getUsers());
        $this->view->render($this->pageTpl, $this->pageData);
    }
    public function deleteUser()
    {
        if (!empty($_POST)) {
            if ($_POST['id'] == $_SESSION['user']['id']) {
                echo json_encode(array('status' => 'error'));
            } else {
                $this->model->dellUser($_POST['id']);
                echo json_encode(array('status' => 'success'));
            }
        }
    }
    public function changeStatus()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            if ($id == $_SESSION['user']['id']) {
                echo json_encode(array('status' => 'error'));
            } else {
                $statusUser = $this->model->getStatus($id);
                if ($statusUser == '1') {
                    $newStatus = 2;
                } else {
                    $newStatus = 1;
                }
                $this->model->updateStatus($id, $newStatus);
                echo json_encode(array('status' => 'success'));
            }
        }
    }
    public function register()
    {
        if (!empty($_POST)) {
            $login = $_POST['login'];
            if ($this->model->checkUser($login)) {
                
                $name = $_POST['name'];
                $lastName = $_POST['lastName'];
                $mail = $_POST['email'];
                $servNumber = $_POST['servNumber'];
                $password = $_POST['password'];
                $password = md5($password);
                $this->model->registerUser($login, $name, $lastName, $mail, $servNumber, $password);
                echo json_encode(array('status' => 'success'));
            } else {
                echo json_encode(array('status' => 'wrong'));
            }
            
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }
}
