@extends('products.layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Laravelito Instrumentos</h2>
  <div class="card-body">

        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('products.create') }}"> <i class="fa fa-plus"></i> Nuevo Producto</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">Nº</th>
                    <th>Nombre</th>
                    <th>Detalles</th>
                    <th width="250px">Acción</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->detail }}</td>
                    <td>
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}"><i class="fa-solid fa-list"></i>Mostrar</a>

                            <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}"><i class="fa-solid fa-pen-to-square"></i>Editar</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>Borrar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No existen datos.</td>
                </tr>
            @endforelse
            </tbody>

        </table>

        {!! $products->links() !!}

  </div>
</div>
@endsection