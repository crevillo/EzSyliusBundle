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

class CartItem extends BaseCartItem
{
    private $product;

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct( Ezcontentobject $product )
    {
        $this->product = $product;
    }
}
