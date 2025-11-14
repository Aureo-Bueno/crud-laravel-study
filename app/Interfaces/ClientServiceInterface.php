<?php

namespace App\Interfaces;

interface ClientServiceInterface
{
  public function index(string $search = '', string $sortBy = 'created_at', string $sortOrder = 'desc');
  public function getById(string $id);
  public function store(array $details);
  public function update(string $id, array $details);
  public function delete(string $id);
}
