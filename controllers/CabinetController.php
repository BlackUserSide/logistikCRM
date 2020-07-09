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
        $this->pageData['titleMain'] = 'Главная';
        $this->pageData['countTask'] = count($this->model->getTask());
        $this->pageData['closeTask'] = $this->model->getCloseTask();
        if ($this->pageData['closeTask'] != '') {
            $this->pageData['closeTask'] = array_slice($this->model->getCloseTask(), 0, 3);
        }
        $this->pageData['activeTask'] = $this->model->getActiveTask();
        if (!empty($this->pageData['activeTask'])) {
            $this->pageData['activeTask'] = array_slice($this->model->getActiveTask(), 0, 3);
        }
        $this->pageData['test'] = $this->model->getTask();
        $this->pageData['title'] = 'Личный кабинет ' . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['lastName'] . ' || TransCRM';
        $this->view->render($this->pageTpl, $this->pageData);
    }
    public function logOut()
    {
        session_destroy();
        echo json_encode(array('status' => 'success'));
    }
    public function getNameTask()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $data = $this->model->getNameTask($id);
            foreach ($data as $key => $val) {
                $name = $val['name'];
                $lastName = $val['lastName'];
            }
            echo json_encode(array('status' => 'success', 'name' => $name, 'lastName' => $lastName));
        } else {
            echo json_encode(array('status' => 'success'));
        }
    }
    public function getUserData()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $data = $this->model->getDataUser($id);
            echo json_encode(array('status' => 'success', 'data' => $data));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }
    public function getNotificationUser()
    {
        $id = $_SESSION['user']['id'];
        $data = $this->model->getNotification($id);
        if (!empty($data)) {
            echo json_encode($data);
        } else {
            echo json_encode(array('data' => 'empty'));
        }
    }
    public function countUserNotification()
    {
        $id = $_SESSION['user']['id'];
        
        if (!empty($this->model->getNotificationRow($id))) {
            $count = count($this->model->getNotificationRow($id));
            echo json_encode($count); 
        } else {
            $count = 0;
            echo json_encode($count);
        }
       
    }
    public function changeStatusNot()
    {
        $id = $_SESSION['user']['id'];
        $this->model->readUpdate($id);
    }
    public function dellAllNotife()
    {
        $id = $_SESSION['user']['id'];
        $this->model->dellAllNotife($id);
    }
    public function createNotification($id,  $text) {
        if ($id !== '' && $text !== '') {
            $date = date("m.d.y");
            $this->model->createNotification($id, $text, $date);
            return true;
        } else {
            return false;
        }
    }
}
