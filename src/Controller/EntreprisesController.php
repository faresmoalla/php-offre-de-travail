<?php

namespace App\Controller;

use App\Entity\Entreprises;
use App\Form\EntreprisesType;
use App\Repository\EntreprisesRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
class EntreprisesController extends AbstractController
{
    #[Route('/entreprises', name: 'app_entreprises')]
    public function index(): Response
    {
        return $this->render('entreprises/index.html.twig', [
            'controller_name' => 'EntreprisesController',
        ]);
    }

    #[Route("/afficherentreprises",name :"afficherentreprises")]

    public function Affiche(Request $request,EntreprisesRepository $repository,PaginatorInterface $paginator){
        $tableentreprise=$repository->findAll();
        $tableentreprise = $paginator->paginate(
            $tableentreprise,
            $request->query->getInt('page', 1),
            2
        );

        return $this->render('entreprises/afficherentreprises.html.twig'
            ,['tableentreprise'=>$tableentreprise
                ]);
    }

    #[Route("/ajouterEntreprise",name:"ajouterEntreprise")]

    public function ajouterEntreprise(EntityManagerInterface $em,Request $request ,EntreprisesRepository $repository){
        $entreprise= new Entreprises();
        $form= $this->createForm(EntreprisesType::class,$entreprise);
        $form->add('Ajouter',SubmitType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $new=$form->getData();
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename.'-'.uniqid().'.'.$imageFile->guessExtension();
                try {
                    $imageFile->move(
                        'images',
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $entreprise->setImage($newFilename);
            }
            $em->persist($entreprise);
            $em->flush();




            return $this->redirectToRoute("afficherentreprises");
        }
        return $this->render("entreprises/ajouterEntreprise.html.twig",array("form"=>$form->createView()));

    }

    #[Route("/supprimerEntreprise/{id}",name:"supprimerEntreprise")]

    public function delete($id,EntityManagerInterface $em ,EntreprisesRepository $repository){
        $rec=$repository->find($id);
        $em->remove($rec);
        $em->flush();

        return $this->redirectToRoute('afficherentreprises');
    }

    #[Route("/{id}/modifierentreprises", name:"modifierentreprises")]

    public function edit(Request $request, Entreprises $entreprises): Response
    {
        $form = $this->createForm(EntreprisesType::class, $entreprises);
        $form->add('Confirmer',SubmitType::class);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename.'-'.uniqid().'.'.$imageFile->guessExtension();
                try {
                    $imageFile->move(
                        'images',
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
                $entreprises->setImage($newFilename);
            }
            $this->getDoctrine()->getManager()->flush();


            return $this->redirectToRoute('afficherentreprises');
        }

        return $this->render('entreprises/Modifierentreprises.html.twig', [
            'entreprisemodif' => $entreprises,
            'form' => $form->createView(),
        ]);
    }

    #[Route("/pdfentreprise/{id}",name:"pdfentreprise", methods: ['GET'])]
    public function pdf($id,EntreprisesRepository $repository): Response{

        $reclamation=$repository->find($id);
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($pdfOptions);
        $html = $this->renderView('entreprises/pdf.html.twig', [
            'pdf' => $reclamation,

        ]);
        $dompdf->loadHtml($html);
        //  $dompdf->loadHtml('<h1>Hello, World!</h1>');

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        //  $dompdf->stream();
        // Output the generated PDF to Browser (force download)
        /* $dompdf->stream($reclamation->getType(), [
             "Attachment" => false
         ]);*/
        $pdfOutput = $dompdf->output();
        return new Response($pdfOutput, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="entreprise.pdf"'
        ]);

    }





}
