<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <h1>Share Form: {{ $form->name }}</h1>
        <p>Use the following link to share this form:</p>

        <input type="text" class="form-control" value="{{ route('forms.preview', $form->id) }}" readonly>
        <small>Copy and share this link with others to access the form.</small>
    </div>
</body>
</html>