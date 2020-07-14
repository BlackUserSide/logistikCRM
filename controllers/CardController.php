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
        $this->pageData['titleMain'] = 'Клиенты';
        $this->pageData['countTask'] = count($this->model->getTask());
        $this->pageData['title'] = 'Карта';
        $this->view->render($this->pageTpl, $this->pageData);

    }

}