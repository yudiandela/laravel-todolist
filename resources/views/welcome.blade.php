@extends('layouts.master')

@section('content')
<div class="row justify-content-center py-5">
    <div class="col-lg-4 col-md-6 col-xs-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form action="{{ route('todo.store') }}" method="post" class="my-3">
            @csrf
            <div class="form-group text-center">
                <h3 class="text-primary" >Create Todo</h3>
                <input name="todo" autofocus type="text" class="form-control" placeholder="Create New Todo">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>

        @include('layouts._list-group')
    </div>
</div>
@endsection