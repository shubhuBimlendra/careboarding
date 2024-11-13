<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <h1>Edit Form: {{ $form->name }}</h1>

        <form action="{{ route('forms.update', $form->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Form Name</label>
                <input type="text" name="name" class="form-control" value="{{ $form->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Form Description</label>
                <textarea name="description" class="form-control" required>{{ $form->description }}</textarea>
            </div>

            <!-- Edit existing fields or add new fields here if needed -->
            <h3>Fields</h3>
            @foreach ($form->fields as $field)
                <div class="form-group">
                    <label>{{ $field->label }}</label>
                    <input type="text" name="fields[{{ $field->id }}][label]" class="form-control" value="{{ $field->label }}">
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Update Form</button>
        </form>
    </div>
</body>
</html>