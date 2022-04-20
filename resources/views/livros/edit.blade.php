@extends('livros.layout')
@section('conteudo')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Desafio Sebrae - Editar Livro</h2>
            </div>

        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('livros.update', $livro->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="nome" class="form-control"
                           value="{{ old('nome')?: $livro->nome }}" placeholder="nome"/>
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descrição:</strong>
                    <textarea type="text" name="descricao"
                              class="form-control">{{ old('descricao')?: $livro->descricao }}</textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a class="btn btn-outline-danger" href="{{ route('livros.index') }}"> Voltar</a>
                </div>
            </div>
        </div>
    </form>

@endsection
