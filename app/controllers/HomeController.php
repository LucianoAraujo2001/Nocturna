<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Product.php';

class HomeController extends Controller
{
    public function index()
    {
        $featured = Product::featured(4);
        $this->render('home/index', ['featured' => $featured]);
    }
}
?>