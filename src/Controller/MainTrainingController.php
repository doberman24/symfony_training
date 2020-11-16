<?php

namespace App\Controller;

use App\Entity\Page;
use App\Services\TestService;
use Doctrine\ORM\EntityManagerInterface;
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

    /**
     * @Route("/add-page", name="addPage")
     */
    public function addpage(EntityManagerInterface $em)
    {
        $page = new Page();
        $page->setContent('Это контент 3 или содержание 3');
        $page->setTitle('Заголовок 3');
        $page->setPublish(true);

        $em->persist($page);
        $em->flush();

        return new Response('
            <html lang="en">
              <head>
                <meta charset="UTF-8">
                <title>Добавление объекта в базу данных</title>
              </head>
              <body>
                <h1>Объект добавлен в базу данных</h1>
                <img src="/images/under-construction.gif" />
              </body>
            </html>');
    }
}
