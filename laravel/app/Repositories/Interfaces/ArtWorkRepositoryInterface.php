<?php
namespace App\Repositories\Interfaces;

interface ArtWorkRepositoryInterface {
    public function all($userId);
    public function allByCollection($userId);
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}