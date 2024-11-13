<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <h1>Form Details: {{ $form->name }}</h1>
        <p><strong>Description:</strong> {{ $form->description }}</p>
        <p><strong>Created At:</strong> {{ $form->created_at->format('Y-m-d') }}</p>

        <h3>Form Fields</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Label</th>
                    <th>Type</th>
                    <th>Required</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($form->fields as $field)
                    <tr>
                        <td>{{ $field->label }}</td>
                        <td>{{ ucfirst($field->field_type) }}</td>
                        <td>{{ $field->is_required ? 'Yes' : 'No' }}</td>
                        <td>
                            @if ($field->field_options)
                                {{ implode(', ', $field->field_options) }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>