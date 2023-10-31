<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\VoituresType;
use App\Entity\CarburantsType;
use App\Entity\Kilometrages;
use App\Entity\Annees;
use App\Entity\TauxEmpreint;
use App\Entity\Passagers;

use App\Form\CreateVoitureType;
use App\Form\CreateCarburantType;
use App\Form\CreateKilometrageType;
use App\Form\CreateAnneeType;
use App\Form\CreateTauxEmpreintType;
use App\Form\CreatePassagerType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use App\Repository\VoituresTypeRepository;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/admin/types-de-voitures', name: 'voituresType')]
    public function voituresType(VoituresTypeRepository $repo): Response
    {
        $voituresType = $repo->findAll();
        dump($repo->findAll());

        return $this->render('admin/voituresType.html.twig', [
            'voituresType' => $voituresType,
        ]);
    }

    #[Route('/admin/types-de-voitures/show/{id}', name: 'voitureType_show')]
    public function showVoitureType($id, VoituresTypeRepository $repo): Response
    {
        $voitureType = $repo->find($id);

        return $this->render('admin/showVoitureType.html.twig', [
            'voitureType' => $voitureType,
        ]);
    }

    #[Route('/admin/types-de-voitures/edit/{id}', name: 'voitureType_edit')]
    public function editVoitureType($id, VoituresTypeRepository $repo, EntityManagerInterface $manager, Request $request): Response
    {
        // $voitureType = new VoituresType();
        $voitureType = $repo->find($id);

        // dump($repo->find($id)->getNom());
        $voitureType->setNom($repo->find($id)->getNom());
        $voitureType->setMinKg($repo->find($id)->getMinKg());
        $voitureType->setMaxKg($repo->find($id)->getMaxKg());
        $voitureType->setNoteEco($repo->find($id)->getNoteEco());

        $form = $this->createForm(CreateVoitureType::class, $voitureType, [
            'is_edit' => true, 
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($voitureType);
            $manager->flush();
        }

        return $this->render('admin/editVoitureType.html.twig', [
            'voitureType' => $voitureType,
            'formVoitureType' => $form->createView(),
        ]);
    }

    #[Route('/admin/types-de-voitures/delete/{id}', name: 'voitureType_delete')]
    public function deleteVoitureType($id, VoituresTypeRepository $repo, EntityManagerInterface $manager): Response
    {
        $voitureType = $repo->find($id);

        $manager->remove($voitureType);
        $manager->flush();

        return $this->redirectToRoute('voituresType');
    }


    #[Route('/admin/voitureType/new', name: 'voitureType_new')]
    public function createVoitureType(Request $request, EntityManagerInterface $manager): Response
    {
        $voitureType = new VoituresType();

        $form = $this->createForm(CreateVoitureType::class, $voitureType);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // $voitureType = $form->getData();
            // dump($form->get('nom')->getData());
            dump($form->getData());

            $voitureType->setNom($form->get('nom')->getData());
            $voitureType->setMinKg($form->get('minKg')->getData());
            $voitureType->setMaxKg($form->get('maxKg')->getData());
            $voitureType->setNoteEco($form->get('noteEco')->getData());

            $manager->persist($voitureType);
            $manager->flush();
        }

        return $this->render('admin/createVoitureType.html.twig', [
            'formVoitureType' => $form->createView(),
        ]);
    }

    #[Route('/admin/carburantType/new', name: 'carburantType_new')]
    public function createCarburantType(Request $request, EntityManagerInterface $manager): Response
    {
        $carburantType  = new CarburantsType();

        $form = $this->createForm(CreateCarburantType::class, $carburantType);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $carburantType->setNom($form->get('nom')->getData()); 
            $carburantType->setNoteEco($form->get('noteEco')->getData()); 

            $manager->persist($carburantType);
            $manager->flush();
        }

        return $this->render('admin/createCarburantType.html.twig', [
            'formCarburantType' => $form->createView(),
        ]);
    }

    #[Route('/admin/kilometrage/new', name: 'kilometrage_new')]
    public function createKilometrage(Request $request, EntityManagerInterface $manager): Response
    {
        $kilometrage = new Kilometrages();

        $form = $this->createForm(CreateKilometrageType::class, $kilometrage);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $kilometrage->setMinKmParAn($form->get('minKmParAn')->getData());
            $kilometrage->setMaxKmParAn($form->get('maxKmParAn')->getData());
            $kilometrage->setKmNoteEco($form->get('KmNoteEco')->getData());

            $manager->persist($kilometrage);
            $manager->flush();
        }

        return $this->render('admin/createKilometrage.html.twig', [
            'formKilometrage' => $form->createView(),
        ]);
    }

    #[Route('/admin/annee/new', name: 'annee_new')]
    public function createAnnees(Request $request, EntityManagerInterface $manager): Response
    {
        $annee = new Annees();

        $form = $this->createForm(CreateAnneeType::class, $annee);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $annee->setMinDate($form->get('minDate')->getData());
            $annee->setMaxDate($form->get('maxDate')->getData());
            $annee->setAnneeNoteEco($form->get('AnneeNoteEco')->getData());

            $manager->persist($annee);
            $manager->flush();
        }

        return $this->render('admin/createAnnee.html.twig', [
            'formAnnee' => $form->createView(),
        ]);
    }

    #[Route('/admin/tauxEmpreint/new', name: 'tauxEmpreint_new')]
    public function createTauxEmpreint(Request $request, EntityManagerInterface $manager): Response
    {
        $tauxEmpreint = new TauxEmpreint();

        $form = $this->createForm(CreateTauxEmpreintType::class, $tauxEmpreint);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tauxEmpreint->setScoreMinVoiture($form->get('scoreMinVoiture')->getData());
            $tauxEmpreint->setScoreMaxVoiture($form->get('scoreMaxVoiture')->getData());
            $tauxEmpreint->setTauxEmpreintPourcentage($form->get('tauxEmpreintPourcentage')->getData());

            $manager->persist($tauxEmpreint);
            $manager->flush();
        }

        return $this->render('admin/createTauxEmpreint.html.twig', [
            'formTauxEmpreint' => $form->createView(),
        ]);
    }

    #[Route('/admin/passager/new', name: 'passager_new')]
    public function createPassagers(Request $request, EntityManagerInterface $manager): Response
    {
        $passager = new Passagers();

        $form = $this->createForm(CreatePassagerType::class, $passager);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // dump($form->getData());
            $passager->setNbDePassagers($form->get('nbDePassagers')->getData());
            $passager->setBonusOuMalus($form->get('bonusOuMalus')->getData());
            $passager->setBonusOuMalusPourcentage($form->get('bonusOuMalusPourcentage')->getData());

            $manager->persist($passager);
            $manager->flush();
        }

        return $this->render('admin/createPassager.html.twig', [
            'formPassager' => $form->createView(),
        ]);
    }

    
}
