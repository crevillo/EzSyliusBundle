<?php
/**
 * File containing CartController.php class.
 * 
 * @copyright: crevillo@gmail.com
 */

namespace Crevillo\EzSyliusBundle\Controller;

use eZ\Bundle\EzPublishCoreBundle\Controller;

class CartController extends Controller
{
    /**
     * Renders product in block item view
     *
     * @param $locationId
     * @param $viewType
     * @param bool $layout
     * @param array $params
     */
    public function blockItemViewAction( $locationId, $viewType, $layout = false, array $params = array() )
    {
        $form = $this->createForm( $this->get( 'ezsylius.form.type.add_to_cart' ) );

        return $this->get( 'ez_content' )->viewLocation(
            $locationId,
            $viewType,
            $layout,
            array(
                'form' => $form->createView()
            ) + $params
        );
    }
}