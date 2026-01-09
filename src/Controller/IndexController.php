<?php

namespace App\Controller;

use App\Repository\PokedexRepository;
use App\Repository\PokemonRepository;
use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(
        Connection $connection,
        PokedexRepository $pokedexRepository,
        PokemonRepository $pokemonRepository
    ): Response {
        // Tables en BDD
        $tables = $connection->createSchemaManager()->listTableNames();

        // Pokedex de l'utilisateur connecté
        $user = $this->getUser();
        $pokedex = $pokedexRepository->findBy(['user' => $user]);

        // Nombre total de pokémons en BDD
        $totalPokemons = $pokemonRepository->count([]);

        return $this->render('index/index.html.twig', [
            'tables' => $tables,
            'pokedex' => $pokedex,
            'totalPokemons' => $totalPokemons,
        ]);
    }
}