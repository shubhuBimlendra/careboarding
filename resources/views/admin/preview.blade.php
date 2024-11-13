<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <h1>Preview Form: {{ $form->name }}</h1>
        <p>{{ $form->description }}</p>

        <form>
            @foreach($form->fields as $field)
                <div class="form-group">
                    <label>{{ $field->label }}</label>

                    @if ($field->field_type == 'text')
                        <input type="text" class="form-control" placeholder="{{ $field->label }}" {{ $field->is_required ? 'required' : '' }}>
                    @elseif ($field->field_type == 'textarea')
                        <textarea class="form-control" placeholder="{{ $field->label }}" {{ $field->is_required ? 'required' : '' }}></textarea>
                    @elseif ($field->field_type == 'radio')
                        @foreach ($field->field_options as $option)
                            <div class="form-check">
                                <input type="radio" name="{{ $field->label }}" class="form-check-input" {{ $field->is_required ? 'required' : '' }}>
                                <label class="form-check-label">{{ $option }}</label>
                            </div>
                        @endforeach
                    @elseif ($field->field_type == 'checkbox')
                        @foreach ($field->field_options as $option)
                            <div class="form-check">
                                <input type="checkbox" name="{{ $field->label }}[]" class="form-check-input" {{ $field->is_required ? 'required' : '' }}>
                                <label class="form-check-label">{{ $option }}</label>
                            </div>
                        @endforeach
                    @elseif ($field->field_type == 'dropdown')
                        <select class="form-control" {{ $field->is_required ? 'required' : '' }}>
                            <option value="">Select an option</option>
                            @foreach ($field->field_options as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
            @endforeach
        </form>
    </div>
</body>
</html>