@extends('app')

@section('title', 'Lista de Clientes')

@section('conteudo')
  <div class="row">
    <div class="col-12">
      <h1>Lista de Clientes</h1>
    </div>
  </div>

  <!-- Filtros e Ordenação -->
  <div class="row mb-4">
    <div class="col-md-6">
      <form method="GET" action="{{ route('clients.index') }}" class="d-flex gap-2">
        <input type="text" name="search" class="form-control" placeholder="Pesquisar por nome..."
          value="{{ request('search') }}" aria-label="Pesquisar clientes por nome">
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-search"></i> Pesquisar
        </button>
        @if(request('search'))
          <a href="{{ route('clients.index') }}" class="btn btn-secondary">
            <i class="fas fa-times"></i> Limpar
          </a>
        @endif
      </form>
    </div>

    <div class="col-md-6">
      <div class="btn-group" role="group" aria-label="Ordenação">
        <a href="{{ route('clients.index', array_merge(request()->query(), ['sort_by' => 'created_at', 'sort_order' => request('sort_order') === 'asc' && request('sort_by') === 'created_at' ? 'desc' : 'asc'])) }}"
          class="btn @if(request('sort_by') === 'created_at') btn-info @else btn-outline-info @endif"
          title="Ordenar por data de criação">
          <i class="fas fa-calendar-plus"></i> Data Criado
          @if(request('sort_by') === 'created_at')
            <i class="fas fa-arrow-{{ request('sort_order') === 'asc' ? 'up' : 'down' }}"></i>
          @endif
        </a>

        <a href="{{ route('clients.index', array_merge(request()->query(), ['sort_by' => 'updated_at', 'sort_order' => request('sort_order') === 'asc' && request('sort_by') === 'updated_at' ? 'desc' : 'asc'])) }}"
          class="btn @if(request('sort_by') === 'updated_at') btn-info @else btn-outline-info @endif"
          title="Ordenar por data de atualização">
          <i class="fas fa-calendar-check"></i> Data Atualizado
          @if(request('sort_by') === 'updated_at')
            <i class="fas fa-arrow-{{ request('sort_order') === 'asc' ? 'up' : 'down' }}"></i>
          @endif
        </a>
      </div>
    </div>
  </div>

  <!-- Tabela -->
  <div class="row">
    <div class="col-12">
      @if($clients->isNotEmpty())
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Data Criado</th>
              <th scope="col">Data Atualizado</th>
              <th scope="col">AÇÕES</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($clients as $client)
              <tr>
                <td><a href="{{ route('clients.show', $client) }}">{{$client->name}}</a></td>
                <td>{{$client->email}}</td>
                <td>{{ $client->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $client->updated_at->format('d/m/Y H:i') }}</td>
                <td>
                  <a href="{{ route('clients.edit', $client) }}" class="btn btn-success btn-sm">
                    <i class="fas fa-edit"></i> Atualizar
                  </a>
                  <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display: inline;">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"
                      onclick="return confirm('Tem certeza que deseja Excluir o Cliente?')">
                      <i class="fas fa-trash"></i> Deletar
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <div class="alert alert-info" role="alert">
          <i class="fas fa-info-circle"></i>
          @if(request('search'))
            Nenhum cliente encontrado com o nome "<strong>{{ request('search') }}</strong>"
          @else
            Nenhum cliente registrado no sistema
          @endif
        </div>
      @endif

      <a href="{{ route('clients.create')}}" class="btn btn-success mt-3">
        <i class="fas fa-plus"></i> Novo Cliente
      </a>
    </div>
  </div>

@endsection
