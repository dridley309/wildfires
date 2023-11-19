<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Fire;
use App\Repository\FireRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomeController extends AbstractController
{
    private const MAX_PAGINATION_RESULTS = 20;

    private ManagerRegistry $registry;

    public function __construct(ManagerRegistry $registry)
    {
        $this->registry = $registry;
    }

    #[Route('/{page<\d+>?1}', name: 'forest_landing')]
    public function forestLanding(int $page): Response
    {
        /** @var FireRepository $repository */
        $repository = $this->registry->getRepository(Fire::class);

        $forests = $repository->getAllForestNames($page, self::MAX_PAGINATION_RESULTS);

        return $this->render('forest_listing.html.twig', [
            'forests' => $forests,
            'page' => $page,
        ]);
    }

    #[Route('/{forestName}/{page<\d+>?1}', name: 'forest_detail')]
    public function forestDetail(string $forestName, int $page): Response
    {
        /** @var FireRepository $repository */
        $repository = $this->registry->getRepository(Fire::class);

        $forest = urldecode(str_replace('%252F','%2F', $forestName));

        $fires = $repository->findBy(
            ['forestName' => $forest],
            null,
            self::MAX_PAGINATION_RESULTS,
            ($page - 1) * self::MAX_PAGINATION_RESULTS,
        );

        return $this->render('forest_detail.html.twig', [
            'forestName' => $forest,
            'fires' => $fires,
            'page' => $page,
        ]);
    }
}
