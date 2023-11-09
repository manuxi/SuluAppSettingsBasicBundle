<?php

namespace Manuxi\SuluAppSettingsBasicBundle\Twig;

use Doctrine\ORM\EntityManagerInterface;
use Manuxi\SuluAppSettingsBasicBundle\Entity\AppSettingsBasic;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppSettingsBasicTwigExtension extends AbstractExtension
{
    private EntityManagerInterface $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        $this->entityManager = $entityManager;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('load_app_settings_basic', [$this, 'loadAppSettingsBasic']),
        ];
    }

    public function loadAppSettingsBasic(): AppSettingsBasic
    {
        $applicationSettings = $this->entityManager->getRepository(AppSettingsBasic::class)->findOneBy([]) ?? null;

        return $applicationSettings ?: new AppSettingsBasic();
    }
}