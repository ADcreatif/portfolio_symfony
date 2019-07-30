<?php

namespace App\Controller;

use App\Model\Portfolio;
use App\Entity\Portfolio as Portfolio_entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class PortfolioController extends AbstractController {

    // ajoute un nouveau projet
    public function portolio_add(Request $request) {

        $title = $request->query->get('title');
        $image = $request->query->get('image');
        $client = $request->query->get('client');
        $url = $request->query->get('url');
        $published_date = $request->query->get('published_date');
        $technos = $request->query->get('technos');
        $description = $request->query->get('description');

        $portfolio = new Portfolio($this->getDoctrine()->getManager(Portfolio_entity::class));
        $portfolio->add($title, $image, $client, $url, $published_date, $technos, $description);

        return $this->render('portfolio_add.twig');
    }

    // affiche tous les projets
    public function portfolio() {

        $portfolio = new Portfolio();

        return $this->render('portfolio.twig', [
            'portfolios' => $portfolio->get_all()
        ]);
    }

    // affiche 1 seul projet
    public function portfolio_project($id, $title) {

        $portfolio = new Portfolio();

        return $this->render('portfolio_project.twig', [
            'project' => $portfolio->get($id)
        ]);
    }


}