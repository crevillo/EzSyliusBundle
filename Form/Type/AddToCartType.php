<?php
/**
 * File containing AddToCartType.php class.
 * 
 * @copyright: crevillo@gmail.com
 */

namespace Crevillo\EzSyliusBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AddToCartType extends AbstractType
{
    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        $builder
            ->add( 'quantity', 'text' )
            ->add( 'buy', 'submit' );
    }

    public function getName()
    {
        return 'ezsylius_add_to_cart';
    }

}