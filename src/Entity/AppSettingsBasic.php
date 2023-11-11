<?php

namespace Manuxi\SuluAppSettingsBasicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sulu\Component\Persistence\Model\AuditableInterface;
use Sulu\Component\Persistence\Model\AuditableTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="app_settings_basic")
 */
class AppSettingsBasic implements AuditableInterface
{
    use AuditableTrait;

    public const RESOURCE_KEY = 'app_settings_basic';
    public const FORM_KEY = 'app_settings_basic';
    public const SECURITY_CONTEXT = 'sulu.settings.app_settings_basic';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $languageSwitch = null;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $showSearch = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLanguageSwitch(): ?bool
    {
        return $this->languageSwitch;
    }

    public function setLanguageSwitch(?bool $languageSwitch): void
    {
        $this->languageSwitch = $languageSwitch;
    }

    public function getShowSearch(): ?bool
    {
        return $this->showSearch;
    }

    public function setShowSearch(?bool $showSearch): void
    {
        $this->showSearch = $showSearch;
    }
}