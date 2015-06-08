<?php

namespace Crevillo\EzSyliusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ezcontentobject
 *
 * @ORM\Table(name="ezcontentobject", uniqueConstraints={@ORM\UniqueConstraint(name="ezcontentobject_remote_id", columns={"remote_id"})}, indexes={@ORM\Index(name="ezcontentobject_classid", columns={"contentclass_id"}), @ORM\Index(name="ezcontentobject_currentversion", columns={"current_version"}), @ORM\Index(name="ezcontentobject_lmask", columns={"language_mask"}), @ORM\Index(name="ezcontentobject_owner", columns={"owner_id"}), @ORM\Index(name="ezcontentobject_pub", columns={"published"}), @ORM\Index(name="ezcontentobject_status", columns={"status"})})
 * @ORM\Entity
 */
class Ezcontentobject
{
    /**
     * @var integer
     *
     * @ORM\Column(name="contentclass_id", type="integer", nullable=false)
     */
    private $contentclassId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="current_version", type="integer", nullable=true)
     */
    private $currentVersion;

    /**
     * @var integer
     *
     * @ORM\Column(name="initial_language_id", type="bigint", nullable=false)
     */
    private $initialLanguageId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="language_mask", type="bigint", nullable=false)
     */
    private $languageMask = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="modified", type="integer", nullable=false)
     */
    private $modified = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="owner_id", type="integer", nullable=false)
     */
    private $ownerId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="published", type="integer", nullable=false)
     */
    private $published = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="remote_id", type="string", length=100, nullable=true)
     */
    private $remoteId;

    /**
     * @var integer
     *
     * @ORM\Column(name="section_id", type="integer", nullable=false)
     */
    private $sectionId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }
}

