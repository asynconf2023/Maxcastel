<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;

use App\Repository\AnneesRepository;
use App\Repository\CarburantsTypeRepository;
use App\Repository\KilometragesRepository;
use App\Repository\PassagersRepository;
use App\Repository\TauxEmpreintRepository;
use App\Repository\VoituresTypeRepository;

use App\Entity\VoituresType;
use App\Entity\CarburantsType;
use App\Entity\Kilometrages;
use App\Entity\Annees;
use App\Entity\TauxEmpreint;
use App\Entity\Passagers;

use Doctrine\ORM\EntityManagerInterface;

class AsynconfController extends AbstractController
{
    #[Route('/', name: 'app_asynconf')]
    public function index(Request $request, AnneesRepository $annee, CarburantsTypeRepository $carburantstype, KilometragesRepository $kilometrages, PassagersRepository $passagers, VoituresTypeRepository $voitureType): Response
    {
        $result = false;

        $voituresType = $voitureType->findAll();
        $carburantsType = $carburantstype->findAll();
        $kilometres = $kilometrages->findAll();
        $annees = $annee->findAll();
        $passagers = $passagers->findAll();

        if ($request->request->count() > 0) {
            // $voitureType = new VoituresType();
            // dump($voitureType->find($request->request->get('nom'))->getNom());

            // dump($request->request->get('nom'));
            $noteEcoVehicule = $voitureType->find($request->request->get('nom'))->getNom();
            $nomTypeCarburant = $request->request->get('nomc');
            $nbDeKmParAn = $request->request->get('km');
            $annee = $request->request->get('annee');
            $nbDePassagers = $request->request->get('passagers');
            $noteEcoTotale=0;
            
            $result = true;
            
        }

        return $this->render('asynconf/index.html.twig', [
            'voituresType' => $voituresType,
            'carburantsType' => $carburantsType,
            'kilometres' => $kilometres,
            'annees' => $annees,
            'passagers' => $passagers,
            'result' => $result,
        ]);
    }
}
