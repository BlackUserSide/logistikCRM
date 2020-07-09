<?php



class TaskController extends Controller
{
    private $pageTpl = '/views/task.tpl.php';

    public function __construct()
    {
        $this->model = new TaskModel();
        $this->view = new View();
    }
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /');
        }
        $this->pageData['titleMain'] = 'Задачи';
        $this->pageData['countTask'] = count($this->model->getTaskActive());
        $this->pageData['getTaskUser'] = $this->model->getTaskUser();
        if (!empty($this->pageData['getTaskUser'])) {
            usort($this->pageData['getTaskUser'], function ($a, $b) {
                return ($a['status'] - $b['status']);
            });
        }
        
        $this->pageData['title'] = 'Задачи для ' . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['lastName'] . ' || TransCRM';
        $this->view->render($this->pageTpl, $this->pageData);
    }
    public function getTaskInfo()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $result = $this->model->getTaskInfo($id);
            foreach ($result as $key => $val) {
                $id = $val['id'];
                $textTask = $val['textTask'];
                $date = $val['date'];
                $idResponsible = $val['id_Responsible'];
                $idGive = $val['id_Give'];
                $tagTask = $val['tagTask'];
                $status = $val['status'];
            }
            echo json_encode(array(
                'res' => 'success', 'textTask' => $textTask, 'date' => $date, 'idResponsible' => $idResponsible,
                'idGive' => $idGive, 'tagTask' => $tagTask, 'status' => $status, 'id' => $id
            ));
        } else {
            echo json_encode(array('status' => 'empty'));
        }
    }
    public function updateStatusTask()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $result = $this->model->getTaskInfo($id);
            foreach($result as $key => $val) {
                $idG = $val['id_Give'];
                
            }
            $text = ''.$_SESSION['user']['lastName'].''.$_SESSION['user']['name'].' выполнил ваше задание';
            $this->createNotification($idG, $text);
            $this->model->updateStatusTask($id);
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'wrong'));
        }
    }
    public function dellTask()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $this->model->deleteTask($id);
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'wrong'));
        }
    }
   
    public function addTask()
    {
        if (!empty($_POST)) {
            $date = date("m.d.y");
            $textTask = $_POST['textTusk'];
            $tageTask = $_POST['tageTask'];
            $id = $_POST['idUser'];
            $this->model->addTask($textTask, $tageTask, $id, $date);
            $text = 'Новая задача от '.$_SESSION['user']['lastName'].' '.$_SESSION['user']['name'].'';
            $this->createNotification($id, $text);
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
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
