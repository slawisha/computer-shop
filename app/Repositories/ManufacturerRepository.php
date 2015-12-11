<?php  namespace App\Repositories;

use App\Manufacturer;
use App\Traits\DbTrait;

class ManufacturerRepository {

    use DbTrait;

    /**
     * find all manufacturers
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Manufacturer::all();
    }

    public function findById($id)
    {
        return Manufacturer::findOrFail($id);
    }
    /**
     * Create manufacturers from list
     *
     * @param $manufacturers
     */
    public function saveFromList(array $manufacturers)
    {
        $this->cleanTable('manufacturers');

        foreach ($manufacturers as $manufacturer)
        {
            Manufacturer::create(['name' => $manufacturer]);
        }
    }

    /**
     * Create manufacturer
     *
     * @param $manufacturer
     */
    public function save($manufacturer)
    {
        Manufacturer::create(['name' => $manufacturer]);
    }

    /**
     * update a manufacturer
     *
     * @param $id
     * @param $name
     */
    public function update($id, $name)
    {
        $manufacturer = $this->findById($id);

        $manufacturer->name = $name;

        $manufacturer->save();
    }

    /**
     * delete a manufacturer
     *
     * @param $id
     */
    public function delete($id)
    {
        $this->findById($id)->delete();
    }


}