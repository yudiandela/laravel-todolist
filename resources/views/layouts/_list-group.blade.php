<ul class="list-group">
    @foreach ($todos as $todo)
    <li class="list-group-item">
        <div class="custom-control custom-checkbox">
            <input onchange="event.preventDefault();
                document.getElementById('update-form{{$todo->slug}}').submit();" type="checkbox" {{ $todo->check == 'true' ? 'checked' : '' }} class="custom-control-input" id="customCheck{{$todo->slug}}">
                <form id="update-form{{$todo->slug}}" action="{{ route('todo.update', $todo->slug) }}" method="POST" style="display: none;">
                    @csrf
                    @method('patch')
                </form>
            <label class="custom-control-label" for="customCheck{{$todo->slug}}">{!! $todo->check == 'true' ? '<del>' . $todo->todo . '</del>' : $todo->todo !!}</label>
            <a href="{{ route('todo.destroy', $todo->slug) }}"
                onclick="event.preventDefault();
                document.getElementById('delete-form{{$todo->slug}}').submit();" class="float-right delete-todo ml-2"><i class="fa fa-trash"></i></a>
                <form id="delete-form{{$todo->slug}}" action="{{ route('todo.destroy', $todo->slug) }}" method="POST" style="display: none;">
                    @csrf
                    @method('delete')
                </form>
            <a href="{{ route('todo.edit', $todo->slug) }}" class="float-right update-todo"><i class="fa fa-edit"></i></a>
        </div>
    </li>
    @endforeach
</ul>