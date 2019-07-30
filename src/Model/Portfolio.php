<?php

namespace App\Model;

use App\Entity\Portfolio as Portfolio_entity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class Portfolio extends ServiceEntityRepository {

    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Portfolio_entity::class);
    }

    function add($title, $image, $client, $url, $published_date, $technos, $description) {

        // préparation des données
        $project = new Portfolio_entity();
        $project->setTitle($title);
        $project->setImage($image);
        $project->setClient($client);
        $project->setUrl($url);
        $project->setPublishedDate($published_date);
        $project->setTechnos($technos);
        $project->setDescription($description);

        // insertion dans la base
        $entityManager = $this->getEntityManager();
        $entityManager->persist($project);
        $entityManager->flush();
    }


    /**
     * @param $id
     * @return Portfolio_entity
     */
    function get($id) {
        return $this->find($id);
    }

    function remove($id) {
        $entityManager = $this->doctrine->getManager();
        $entityManager->remove($id);
        $entityManager->flush();
    }

    function update($id) {
        $project = $this->get($id);
        $project->setTitle("nouveau titre");

        // enregistrement de la mise à jour
        $entityManager = $this->doctrine->getManager();
        $entityManager->persist($project);
        $entityManager->flush();
    }

    /**
     * @return array
     */
    function get_all() {
        return $this->findAll();
    }
}