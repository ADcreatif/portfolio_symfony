<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController {
    public function httpGetMethod() {

        return $this->render("home.html.twig");
    }

    //{prenom}-{banane}/{id_product}-{title}
    public function dire_bonjour($prenom) {

        $homelink = $this->generateUrl('index');

        return $this->render("default.html.twig", [
            'prenom' => $prenom,
            'homelink' => $homelink
        ]);
    }


    //{prenom}-{banane}/{id_product}-{title}
    public function advanced($prenom, $banane, $id_product, $title) {

        $homelink = $this->generateUrl('index');

        return $this->render("default.html.twig", [
            'prenom' => $prenom,
            'homelink' => $homelink
        ]);
    }
}