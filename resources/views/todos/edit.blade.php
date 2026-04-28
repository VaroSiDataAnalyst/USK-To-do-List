@extends('layouts.app')

@section('title', 'Edit Todo')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="mb-0">
            Edit Data Todo
        </h4>
    </div>

    <div class="card-body">
        {{-- Error Validation --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('todos.update', $todo->id) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- Title --}}
            <div class="mb-3">
                <label class="form-label">
                    Title
                </label>

                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ old('title', $todo->title) }}"
                       placeholder="Masukkan judul todo"
                       required>
            </div>


            {{-- Description --}}
            <div class="mb-3">
                <label class="form-label">
                    Description
                </label>

                <textarea name="description"
                          class="form-control"
                          rows="4"
                          placeholder="Masukkan deskripsi todo">{{ old('description', $todo->description) }}</textarea>
            </div>


            {{-- Status --}}
            <div class="mb-3">
                <label class="form-label">
                    Status
                </label>

                <select name="status"
                        class="form-control"
                        required>

                    <option value="">
                        -- Pilih Status --
                    </option>

                    <option value="aktif"
                        {{ old('status', $todo->status) == 'aktif' ? 'selected' : '' }}>
                        Aktif
                    </option>
                    <option value="non-aktif"
                        {{ old('status', $todo->status) == 'non-aktif' ? 'selected' : '' }}>
                        Non Aktif
                    </option>
                    <option value="selesai"
                        {{ old('status', $todo->status) == 'selesai' ? 'selected' : '' }}>
                        Selesai
                    </option>

                </select>
            </div>

            {{-- Button --}}
            <div>
                <button type="submit"
                        class="btn btn-warning">
                    Update
                </button>
                <a href="{{ route('todos.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection