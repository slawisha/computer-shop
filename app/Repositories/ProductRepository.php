<?php  namespace App\Repositories;

use App\Category;
use App\Gallery;
use App\Manufacturer;
use App\Product;
use App\Traits\DbTrait;
use Illuminate\Support\Facades\DB;

class ProductRepository {

    use DbTrait;

    /**
     * find product by id
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return Product::findOrFail($id);
    }

    public function findByCategory($categoryId)
    {
        return Product::where('category_id',$categoryId)->paginate(5);
    }

    /**
     * find all products
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Product::paginate(5);
    }

    /**
     * Save products from list
     *
     * @param $products
     */
    public function saveFromList($products)
    {
        $this->cleanTable('products');

        foreach ($products as $product)
        {
            Product::create([
                'number'          => $product['id'],
                'name'            => $product['name'],
                'manufacturer_id' => Manufacturer::whereName($product['manufacturer'])->first()->id,
                'model'           => $product['model'],
                'category_id'     => Category::whereName($product['category'])->first()->id,
                'price'           => $product['price'],
                'processor'       => $product['processor'],
                'memory'          => $product['memory'],
                'hdd'             => $product['hdd'],
                'graphics'        => $product['graphics'],
                'screen'          => $product['screen'],
                'optical'         => $product['optical'],
            ]);
        }
    }

    /**
     * @param $product
     */
    public function save($product)
    {
        Product::create([
            'number'          => $product['number'],
            'name'            => $product['name'],
            'manufacturer_id' => $product['manufacturer_id'],
            'model'           => $product['model'],
            'category_id'     => $product['category_id'],
            'price'           => $product['price'],
            'processor'       => $product['processor'],
            'memory'          => $product['memory'],
            'hdd'             => $product['hdd'],
            'graphics'        => $product['graphics'],
            'screen'          => $product['screen'],
            'optical'         => $product['optical'],
        ]);

    }

    public function update($id, $product)
    {
        Product::whereId($id)->update([
            'number'          => $product['number'],
            'name'            => $product['name'],
            'manufacturer_id' => $product['manufacturer_id'],
            'model'           => $product['model'],
            'category_id'     => $product['category_id'],
            'price'           => $product['price'],
            'processor'       => $product['processor'],
            'memory'          => $product['memory'],
            'hdd'             => $product['hdd'],
            'graphics'        => $product['graphics'],
            'screen'          => $product['screen'],
            'optical'         => $product['optical'],
        ]);
    }

    /**
     * Delete product
     *
     * @param $id
     */
    public function delete($id)
    {
        $this->findById($id)->delete();
    }

    /**
     * find the id of the last saved product
     *
     * @return mixed
     */
    public function findLastSavedId()
    {
        return Product::orderBy('updated_at', 'desc')->first()->id;
    }

    /**
     * find the model number of the last saved product
     *
     * @return mixed
     */
    public function findLastSavedModelNumber()
    {
        return Product::orderBy('updated_at', 'desc')->first()->number;
    }

}