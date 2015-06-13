<?php
/**
 * File containing ContentLoadListener class.
 * 
 * @copyright: crevillo@gmail.com
 */

namespace Crevillo\EzSyliusBundle\EventListener;

use Crevillo\EzSyliusBundle\Entity\CartItem;
use Doctrine\ORM\Event\LifecycleEventArgs;
use eZ\Publish\API\Repository\ContentService;

class ContentLoadListener
{
    private $contentService;

    public function __construct( ContentService $contentService )
    {
        $this->contentService = $contentService;
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        // perhaps you only want to act on some "Product" entity
        if ($entity instanceof CartItem) {
            $entity->setVariant(
                $this->contentService->loadContent($entity->getProduct()->getId())
            );
        }
    }
}