@extends('livros.layout')

@section('conteudo')
{{--    {{ dd(get_defined_vars()['__data']) }}--}}

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Desafio Sebrae - Livros</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('livros.create') }}"> Novo Livro</a>
            </div>
        </div>
    </div>

    @php $msg = Session::get('success') @endphp
    @if($msg)
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif

    <table class="table table-bordered table-striped table-hover">
        <thead >
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($livros as $livro)
                <tr>
                    <td>{{$livro->id}}</td>
                    <td>{{$livro->nome}}</td>
                    <td>{{$livro->descricao}}</td>
                    <td>
                        <form action="{{route('livros.destroy', $livro->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Remover</button>
                            <a class="btn btn-outline-warning" href="{{ route('livros.edit', $livro->id) }}"> Alterar</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
