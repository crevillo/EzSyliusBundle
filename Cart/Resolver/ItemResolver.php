<?php
/**
 * File containing ItemResolver class.
 *
 * @copyright: crevillo@gmail.com
 */

namespace Crevillo\EzSyliusBundle\Cart\Resolver;

use eZ\Publish\API\Repository\ContentService;
use Sylius\Component\Cart\Model\CartItemInterface;
use Sylius\Component\Cart\Resolver\ItemResolverInterface;
use Doctrine\ORM\EntityManager;

class ItemResolver implements ItemResolverInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var ContentService
     */
    private $contentService;

    public function __construct(
        EntityManager $entityManager,
        ContentService $contentService
    )
    {
        $this->entityManager = $entityManager;
        $this->contentService = $contentService;
    }

    public function resolve( CartItemInterface $item, $request )
    {
        $productId = $request->query->get('productId');

        // If no product id given, or product not found, we throw exception with nice message.
        if (!$productId || !$product = $this->getProductRepository()->find($productId)) {
            throw new ItemResolvingException('Requested product was not found');
        }

        $content = $this->contentService->loadContent( $product->getId() );

        // Assign the product to the item and define the unit price.
        $item->setProduct($product);
        $item->setUnitPrice((int)$content->getFieldValue('price')->price * 100 );

        // Everything went fine, return the item.
        return $item;
    }

    private function getProductRepository()
    {
        return $this->entityManager->getRepository('eZSyliusBundle:Ezcontentobject');
    }
}
