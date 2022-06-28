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
use Illuminate\Support\Facades\Storage;

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


    public function store(ProductRequest $request)
    {
        $userId = Auth::id();

        $product = $this->productRepository->store($request->name, $request->displayName, $request->price, $request->description, $userId);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = Storage::putFile('public/' . $userId, $image);
                $pat[] = $path;
            }
        }

        $image = json_encode($pat);
        $imgTrim = trim($image, "[]");
        $imagesArr = explode(',', $imgTrim);

        foreach ($imagesArr as $image) {
            $this->imageRepository->send($image, $product->id);
        }

        return response(new ProductResource($product,  $imagesArr));
    }

}
