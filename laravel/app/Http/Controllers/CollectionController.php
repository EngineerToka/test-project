<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CollectionRequest;
use App\Repositories\Interfaces\CollectionRepositoryInterface;

class CollectionController extends Controller
{
    protected $collectionRepo;

    public function __construct(CollectionRepositoryInterface $collectionRepo )
    {
        $this->collectionRepo = $collectionRepo;
    }

    public function index(Request $request)
    {
       $userId= Auth::id();
       $search= $request->get('search');
       $sort= $request->get('sort');
       $collections= $this->collectionRepo->all($userId,$search,$sort);
      return view('frontend.index',compact('collections','search','sort'));
    }


    public function create()
    {
        return view('frontend.index');
    }


    public function store(CollectionRequest $request)
    {
       $data = $request->validated();
       $data['user_id'] =Auth::id();

       $this->collectionRepo->create($data);
        return redirect()->route('frontend.index')->with('sucess','Collection created successfully.');
    }


    public function show($id)
    {
       $collection= $this->collectionRepo->find($id);
    return view('frontend.index',compact('collection'));

    }


    public function edit($id)
    {
        $collection= $this->collectionRepo->find($id);
         return view('frontend.index',compact('collection'));
    }


    public function update(CollectionRequest $request, $id)
    {
        $data = $request->validated();
        $this->collectionRepo->update($id,$data);
        return redirect()->back()->with('sucess','Collection updated successfully.');

    }


    public function destroy($id)
    {
        $this->collectionRepo->delete($id);
                return redirect()->route('frontend.index')->with('sucess','Collection deleted successfully.');

    }
}
