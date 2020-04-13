<?php


namespace App\Bazar\ProductTokenBundle\Utils;


use CCatalogSku;
use CIBlockElement;
use Market\Product\Set;
use QSOFT\Distributor\Distributor;
use QSOFT\Distributor\Sorter;
use QSOFT\Tools\Product;

class ProductHelper
{


    public static function setProductChoice($orderID, $prodID)
    {
        $result = null;
        $order = new \QSOFT\Distributor\Order($orderID);
        $content = $order->getContent();
        $prods = [];
        array_map(function ($item) use (&$prods){
            $product = \CIBlockElement::GetList(false, ['IBLOCK_ID' => 31, 'ID' => $item], false, false, ['PROPERTY_DISTRIBUTOR_XML_ID'])->Fetch();
            $prods[] = $product["PROPERTY_DISTRIBUTOR_XML_ID_VALUE"];
        }, $prodID);

        foreach ($content as $key => $value){
            $itemID = $value->getDistributorXmlId();

            if (!in_array($itemID, $prods)){
                unset($content[$key]);
            }
        }

        $order->setAContent($content);
        $order->fromLK = true;
        $sorter = new Sorter();
        $sorter->appendOrder($order);
        $result = $sorter->getContent();

        return $result;
    }

    public static function getProductsChoice($orderId)
    {
        $order = \Bitrix\Sale\Order::load($orderId);
        $basket = $order->getBasket();
        $items = $basket->getBasketItems();
        $productName = '';
        /**@var $item BasketItem**/
        foreach ($items as $item){
            $set = new Set($item->getProductId());
            if ($set->isItemSet()) {
                $i = 0;
                foreach ($set->getAllSetsByProduct() as $product){
                    $prodID = \CCatalogSku::getProductList($product['ITEM_ID'])[$product['ITEM_ID']]['ID'];
                    $prod = \CIBlockElement::GetList(false, ['IBLOCK_ID' => 31, 'ID' => $prodID], false, false, ['ID','NAME', 'IBLOCK_SECTION_ID'])->Fetch();
                    $arResult[$prod['IBLOCK_SECTION_ID']]['SECTION_NAME'] = \CIBlockSection::GetByID($prod['IBLOCK_SECTION_ID'])->Fetch()['NAME'];
                    $arResult[$prod['IBLOCK_SECTION_ID']]['ITEMS'][] = $prod;

                    $i++;
                }
                $productName = $item->getField('NAME');
            }
        }
        $data['product_name'] = $productName;
        $data['order_id'] = $order->getId();
        $data['items'] = $arResult;
        return $data;
    }

    /**
     * @param $orderId
     * @return array
     */
    public static function getProducts($orderId)
    {

        $order = \Bitrix\Sale\Order::load($orderId);
        $basket = $order->getBasket();
        $prods = $basket->getBasketItems();

        /**
         * @var $firstItem BasketItem;
        **/
        $firstItem = $prods[0];

        $productName = $firstItem->getField('NAME');

        $dbKey = Distributor::getKeys(['order_id' => $orderId], [], true);
        while ($arKey = $dbKey->Fetch())
        {
            $productID = CCatalogSku::getProductList([$arKey['product_id']]);
            $productID = $productID[$arKey['product_id']]['ID'];
            $product = CIBlockElement::GetList(false, ['IBLOCK_ID' => 31, 'ID' => $productID], false, false,['PROPERTY_TRIAL','PROPERTY_DOWNLOAD_LINK','PROPERTY_DISTRIBUTOR', 'NAME', 'PREVIEW_TEXT'])->fetch();
            $arKey['down_link'] = $product['PROPERTY_DOWNLOAD_LINK_VALUE'];
            $arKey['name'] = $product['NAME'];
            $distID = $product['PROPERTY_DISTRIBUTOR_VALUE'];

            if ($product['PROPERTY_TRIAL_VALUE'] == 'Y'){
                $arKey['preview_text'] = $product['PREVIEW_TEXT'];
                $arKey['key'] = null;
            }

            if ($distID == '7814665871' && $arKey['down_link'] !== '')
                $arKey['down_link'] = $product['PROPERTY_DOWNLOAD_LINK_VALUE'].$arKey['key'];

            $items[] = $arKey;
        }
        $data = [
            'order' => $orderId,
        ];
        foreach ($items as $item){
            $data['items'][] = [
                'id' => $item['id'],
                'key' => $item['key'],
                'link' => $item['down_link'],
                'name' => $item['name'],
                'preview_text' => $item['preview_text']
            ];
        }
        $data['product_name'] = $productName;
        return $data;
    }
}