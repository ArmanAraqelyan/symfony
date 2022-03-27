<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Menu;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class MenuController extends AbstractController
{
    /**
     * @Route("/api/v1/menu/list", name="list")
     */
    public function list(ManagerRegistry $doctrine, SerializerInterface $serializer)
    {
        $menuList = $doctrine->getRepository(Menu::class)->findLastRecords(3);
        $data = $serializer->serialize($menuList,'json', [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function($obj) {
                return $obj->getId();
        }]);
        return new JsonResponse(json_decode($data), 200);
    }
}