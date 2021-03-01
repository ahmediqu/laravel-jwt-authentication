<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService extends BaseService
{
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function store()
    {

        $this->model->create([
            'title' => $this->getAttr('title'),
            'price' => $this->getAttr('price'),
            'description' => $this->getAttr('description'),
            'image' => $this->uploadImage($this->getAttr('image')),
        ]);

    }

    public function update()
    {

        $this->getModel()->update([
            'title' => $this->getAttr('title'),
            'price' => $this->getAttr('price'),
            'description' => $this->getAttr('description'),
            'image' => $this->uploadImage($this->getAttr('image')),
        ]);
    }

    public function uploadImage($image)
    {

        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        return $image;

    }


}
