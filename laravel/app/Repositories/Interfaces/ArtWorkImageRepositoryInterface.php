<?php
namespace App\Repositories\Interfaces;

interface ArtWorkImageRepositoryInterface {
    public function storeImages($artWork, array $images);
    public function deleteImages($artWork);
    public function deleteImagebyId($imageId);
}