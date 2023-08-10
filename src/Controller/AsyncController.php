<?php

namespace App\Controller;

use App\Message\PurchaseConfirmationMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class AsyncController extends AbstractController
{

    public function __construct(private MessageBusInterface $bus)
    {
    }

    #[Route(path: '/async', name: 'async')]
    public function index(Request $request)
    {

        $orderId = $request->query->get('order-id', 1);
        $this->bus->dispatch(new PurchaseConfirmationMessage($orderId));
        die('xxxx');

    }
}