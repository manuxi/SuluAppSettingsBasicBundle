<?php

declare(strict_types=1);

namespace Manuxi\SuluAppSettingsBasicBundle\Controller\Admin;

use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\View\ViewHandlerInterface;
use HandcraftedInTheAlps\RestRoutingBundle\Controller\Annotations\RouteResource;
use HandcraftedInTheAlps\RestRoutingBundle\Routing\ClassResourceInterface;
use Manuxi\SuluAppSettingsBasicBundle\Entity\AppSettingsBasic;
use Sulu\Component\Rest\AbstractRestController;
use Sulu\Component\Security\SecuredControllerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


/**
 * @RouteResource("app-settings-basic")
 */
class AppSettingsBasicController extends AbstractRestController implements ClassResourceInterface, SecuredControllerInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager,
        ViewHandlerInterface $viewHandler,
        ?TokenStorageInterface $tokenStorage = null
    ) {
        $this->entityManager = $entityManager;

        parent::__construct($viewHandler, $tokenStorage);
    }

    public function getAction(): Response
    {
        $applicationSettings = $this->entityManager->getRepository(AppSettingsBasic::class)->findOneBy([]);

        return $this->handleView($this->view($this->getDataForEntity($applicationSettings ?: new AppSettingsBasic())));
    }

    public function putAction(Request $request): Response
    {
        $applicationSettings = $this->entityManager->getRepository(AppSettingsBasic::class)->findOneBy([]);
        if (!$applicationSettings) {
            $applicationSettings = new AppSettingsBasic();
            $this->entityManager->persist($applicationSettings);
        }

        $data = $request->toArray();
        $this->mapDataToEntity($data, $applicationSettings);
        $this->entityManager->flush();

        return $this->handleView($this->view($this->getDataForEntity($applicationSettings)));
    }

    protected function getDataForEntity(AppSettingsBasic $entity): array
    {
        return [
            'languageSwitch' => $entity->getLanguageSwitch(),
        ];
    }

    protected function mapDataToEntity(array $data, AppSettingsBasic $entity): void
    {
        $entity->setLanguageSwitch($data['languageSwitch']);
    }

    public function getSecurityContext(): string
    {
        return AppSettingsBasic::SECURITY_CONTEXT;
    }

    public function getLocale(Request $request): ?string
    {
        return $request->query->get('locale');
    }
}