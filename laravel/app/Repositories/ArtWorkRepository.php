<?php
namespace App\Repositories;

use App\Models\ArtWork;
use App\Repositories\Interfaces\ArtWorkImageRepositoryInterface;
use App\Repositories\Interfaces\ArtWorkRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class ArtWorkRepository implements ArtWorkRepositoryInterface{

   protected $imageRepo;

   public function __construct(ArtWorkImageRepositoryInterface $imageRepo)
   {
        $this->imageRepo = $imageRepo;  
   }
    public function all($userId){
        return ArtWork::where('user_id',$userId)->paginate(6);
    }
    public function find($id){
    return  ArtWork::with('images')->findOrFail($id);
        
    }

    public function create(array $data){

       $artwork = ArtWork::create($data);
       if(isset($data['images'])){
          $this->imageRepo->storeImages($artwork,$data['images']);
       }
       return $artwork ;

    }

    public function update($id, array $data){
         $artWork = ArtWork::find($id);
         if(isset($data['images'])){
            $this->imageRepo->deleteImages($artWork);
            $this->imageRepo->storeImages($artWork,$data['images']);
         }

         $artWork->update($data);
    
       return $artWork;
    }

    public function delete($id){
          $artWork= ArtWork::with('images')->findOrFail($id);
          $this->imageRepo->deleteImages($artWork);
        return $artWork->delete();
        
    }




}
