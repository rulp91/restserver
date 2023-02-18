<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Provincias;

/**
 * @Route("/api", name="api_")
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/project", name="project_index", methods={"GET"})
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $provincias = $doctrine
            ->getRepository(Provincias::class)
            ->findAll();

        $data = [];
        foreach ($provincias as $provincia) {
            $data[] = [
                'id' => $provincia->getId(),
                'nombre' => $provincia->getNombre(),
                'descripcion' => $provincia->getDescripcion(),
                'image_path' => $provincia->getImagenPath(),

            ];
        }


        return $this->json($data);
    }

    /**
     * @Route("/project/{id}", name="project_show", methods={"GET"})
     */
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        $provincia = $doctrine->getRepository(Provincias::class) ->findBy(
            array('cod_provincias'=> $id)
        );

        if (!$provincia)
            return $this->json('No project found for id' . $id, 404);


        $data =  [
            'id' => $provincia[0]->getId(),
            'nombre' => $provincia[0]->getNombre(),
            'descripcion' => nl2br($provincia[0]->getDescripcion(), false),
            'image_path' => 'http://webserver.local/assets/images/'.$provincia[0]->getImagenPath(),
        ];

        return $this->json($data);
    }
}
