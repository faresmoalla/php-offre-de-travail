<?php

namespace App\Controller;

use App\Entity\OffresDeTravail;
use App\Form\OffreType;
use App\Repository\EntreprisesRepository;
use App\Repository\OffresDeTravailRepository;
use App\Repository\ReclamationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OffreController extends AbstractController
{
    #[Route('/offre', name: 'app_offre')]
    public function index(): Response
    {
        return $this->render('offre/index.html.twig', [
            'controller_name' => 'OffreController',
        ]);
    }
    #[Route("/afficheroffre",name :"afficheroffre")]
    public function Affiche(Request $request,OffresDeTravailRepository $repository,PaginatorInterface $paginator){
        $tableoffre=$repository->listOffreParEntreprises();
        $tableoffre = $paginator->paginate(
            $tableoffre,
            $request->query->getInt('page', 1),
            2
        );

        return $this->render('offre/afficheroffre.html.twig'
            ,['tableoffre'=>$tableoffre
            ]);
    }
    #[Route("/afficheroffre2",name :"afficheroffre2")]
    public function Affiche2(Request $request,OffresDeTravailRepository $repository,PaginatorInterface $paginator){
        $tableoffre=$repository->listOffreParEntreprises();


        return $this->render('offre/offrefront.html.twig'
            ,['tableoffre'=>$tableoffre
            ]);
    }
    #[Route("/ajouterOffre",name:"ajouterOffre")]

    public function ajouterOffre(EntityManagerInterface $em,Request $request ,OffresDeTravailRepository $repository){
        $offre= new OffresDeTravail();
        $form= $this->createForm(OffreType::class,$offre);
        $form->add('Ajouter',SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($offre);
            $em->flush();
            return $this->redirectToRoute("afficheroffre");
        }
        return $this->render("offre/ajouterOffre.html.twig",array("form"=>$form->createView()));

    }

    #[Route("/supprimeroffre/{id}",name:"supprimeroffre")]

    public function delete($id,EntityManagerInterface $em ,OffresDeTravailRepository $repository){
        $rec=$repository->find($id);
        $em->remove($rec);
        $em->flush();
        return $this->redirectToRoute('afficheroffre');
    }

    #[Route("/{id}/modifieroffre", name:"modifieroffre")]
    public function edit(Request $request, OffresDeTravail $offre): Response
    {
        $form = $this->createForm(OffreType::class, $offre);
        $form->add('Confirmer',SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('afficheroffre');
        }
        return $this->render('offre/Modifieroffre.html.twig', [
            'offremodif' => $offre,
            'form' => $form->createView(),
        ]);
    }

    #[Route("/pdf/{id}",name:"pdf", methods: ['GET'])]
    public function pdf($id,OffresDeTravailRepository $repository): Response{
        $reclamation=$repository->find($id);
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($pdfOptions);
        $html = $this->renderView('offre/pdf.html.twig', [
            'pdf' => $reclamation,
        ]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $pdfOutput = $dompdf->output();
        return new Response($pdfOutput, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="offre.pdf"'
        ]);
    }

    #[Route("/stat",name:"stat")]
    public function statAction(EntreprisesRepository $test)
    {
        $coursss= $test->findAll();
        $nbrCours=[];
        $coursnom=[];
        $coursprix=[];
        foreach($coursss as $cours){
            $coursnom[]=$cours->getAdresse();
            $coursprix[]=sizeof($cours->getOffresDeTravails());
        }
        return $this->render('entreprises/stat.html.twig',
            [

                'coursnom'=> json_encode($coursnom),
                'coursprix'=> json_encode($coursprix),


            ]);


    }
}
