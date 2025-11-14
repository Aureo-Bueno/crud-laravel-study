<?php

namespace App\Repositories;

use App\Interfaces\ClientRepositoryInterface;
use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;

class ClientRepository implements ClientRepositoryInterface
{
  /**
   * Create a new class instance.
   */
  public function __construct()
  {
    //
  }

  public function index(string $search = '', string $sortBy = 'created_at', string $sortOrder = 'desc'): Collection
  {
    $query = Client::query();

    if (!empty($search)) {
      $query->where('name', 'like', '%' . $search . '%');
    }

    $validSortBy = ['created_at', 'updated_at', 'name', 'email'];
    $validSortOrder = ['asc', 'desc'];

    if (!in_array($sortBy, $validSortBy)) {
      $sortBy = 'created_at';
    }

    if (!in_array($sortOrder, $validSortOrder)) {
      $sortOrder = 'desc';
    }

    return $query->orderBy($sortBy, $sortOrder)->get();
  }

  public function getById($id): ?Client
  {
    return Client::whereKey($id)->first();
  }

  public function store(array $data): Client
  {
    return Client::create($data);
  }

  public function update(array $data, $id): ?Client
  {
    $client = Client::find($id);
    if ($client) {
      $client->update($data);
      return $client;
    }
    return null;
  }

  public function delete($id): bool
  {
    $client = Client::find($id);
    if ($client) {
      return $client->delete();
    }
    return false;
  }

  public function getEmail(string $email): ?string
  {
    $client = Client::where('email', $email)->first();
    return $client ? $client->email : null;
  }
}
