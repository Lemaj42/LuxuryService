<?php

namespace App\Controller;

use App\Entity\JobToCandidate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\JobRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(JobRepository $jobRepository): Response
    {

        return $this->render('home/index.html.twig', [
            'jobs' => $jobRepository->findAll(),
            'controller_name' => 'HomeController',

        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('home/aboutus.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/apply', name: 'app_apply')]
    public function apply(Request $request, JobRepository $jobRepository, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $candidat = $user->getCandidate();
        $job = $jobRepository->find($request->request->get('jobId'));
        $candidature = new JobToCandidate();
        $candidature->setJob($job);
        $candidature->setApprouved(false);
        $candidature->setDate(new \DateTime());


        $candidature->addCandidate($candidat);
        $entityManager->persist($candidature);
        $entityManager->flush($candidature);

        return $this->render('home/index.html.twig', [
            'jobs' => $jobRepository->findAll(),
            'controller_name' => 'HomeController',

        ]);
    }
}
