<!--extende o template app da raiz do projeto -->
@extends('app')

<!-- Declara a section que eu vou usar e declara o titulo da pagina -->
@section('title', 'Detalhes do Clientes')

<!-- Declara a section que eu vou usar e declara o conteudo da pagina -->
@section('conteudo')
  <div class="row">
    <div class="card">
      <div class="card-header">
        Featured
      </div>
      <div class="card-body">
        <h5 class="card-title">Detalhes do Cliente: {{$client->name}}</h5>
        <p class="card-text"><strong>ID: {{$client->id}}</strong></p>
        <p class="card-text"><strong>Endereço: {{$client->address}}</strong></p>
        <p class="card-text"><strong>Observação: {{$client->observation}}</strong></p>
        <p class="card-text"><strong>Email: {{$client->email}}</strong></p>
        <a href="{{ route('clients.index')}}" class="btn btn-primary">Voltar para Lista de Clientes</a>
      </div>
    </div>
  </div>

@endsection
