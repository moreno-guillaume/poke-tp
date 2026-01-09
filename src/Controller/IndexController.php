<?php

namespace App\Controller;

use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(Connection $connection): Response
    {
        // Test connexion BDD
        $tables = $connection->createSchemaManager()->listTableNames();

        return $this->render('index/index.html.twig', [
            'tables' => $tables,
            'db_connected' => true,
        ]);
    }
}