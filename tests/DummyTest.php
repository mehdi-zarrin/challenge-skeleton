<?php

namespace App\Tests;

use App\Repository\ProductRepository;
use App\Tests\Common\DatabaseTestCase;

class DummyTest extends DatabaseTestCase
{
    public function testItWorks()
    {
        $this->loader->load(['tests/fixtures/product.yml']);
        $productRepo = $this->getContainer()->get(ProductRepository::class);
        $result = $productRepo->findOneById(1);

        $this->assertEquals(1, $result->getId());
    }
}