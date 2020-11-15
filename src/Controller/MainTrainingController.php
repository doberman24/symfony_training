<?php

namespace App\Controller;

use App\Services\TestService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Message;
use Symfony\Component\Routing\Annotation\Route;

class MainTrainingController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(TestService $service)
    {
        $doll = 2400;
        $tmp = $service->convert($doll);

        return $this->render('main_training/index.html.twig', [
            'key' => $tmp
        ]);
    }
}
