<?php

namespace App\Controller;

use App\Message\OrderCanceledMessage;
use App\Message\OrderPlacedMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{

    public function __construct(private MessageBusInterface $bus)
    {
    }

    #[Route(path: '/order', name: 'order_create', methods: ['POST'])]
    public function create(Request $request)
    {
        $orderId = $request->query->get('order-id', 1);
        $this->bus->dispatch(new OrderPlacedMessage($orderId));

        return $this->json(['success'], Response::HTTP_CREATED);
    }

    #[Route(path: '/order', name: 'order_update', methods: ['PUT']) ]
    public function update(Request $request)
    {
        $orderId = $request->query->get('order-id', 1);
        $this->bus->dispatch(new OrderCanceledMessage($orderId));

        return $this->json(['success'], Response::HTTP_OK);
    }
}