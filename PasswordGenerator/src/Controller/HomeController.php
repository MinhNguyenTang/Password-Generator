<?php

namespace App\Controller;

use App\Entity\PasswordLength;
use App\Service\PasswordGeneratorService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\PasswordLengthType;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PasswordGeneratorService $passwordGenerator, Request $request): Response
    {
        $passwordLength = new PasswordLength();

        $form = $this->createForm(PasswordLengthType::class, $passwordLength);
        $form->handleRequest($request);

        $length = 0;
        $password = null;
        $count = 0;

        if ($form->isSubmitted() && $form->isValid()) {
            $length = $passwordLength->getLength();
            $password = $passwordGenerator->generatePassword($length);
            $count = strlen($password);
        }
        
        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
            'password' => $password,
            'count' => $count,
        ]);
    }
}
