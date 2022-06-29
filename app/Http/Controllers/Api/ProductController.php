<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Repositories\Product\ImageRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{

    /**
     * @var ProductRepository
     */
    protected ProductRepository $productRepository;

    /**
     * @var ImageRepository
     */
    private ImageRepository $imageRepository;

    /**
     * @param ProductRepository $productRepository
     * @param ImageRepository $imageRepository
     */
    public function __construct(ProductRepository $productRepository, ImageRepository $imageRepository)
    {
        $this->productRepository = $productRepository;
        $this->imageRepository = $imageRepository;
    }

    /**
     * @param ProductRequest $request
     * @return Application|ResponseFactory|Response
     */
    public function store(ProductRequest $request)
    {
        $userId = Auth::id();
        $product = $this->productRepository->store($request->name, $request->displayName, $request->price, $request->description, $userId);
        $images = $this->imageRepository->store($request->images, $userId, $product->id);

        return response(new ProductResource($product, $images));
    }

}
