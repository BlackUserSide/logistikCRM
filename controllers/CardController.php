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
        $this->pageData['dataCard'] = $this->model->getDataCard($idCard, $table);
        $this->pageData['titleMain'] = 'Клиенты';
        $this->pageData['countTask'] = count($this->model->getTask());
        $this->pageData['title'] = 'Карта';
        $this->view->render($this->pageTpl, $this->pageData);

    }

}