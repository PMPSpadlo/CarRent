@extends('layouts.app')



@section('content')
    <div class="block" style="padding-top: 20vh">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('cars.create') }}"> Create New Product</a>
                    <a class="btn btn-danger" href="{{ route('panel') }}"> Back to panel</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Details</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->name }}</td>
                    <td>
                        <img style="width: 200px" src="{{ asset('/storage/images/'.$car->image) }}"></td>

                    <td>{{ $car->description }}</td>
                    <td>
                        <form action="{{ route('cars.destroy',$car->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('cars.show',$car->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('cars.edit',$car->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="pagination-nav">
            {!! $cars->links() !!}
        </div>
    </div>
@endsection
