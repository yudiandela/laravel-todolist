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

        @if (url()->current() !== route('todo.index'))
            <form action="{{ route('todo.update', $todo->slug) }}" method="post" class="my-3">
                @method('put')
        @else
            <form action="{{ route('todo.store') }}" method="post" class="my-3">
        @endif
            @csrf
            <div class="form-group text-center">
                <h3 class="text-primary" >{{ url()->current() !== route('todo.index') ? 'Update ' . $todo->todo : 'Create a new Todo' }}</h3>
                <input value="{{ url()->current() !== route('todo.index') ? $todo->todo : '' }}" name="todo" autofocus type="text" class="form-control" placeholder="Create New Todo">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>

        @include('layouts._list-group')
    </div>
</div>
@endsection