<?php

namespace App\Http\Controllers;

use App\Models\ArtWork;
use Illuminate\Http\Request;
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
        $collection = $this->collectionRepo->find($collcetionId);
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ArtWork $artWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArtWork $artWork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArtWork $artWork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArtWork $artWork)
    {
        //
    }
}
