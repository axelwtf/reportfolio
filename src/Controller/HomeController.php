<?php

namespace App\Controller;

use Twig\Environment;
use App\Entity\Contact;
use App\Entity\Projects;
use App\Form\ContactType;
use App\Service\MailService;
use App\Repository\UserRepository;
use App\Repository\SkillsRepository;
use App\Repository\ProjectsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    public function __construct(
        private EntityManagerInterface $manager,
        private Environment $environment,
    ) {
    }

    #[Route('/', name: 'home')]
    public function index(
    UserRepository $user,
    SkillsRepository $skills, 
    ProjectsRepository $projects,
    MailService $mailService,
    Request $request, ): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dataForm = $form->getData();

            $this->manager->persist($dataForm);
            $this->manager->flush();

            $mailService->sendEmail(
                $contact->getEmail(),
                $contact->getSubject(),
                $contact->getMessage()
            );
            
            return new JsonResponse([
                'code' => Contact::CONTACT_SUBMITTED_SUCCESSFULLY,
            ]);
        }

        return $this->render('home.html.twig', [
            'user' => $user->find(1),
            'skills' => $skills->findAll(),
            'projects' => $projects->findAll(),
            'form' => $form->createView(),
        ]);
    }

    #[Route('portfolio-details/{id}', name: 'portfolio-details')]
    public function details(Projects $project): Response
    {
        

        return $this->render('portfolio-details.html.twig', [
            'project' => $project
        ]);
    }
}
