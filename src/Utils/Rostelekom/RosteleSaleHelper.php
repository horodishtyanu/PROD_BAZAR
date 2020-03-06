<?php


namespace App\Utils\Rostelekom;


use QSOFT\Payment\Handlers\RosteleSale;

class RosteleSaleHelper extends RosteleSale
{
    public function generateHash($items, $subCall = false)
    {
        return parent::generateHash($items, $subCall);
    }

    public function getTotalPrice($requestItems = [])
    {
        if (empty($requestItems)) {
            return '0.00';
        }

        $GUIDs = [];

        foreach ($requestItems as $item) {
            $GUIDs[] = $item['GUID'];
        }

        $items = $this->findItemsByGUID($GUIDs);

        $skuCatalogId = $this->getSKUCatalogIdByItemsCatalogId($this->getRetailer()->getCatalogID());

        $itemIds = [];

        foreach ($items as $item) {
            $itemIds[] = $item['ID'];
        }

        $skuItems = $this->getFinalProductByItemId($itemIds, $skuCatalogId);

        $orderTotalPrice = 0;

        foreach ($requestItems as $item) {
            $skuItem = $skuItems[$items[$item['GUID']]['ID']];
            $price = $skuItem['CATALOG_PRICE_' . $this->getBasePriceIdByCode()];
            $orderTotalPrice += ($price * $item['COUNT']);

        }

        return $orderTotalPrice;
    }

}