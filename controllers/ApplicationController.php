<?php


class ApplicationController extends Controller
{
    private $pageTpl = '/views/application.tpl.php';

    public function __construct()
    {
        $this->model = new ApplicationModel();
        $this->view = new View();
    }
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /');
        }
        $this->pageData['titleMain'] = 'Заявки';
        $this->pageData['dataApplication'] = array_reverse($this->model->getDataApp());
        $this->pageData['countTask'] = count($this->model->getTask());
        $this->pageData['title'] = 'Заявки с сайта';
        $this->view->render($this->pageTpl, $this->pageData);
    }
    public function getFullText()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $dataFullText = $this->model->getDataFull($id);
            echo json_encode(array('status' => 'success', 'data' => $dataFullText));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }
    public function addAppInDB() {
        if (!empty($_POST)) {
            if($_POST['fromWhere'] == '') {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $fromWhere = ''; 
                $whereFrom = '';
                $typeCargo = '';
                $text = '';
                $widtch = '';
                $this->model->addAppInDB($name, $phone, $fromWhere, $whereFrom, $typeCargo, $text, $widtch);
            } else {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $fromWhere = $_POST['fromWhere'];
                $whereFrom = $_POST['whereFrom'];
                $typeCargo = $_POST['typeCargo'];
                $text = $_POST['text'];
                $widtch = $_POST['widtch'];
                $this->model->addAppInDB($name, $phone, $fromWhere, $whereFrom, $typeCargo, $text, $widtch);
            }
        } else {

        }
    }
}
