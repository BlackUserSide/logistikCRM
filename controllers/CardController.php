<?php


class CardController extends Controller 
{
    private $pageTpl = '/views/card.tpl.php';

    public function __construct()
    {
        $this->model = new CardModel();
        $this->view = new View();
    }

    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /');
        }
        $idCard = $_GET['id'];
        $referal = $_GET['ref'];
        if ($referal === 'comp') {
            $table = 'company';
        } else if ($referal === 'routes') {
            $table = 'routes';
        } else {
            $table = 'carriers';
        }
        if (!empty ($this->model->getDataComments($idCard, $table))) {
            $this->pageData['comments'] = array_reverse($this->model->getDataComments($idCard, $table));
        }
        
        if ($_FILES) {
            if ($_FILES == '') {
                $this->pageData['error'] = 'Недопустимый формат файла';
            } else {
                if (move_uploaded_file($_FILES['docs']['tmp_name'], UPLOAD_FOLDER.$_FILES['docs']['name'])) {
                    $name = $_FILES['docs']['name'];
                    $this->model->addDocs($idCard, $table, $name);
                    header('Location: /cabinet/card?id='.$idCard.'&ref='.$referal);
                }
            }
        }
        
        $this->pageData['docs'] = $this->model->getDocsCard($idCard, $table);
        if (!empty($this->pageData['docs'])) {
            $this->pageData['countDocs'] = count($this->pageData['docs']);
        } else {
            $this->pageData['countDocs'] = 0;
        }
        if (!empty($this->model->getRoutesCard($idCard, $table))){
            $this->pageData['countRoutes'] = count($this->model->getRoutesCard($idCard, $table));
            $this->pageData['dataRoutesId'] = array_reverse($this->model->getRoutesCard($idCard, $table));
        } else {
            $this->pageData['countRoutes'] = 0;
        }
        $this->pageData['dataCard'] = $this->model->getDataCard($idCard, $table);
        $this->pageData['titleMain'] = 'Клиенты';
        $this->pageData['countTask'] = count($this->model->getTask());
        $this->pageData['title'] = 'Карта';
        $this->view->render($this->pageTpl, $this->pageData);

    }
    public function getCarrName()
    {
        if (!empty($_POST)) {
            $result = $this->model->getCarrName($_POST['id']);
            echo json_encode($result);
        }
    }
    public function getCompName()
    {
        if (!empty($_POST)) {
            $result = $this->model->getCompName($_POST['id']);
            echo json_encode($result);
        }
    }
    public function deleteCard()
    {
        if (!empty($_POST)) {
            $this->model->deleteCard($_POST['id'], $_POST['ref']);
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'wrong'));
        }
    }
    public function addComments()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $this->model->addComments($_POST['ref'], $_POST['text'], $id);
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'wrong'));
        }
    }
    public function takeNameUser()
    {
        if (!empty($_POST)) {
            $result = $this->model->getNameUser($_POST['id']);
            foreach ($result as $key => $val) {
                $name = $val['name'];
                $lastName = $val['lastName'];
            }
            echo json_encode(array('name' =>$name, 'lastName' => $lastName));
        }
    }
    public function dellComments()
    {
        if (!empty($_POST)) {
            $this->model->dellCommets($_POST['id']);
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'wrong'));
        }
    }
    public function dellDoc()
    {
        if (!empty($_POST)) {
            $this->model->dellDoc($_POST['id']);
            unlink('./docs/'.$_POST['name']);
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'wrong'));
        }
    }
}