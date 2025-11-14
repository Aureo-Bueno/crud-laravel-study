<?php

namespace App\Services;

use App\Interfaces\ClientServiceInterface;
use App\Interfaces\ClientRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\ValueObjects\Email;

class ClientService implements ClientServiceInterface
{
  private ClientRepositoryInterface $clientRepository;

  public function __construct(ClientRepositoryInterface $clientRepository)
  {
    $this->clientRepository = $clientRepository;
  }

  public function index(string $search = '', string $sortBy = 'created_at', string $sortOrder = 'desc')
  {
    return $this->clientRepository->index($search, $sortBy, $sortOrder);
  }

  public function getById(string $id)
  {
    return $this->clientRepository->getById($id);
  }

  public function store(array $data)
  {
    $email = new Email($data['email']);

    $details = [
      'name' => $data['name'],
      'address' => $data['address'],
      'observation' => $data['observation'],
      'email' => $email->getValue(),
      'password' => bcrypt($data['password']),
    ];

    if ($this->getClientEmail($email->getValue())) {
      throw new \Exception('This email is already registered');
    }

    DB::beginTransaction();
    try {
      $client = $this->clientRepository->store($details);
      DB::commit();
      return $client;
    } catch (\Exception $ex) {
      DB::rollBack();
      throw $ex;
    }
  }

  public function update(string $id, array $data): void
  {
    $client = $this->clientRepository->getById($id);
    if (!$client) {
      throw new \Exception('Cliente não encontrado');
    }

    $email = new Email($data['email']);

    $details = [
      'name' => $data['name'],
      'address' => $data['address'],
      'observation' => $data['observation'],
      'email' => $email->getValue(),
      'password' => $data['password'] ? bcrypt($data['password']) : $client->password,
    ];

    DB::beginTransaction();
    try {
      $this->clientRepository->update($details, $id);
      DB::commit();
    } catch (\Exception $ex) {
      DB::rollBack();
      throw $ex;
    }
  }


  public function delete(string $id)
  {
    DB::beginTransaction();
    try {
      $this->clientRepository->delete($id);
      DB::commit();
    } catch (\Exception $ex) {
      DB::rollBack();
      throw $ex;
    }
  }

  public function getClientEmail(string $email): ?string
  {
    return $this->clientRepository->getEmail($email);
  }
}
