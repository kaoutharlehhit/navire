<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/aisshiptype', name: 'aisshiptype')]
class AisShipTypeTypeController extends AbstractController
{
    #[Route('/ais/ship/type/type', name: 'app_ais_ship_type_type')]
    public function index(): Response
    {
        return $this->render('ais_ship_type_type/index.html.twig', [
            'controller_name' => 'AisShipTypeTypeController',
        ]);
    }
    #[Route('/voirtous', name: 'voirtous')]
        public function voirTous(AisShipTypeRepository $repoAisShipType) : Response
    {
        $aisShipTypes=$repoAisShipType->findAll();
        return $this->render('aisshiptype/voirtous.html.twig',[
            'aisShipTypes' => $aisShipTypes,
        ]);
        }
    
    
    
}
