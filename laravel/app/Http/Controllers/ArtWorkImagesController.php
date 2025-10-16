<?php

namespace App\Http\Controllers;
use App\Repositories\Interfaces\ArtWorkImageRepositoryInterface;

class ArtWorkImagesController extends Controller
{
    protected $artWorkImageRepo;

   public function __construct(ArtWorkImageRepositoryInterface $ArtWorkImageRepo)
   {
        $this->artWorkImageRepo = $ArtWorkImageRepo;  
   }

    public function deleteOneImage($id)
    {
        $this->artWorkImageRepo->deleteImagebyId($id);
        return redirect()->back()->with('success','Image deleted successfully.');
    }
}
