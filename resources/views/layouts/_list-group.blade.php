<ul class="list-group">
    @foreach ($todos as $todo)
    <li class="list-group-item">
        <div class="custom-control custom-checkbox">
            {{-- input checkbox --}}
            <input onchange="event.preventDefault();
                document.getElementById('{{ md5('update' . $todo->slug) }}').submit();" type="checkbox" {{ $todo->check == 'true' ? 'checked' : '' }} class="custom-control-input" id="{{ md5($todo->slug) }}">
                <form id="{{ md5('update' . $todo->slug) }}" action="{{ route('todo.update', $todo->slug) }}" method="POST" style="display: none;">
                    @csrf
                    @method('patch')
                </form>

            {{-- label untuk menampilkan data todolist --}}
            <label class="custom-control-label" for="{{ md5($todo->slug) }}">{!! $todo->check == 'true' ? '<del>' . $todo->todo . '</del>' : $todo->todo !!}</label>

            {{-- link untuk fungsi hapus --}}
            <a href="{{ route('todo.destroy', $todo->slug) }}"
                onclick="event.preventDefault();
                document.getElementById('{{ md5('delete' . $todo->slug) }}').submit();" class="float-right delete-todo ml-2"><i class="fa fa-trash"></i></a>
                <form id="{{ md5('delete' . $todo->slug) }}" action="{{ route('todo.destroy', $todo->slug) }}" method="POST" style="display: none;">
                    @csrf
                    @method('delete')
                </form>

            {{-- link untuk mengarahkan ke halaman edit --}}
            <a href="{{ route('todo.edit', $todo->slug) }}" class="float-right update-todo"><i class="fa fa-edit"></i></a>
        </div>
    </li>
    @endforeach
</ul>