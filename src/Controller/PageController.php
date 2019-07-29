<?php

namespace App\Controller;

use App\Model\Portfolio;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PageController extends AbstractController {

    public function portfolio() {

        // récupération des items du portfolio
        $portfolio = new Portfolio();

        return $this->render('portfolio.twig', [
            'portfolio' => $portfolio->get_all()
        ]);
    }


    public function portfolio_item($id, $title) {
        return new Response("<p>portfolio à afficher : $id et le titre est $title</p>");
    }


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