<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Form\CandidateType;
use App\Repository\CandidatsRepository;
use App\Repository\ExperienceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/candidats')]
class CandidateController extends AbstractController
{

    #[Route('/edit', name: 'app_candidate_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EntityManagerInterface $entityManager, ExperienceRepository $experienceRepository): Response
    {
        $user = $this->getUser();
        $candidat = $user->getCandidate();
        $experiences = $experienceRepository->findAll();


        $form = $this->createForm(CandidateType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->flush();
        }

        return $this->render('candidate/edit.html.twig', [
            'candidat' => $candidat,
            'experiences' => $experiences,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_candidate_delete', methods: ['POST'])]
    public function delete(Request $request, Candidate $candidat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $candidat->getId(), $request->request->get('_token'))) {
            $entityManager->remove($candidat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_candidate_index', [], Response::HTTP_SEE_OTHER);
    }
}
