<?php


namespace App\Bazar\ProductTokenBundle\Utils;


use Monolog\Handler\NativeMailerHandler;
use Monolog\Logger;
use Monolog\Processor\MemoryUsageProcessor;
use QSOFT\Distributor\Distributor;
use QSOFT\Distributor\Exception\ExceptionDistributor;
use QSOFT\Distributor\Handlers\AbstractHandlers;
use QSOFT\ServiceLogger\Monolog\BitrixEventLogHandler;

class ReleaseOrder
{
    /** @var \SplObjectStorage|AbstractHandlers[] */
    private $distCollection;
    private $logger;

    public function __construct(Logger $logger = null)
    {
        $this->distCollection = new \SplObjectStorage;

        if ($logger == null) {
            $this->logger = new Logger(__CLASS__);
            $this->logger->pushProcessor(new MemoryUsageProcessor);
            $this->logger->pushHandler(new BitrixEventLogHandler());
            $this->logger->pushHandler(new NativeMailerHandler(\COption::GetOptionString('main', 'email_from'), 'Ошибка платежного шлюза', 'no-reply@s-online.ru', Logger::CRITICAL));
        } else {
            $this->logger = $logger;
        }
    }

    public function __destruct()
    {
        $this->logger->addDebug("Sorter удален");
    }


    public function appendOrder($obOrder)
    {
        $this->logger->addInfo(sprintf(GetMessage('SORTER_ORDER_PROCESSING'), $obOrder->getId()), ['orderId' => $obOrder->getId()]);

        if (!defined('USE_LOCAL_STORAGE')) {
            define('USE_LOCAL_STORAGE', true);
        }

        $this->updateDistCollection($obOrder);
    }


    private function updateDistCollection(\QSOFT\Distributor\Order $obOrder)
    {
        foreach ($obOrder->getContent() as $obItem)
        {
            $distProp = Distributor::getDistributorProp($obItem->getDistributor());
            $obDist = Distributor::getObjectByDistributor($distProp['HANDLER'], $distProp['XML_ID'], $obOrder->getRetailer());
            $obDist->addLogger($this->logger);

            if(! $this->distCollection->offsetExists($obDist)) {
                $obDist->appendOrder($obOrder)->setDistProp($distProp);
                $this->distCollection->attach($obDist);

                $this->logger->addInfo(sprintf(GetMessage('SORTER_CREATE_HANDLER'), $distProp['XML_ID']), ['orderId' => $obOrder->getId()]);
            } else {
                $obDist->appendOrder($obOrder);

                $this->logger->addInfo(sprintf(GetMessage('SORTER_HANDLER_ADD_ORDER'), $distProp['XML_ID'], $obOrder->getId()), ['orderId' => $obOrder->getId()]);
            }
        }
    }
}