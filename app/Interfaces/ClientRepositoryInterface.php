<?php

namespace App\Interfaces;

interface ClientRepositoryInterface
{
  public function index(string $search = '', string $sortBy = 'created_at', string $sortOrder = 'desc');
  public function getById(string $id);
  public function store(array $data);
  public function update(array $data, string $id);
  public function delete(string $id);
  public function getEmail(string $email): ?string;
}
