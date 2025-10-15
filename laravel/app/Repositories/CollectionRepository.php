<?php
namespace App\Repositories;

use App\Models\Collection;
use App\Repositories\Interfaces\CollectionRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class CollectionRepository implements CollectionRepositoryInterface{

   protected $model;

   public function __construct(Collection $collection)
   {
        $this->model = $collection;  
   }
    public function all($userId, $search, $sort ){

     $query = Collection::where('user_id', $userId)->withCount('artworks'); 
         if ($search) {
        $query->where('title', 'like', "%{$search}%");
    }

    switch ($sort) {
        case 'a_z':
            $query->orderBy('title', 'asc');
            break;
        case 'z_a':
            $query->orderBy('title', 'desc');
            break;
        case 'newest':
            $query->orderBy('created_at', 'desc');
            break;
        case 'oldest':
            $query->orderBy('created_at', 'asc');
            break;
        case 'most_artworks':
            $query->orderBy('artworks_count', 'desc');
            break;
        case 'least_artworks':
            $query->orderBy('artworks_count', 'asc');
            break;
        default:
            $query->latest();
    }

    return $query->paginate(6);

    }
    public function find($id){
    return $this->model->with('artworks')->findOrFail($id);
        
    }

    public function create(array $data){

        if(isset($data['cover_img'])){
            $fileName= time().'_'.$data['cover_img']->getClientOriginalName();
            $data['cover_img']->storeAs('public/uploads/collectionCover/',$fileName);
            $data['cover_img']=$fileName;
        }
       return $this->model->create($data);
    }

    public function update($id, array $data){
         $collection = $this->find($id);

        if(isset($data['cover_img'])){

            if($collection->cover_img && Storage::exists('public/uploads/collectionCover/'.$collection->cover_img )){
                Storage::delete('public/uploads/collectionCover/'.$collection->cover_img );
            }

            $fileName= time().'_'.$data['cover_img']->getClientOriginalName();
            $data['cover_img']->storeAs('public/uploads/collectionCover/',$fileName);
            $data['cover_img']=$fileName;
        }else{
            $data['cover_img']=$collection->cover_img;
        }
        $collection->update($data);
       return $collection;
    }

    public function delete($id){
         $collection = $this->find($id);
         
        return $collection->delete();
        
    }



}
