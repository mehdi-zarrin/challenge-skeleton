<?php

namespace App\MessageHandler;

use App\Message\PurchaseConfirmationMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class PurchaseConfirmationMessageHandler implements MessageHandlerInterface
{
    public function __invoke(PurchaseConfirmationMessage $message): void
    {
        echo 'Handing order with an id of:' . $message->getOrderId() . PHP_EOL;
    }
}