<?php

namespace App\Http\Controllers;

use App\Interfaces\ClientServiceInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ClientController extends Controller
{
  private ClientServiceInterface $clientService;

  public function __construct(ClientServiceInterface $clientService)
  {
    $this->clientService = $clientService;
  }

  public function index(Request $request): View
  {
    $search = $request->input('search', '');
    $sortBy = $request->input('sort_by', 'created_at');
    $sortOrder = $request->input('sort_order', 'desc');

    $clients = $this->clientService->index($search, $sortBy, $sortOrder);

    return view('clients.index', [
      'clients' => $clients
    ]);
  }


  public function show(string $id): View
  {
    $client = $this->clientService->getById($id);
    return view('clients.show', ['client' => $client]);
  }

  public function create(): View
  {
    return view('clients.create');
  }

  public function store(Request $request): RedirectResponse
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'address' => 'required|string|max:255',
      'observation' => 'required|string',
      'email' => 'required|email|unique:clients,email',
      'password' => 'required|string|min:6',
    ]);

    try {
      $this->clientService->store($request->all());
      return redirect('/clients');
    } catch (\Exception $ex) {
      return redirect('/clients')->with('error', 'Erro ao criar cliente');
    }
  }



  public function edit(string $id): View
  {
    $client = $this->clientService->getById($id);
    return view('clients.edit', ['client' => $client]);
  }

  public function update(string $id, Request $request): RedirectResponse
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'address' => 'required|string|max:255',
      'observation' => 'required|string',
      'email' => 'required|email|unique:clients,email,' . $id,
      'password' => 'nullable|string|min:6',
    ]);

    try {
      $this->clientService->update($id, $request->all());
      return redirect('/clients');
    } catch (\Exception $ex) {
      return redirect('/clients')->with('error', 'Erro ao atualizar cliente');
    }
  }

  public function destroy(string $id): RedirectResponse
  {
    try {
      $this->clientService->delete($id);
      return redirect('/clients');
    } catch (\Exception $ex) {
      error_log('DEBUG delete exception: ' . $ex->getMessage());
      return redirect('/clients')->with('error', 'Erro ao excluir cliente');
    }
  }
}
