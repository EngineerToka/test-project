<?php

namespace App\Http\Controllers;

use App\Models\ArtWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArtWorkRequest;
use App\Repositories\Interfaces\ArtWorkRepositoryInterface;
use App\Repositories\Interfaces\CollectionRepositoryInterface;

class ArtWorkController extends Controller
{
   protected $artWorkRepo;
   protected $collectionRepo;

    public function __construct(ArtWorkRepositoryInterface $artWorkRepo,CollectionRepositoryInterface $collectionRepo){
        $this->artWorkRepo= $artWorkRepo;
        $this->collectionRepo= $collectionRepo;

    }
    public function index(Request $request, $collcetionId)
    {
        $search = $request->get('search');
        $sort = $request->get('sort');
        $artWorks= $this->artWorkRepo->allByCollection($collcetionId,$search,$sort);

          return view('frontend.index',compact('collcetionId','artWorks','search','sort'));
        
        
    }

    public function create($collcetionId)
    {
        return view('frontend.index',compact('collcetionId'));
    }

    public function store(ArtWorkRequest $request,$collcetionId)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $artWork=  $this->artWorkRepo->create($data);
        $artWork->collection()->attach($collcetionId);


      return redirect()->route('frontend.index', $collcetionId)->with('success', 'Artwork created successfully.');
    }

    public function edit($id)
    {
        $artWork= $this->artWorkRepo->find($id);
        return view('frontend.index',compact('artWork'));
    }

    public function update(ArtWorkRequest $request, $id)
    {
        $data = $request->validated();
        $this->artWorkRepo->update($id,$data);
          return redirect()->back()->with('success', 'Artwork updated successfully.');
    }

    public function destroy($id)
    {
        $this->artWorkRepo->delete($id);
          return redirect()->back()->with('success', 'Artwork deleted successfully.');
    }
}
