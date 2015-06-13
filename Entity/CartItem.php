<?php
/**
 * File containing the CartItem class.
 *
 * @copyright Copyright (C) crevillo@gmail.com. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace Crevillo\EzSyliusBundle\Entity;

use eZ\Publish\API\Repository\Values\Content\Content;
use Sylius\Component\Cart\Model\CartItem as BaseCartItem;
use Sylius\Component\Order\Model\OrderItemInterface;


class CartItem extends BaseCartItem
{
    private $product;

    private $variant;

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct( Ezcontentobject $product )
    {
        $this->product = $product;
    }

    /**
     * {@inheritdoc}
     */
    public function getVariant()
    {
        return $this->variant;
    }

    /**
     * {@inheritdoc}
     */
    public function setVariant( Content $variant)
    {
        $this->variant = $variant;

        return $this;
    }

    public function equals(OrderItemInterface $item)
    {
        return $this->product === $item->getProduct();
    }
}
