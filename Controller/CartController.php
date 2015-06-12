<?php
/**
 * File containing CartController.php class.
 * 
 * @copyright: crevillo@gmail.com
 */

namespace Crevillo\EzSyliusBundle\Controller;

use \Sylius\Bundle\CartBundle\Controller\CartController as SyliusCartController;

class CartController extends SyliusCartController
{
    /**
     * Displays current cart summary page.
     * The parameters includes the form created from `sylius_cart` type.
     *
     * @return Response
     */
    public function summaryAction()
    {
        $cart = $this->getCurrentCart();

        $form = $this->createForm('sylius_cart', $cart);

        $view = $this
            ->view()
            ->setTemplate('eZSyliusBundle:cart:summary.html.twig')
            ->setData(array(
                'cart' => $cart,
                'form' => $form->createView()
            ))
        ;

        return $this->handleView($view);
    }
}