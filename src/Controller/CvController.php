<?php

namespace App\Controller;

use App\Entity\Cvs;
use App\Form\CvType;
use App\Repository\CvsRepository;
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

class CvController extends AbstractController
{
    #[Route('/cv', name: 'app_cv')]
    public function index(): Response
    {
        return $this->render('cv/index.html.twig', [
            'controller_name' => 'CvController',
        ]);
    }

    #[Route("/affichercv",name :"affichercv")]
    public function Affiche(Request $request,CvsRepository $repository,PaginatorInterface $paginator){
        $tablecv=$repository->findAll();
        $tablecv = $paginator->paginate(
            $tablecv,
            $request->query->getInt('page', 1),
            2
        );

        return $this->render('cv/affichercv.html.twig'
            ,['tablecv'=>$tablecv
            ]);
    }

    #[Route("/ajoutercv",name:"ajoutercv")]
    public function ajoutercv(EntityManagerInterface $em,Request $request ,CvsRepository $repository){
        $cv= new Cvs();
        $form= $this->createForm(CvType::class,$cv);
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
                $cv->setImage($newFilename);
            }
            $em->persist($cv);
            $em->flush();
            return $this->redirectToRoute("affichercv");
        }
        return $this->render("cv/ajoutercv.html.twig",array("form"=>$form->createView()));

    }

    #[Route("/supprimercv/{id}",name:"supprimercv")]
    public function delete($id,EntityManagerInterface $em ,CvsRepository $repository){
        $rec=$repository->find($id);
        $em->remove($rec);
        $em->flush();
        return $this->redirectToRoute('affichercv');
    }

    #[Route("/{id}/modifiercv", name:"modifiercv")]
    public function edit(Request $request, Cvs $cv): Response
    {
        $form = $this->createForm(CvType::class, $cv);
        $form->add('Confirmer',SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
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
                $cv->setImage($newFilename);
            }
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('affichercv');
        }
        return $this->render('cv/Modifiercv.html.twig', [
            'cvmodif' => $cv,
            'form' => $form->createView(),
        ]);
    }

    #[Route("/pdfcv/{id}",name:"pdfcv", methods: ['GET'])]
    public function pdf($id,CvsRepository $repository): Response{
        $reclamation=$repository->find($id);
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($pdfOptions);
        $html = $this->renderView('cv/pdf.html.twig', [
            'pdf' => $reclamation,
        ]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $pdfOutput = $dompdf->output();
        return new Response($pdfOutput, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="cv.pdf"'
        ]);
    }
}
