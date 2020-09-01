<?php


namespace App\Services\Product;

use Illuminate\Http\Request;
use App\Services\AppService;


class ProductService extends AppService
{
    public function getRepository()
    {
        // return \App\Repositories\Product\ProductRepository::class;
        return \App\Repositories\Product\ProductRepositoryInterface::class;
    }
    
    public function testAll()
    {
        return $this->repository->testAll();
    }    
}
