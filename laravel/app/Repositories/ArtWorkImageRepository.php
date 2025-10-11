<?php
namespace App\Repositories;

use App\Models\ArtWork;
use App\Models\ArtWorkImages;
use App\Repositories\Interfaces\ArtWorkImageRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class ArtWorkImageRepository implements ArtWorkImageRepositoryInterface{

   protected $model;

   public function __construct(ArtWorkImages $artWorkImages)
   {
        $this->model = $artWorkImages;  
   }
     public function storeImages($artWork, array $images){
        foreach($images as $image){
            $fileName= time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/uploads/artWorks/',$fileName);

            $artWork->images()->create([
                'path' => 'uploads/artworks/'.$fileName
            ]);

        }
     }
    public function deleteImages($artWork){
        foreach($artWork->images as $image){
            Storage::delete('public/'.$image->getRawOriginal('path'));
            $image->delete();
        }

    }
    public function deleteImagebyId($imageId){
        $image= $this->model->find($imageId);
        Storage::delete('public/'.$image->getRawOriginal('path'));
        $image->delete();

    }





}
