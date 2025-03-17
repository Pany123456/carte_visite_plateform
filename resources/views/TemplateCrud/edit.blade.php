@extends('layouts.app')

@section('content')
    <h1>Modifier le Template</h1>
    <form action="{{ route('TemplateCrud.update', $template) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <input type="text" name="name" value="{{ $template->name }}" required>
        <input type="file" name="thumbnail">
        <input type="file" name="file_path">
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
