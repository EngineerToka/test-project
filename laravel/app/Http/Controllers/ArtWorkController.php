<?php

namespace App\Http\Controllers;

use App\Models\ArtWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArtWorkRequest;
use App\Repositories\Interfaces\CollectionRepositoryInterface;
use App\Repositories\Interfaces\ArtWorkImageRepositoryInterface;

class ArtWorkController extends Controller
{
   protected $artWorkRepo;
   protected $collectionRepo;

    public function __construct(ArtWorkImageRepositoryInterface $artWorkRepo,CollectionRepositoryInterface $collectionRepo){
        $this->artWorkRepo= $artWorkRepo;
        $this->collectionRepo= $collectionRepo;

    }
    public function index(Request $request, $collcetionId)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');
        $collection = $this->collectionRepo->find($collcetionId);
        $artWorks= $this->artWorkRepo->allByCollection($collcetionId,$search,$sort);

          return view('frontend.index',compact('$collection','artWorks','search','sort'));
        
        
    }

    public function create($collcetionId)
    {
         $collection = $this->collectionRepo->find($collcetionId);
        return view('frontend.index',compact('$collection'));
    }

    public function store(ArtWorkRequest $request,$collcetionId)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['collection_id'] = $collcetionId;
        $this->artWorkRepo->create($data);

      return redirect()->route('frontend.index', $collectionId)->with('success', 'Artwork added successfully.');
    }

    public function edit($id)
    {
        $artWork= $this->artWorkRepo->find($id);
        return view('frontend.index',compact('artWork'));
    }

    public function update(ArtWorkRequest $request, $id)
    {
        $data = $request->validated();
        $this->artWorkRepo->update($data,$id);
          return redirect()->route('artworks.index', $collectionId)->with('success', 'Artwork updated successfully.');
    }

    public function destroy($id)
    {
        $this->artWorkRepo->delete($id);
          return redirect()->route('artworks.index', $collectionId)->with('success', 'Artwork deleted successfully.');
    }
}
