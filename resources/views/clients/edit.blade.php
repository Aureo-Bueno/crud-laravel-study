@extends('app')

@section('title', 'Atualizar Dados do Cliente')


@section('conteudo')
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('clients.update', $client) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="NomeCliente" class="form-label">Nome do Cliente</label>
      <input type="text" class="form-control" id="NomeCliente" name="name" placeholder="Digite o nome"
        value="{{ old('name', $client->name) }}" required>
      @error('name')
        <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="EnderecoCliente" class="form-label">Endereço do Cliente</label>
      <input type="text" class="form-control" id="EnderecoCliente" name="address" placeholder="Digite o endereço"
        value="{{ old('address', $client->address) }}" required>
      @error('address')
        <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="ObservacaoCliente" class="form-label">Observação do Cliente</label>
      <textarea id="ObservacaoCliente" class="form-control" rows="3" name="observation" placeholder="Digite a observação"
        required>{{ old('observation', $client->observation) }}</textarea>
      @error('observation')
        <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="EmailCliente" class="form-label">Email do Cliente</label>
      <input type="text" class="form-control" id="EmailCliente" name="email" placeholder="Digite o email"
        value="{{ old('email', $client->email) }}" required>
      @error('email')
        <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="SenhaCliente" class="form-label">Senha do Cliente</label>
      <input type="password" class="form-control" id="SenhaCliente" name="password" placeholder="Digite a senha">
      @error('password')
        <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
  </form>

@endsection
