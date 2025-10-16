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
        return ArtWork::with('images')->where('user_id',$userId)->paginate(6);
    }

    public function allByCollection($collectionId, $search, $sort){

        $query= ArtWork::with('images')->where('collection_id',$collectionId);
        
        if($search){
            $query->where('title','like', "%{$search}%" );
          }
        switch($sort){
         case 'a_z';
         $query->orderBy('title','asc');
         break;
         case 'z_a';
         $query->orderBy('title','desc');
         break;
         case 'newest';
         $query->orderBy('created_at','desc');
         break;
         case 'oldest';
         $query->orderBy('created_at','asc');
         break;
         default;
         $query->latest();
        }
        return $query->paginate(6);
         
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
