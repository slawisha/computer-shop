<?php  namespace App\Repositories;

use App\Category;
use App\Traits\DbTrait;
use Illuminate\Support\Facades\Request;

class CategoryRepository {

    use DbTrait;

    /**
     * find category by id
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * get a list of all categories
     *
     * @return array
     */
    public function all()
    {
        return Category::with('products')->get();
    }

    /**
     * Create category from list
     *
     * @param $categories
     */
    public function saveFromList(array $categories)
    {
        $this->cleanTable('categories');

        foreach ($categories as $category)
        {
            Category::create(['name' => $category]);
        }
    }

    /**
     * Create category
     *
     * @param $category
     */
    public function save($category)
    {
        Category::create(['name' => $category]);
    }

    /**
     * Update category
     *
     * @param $id
     * @param $name
     */
    public function update($id, $name)
    {
        $category  = Category::findOrFail($id);
        $category->name = $name;
        $category->save();
    }

    /**
     * Delete category
     *
     * @param $id
     */
    public function delete($id)
    {
        Category::whereId($id)->delete();
    }


}