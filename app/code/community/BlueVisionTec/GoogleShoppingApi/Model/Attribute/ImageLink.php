<?php
/**
 * @category	BlueVisionTec
 * @package     BlueVisionTec_GoogleShoppingApi
 * @copyright   Copyright (c) 2012 Magento Inc. (http://www.magentocommerce.com)
 * @copyright   Copyright (c) 2015 BlueVisionTec UG (haftungsbeschränkt) (http://www.bluevisiontec.de)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Image link attribute model
 *
 * @category	BlueVisionTec
 * @package    BlueVisionTec_GoogleShoppingApi
 * @author     Magento Core Team <core@magentocommerce.com>
 * @author      BlueVisionTec UG (haftungsbeschränkt) <magedev@bluevisiontec.eu>
 */
class BlueVisionTec_GoogleShoppingApi_Model_Attribute_ImageLink extends BlueVisionTec_GoogleShoppingApi_Model_Attribute_Default
{
    /**
     * Set current attribute to entry (for specified product)
     *
     * @param Mage_Catalog_Model_Product $product
     * @param Google_Service_ShoppingContent_Product $shoppingProduct
     * @return Google_Service_ShoppingContent_Product
     */
    public function convertAttribute($product, $shoppingProduct)
    {
        $url = $product->getGoogleShoppingImage();
        if($url && $url != "no_selection") {
        
            $url = Mage::getModel('catalog/product_media_config')->getMediaUrl($product->getGoogleShoppingImage());
            $shoppingProduct->setImageLink($url);
            return $shoppingProduct;
        }
        
        $url = Mage::helper('catalog/product')->getImageUrl($product);

        if ($product->getImage() && $product->getImage() != 'no_selection' && $url) {
           $shoppingProduct->setImageLink($url);
        }
        return $shoppingProduct;
    }
}
