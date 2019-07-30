<?php

namespace App\Controller;

use App\Model\Portfolio;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PageController extends AbstractController {

    public function index() {
        return $this->render("home.twig");
    }

    public function contact() {

        return $this->render("contact.twig");
    }

    public function admin() {

        return $this->render("admin.twig");
    }

}