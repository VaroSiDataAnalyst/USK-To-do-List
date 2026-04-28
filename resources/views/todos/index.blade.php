@extends('layouts.app')

@section('title', 'Data Todo')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">
            Data Todo
        </h4>

        <a href="{{ route('todos.create') }}"
           class="btn btn-primary">
            Tambah Todo
        </a>
    </div>

    <div class="card-body">
        {{-- Success Message --}}
        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th width="5%">No</th>
                    <th>Title</th>
                    <th width="15%">Status</th>
                    <th width="25%">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($todos as $todo)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $todo->title }}
                        </td>

                        <td>
                            {{ ucfirst($todo->status) }}
                        </td>

                        <td>
                            <a href="{{ route('todos.edit', $todo->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('todos.destroy', $todo->id) }}"
                                  method="POST"
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Data masih kosong
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection