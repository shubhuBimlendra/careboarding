<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Optional styling for the Create New Form button */
        .create-form-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 15px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to the Admin Dashboard</h1>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </header>

    <main>
        <div>
            <!-- Create New Form Button -->
            <a href="{{ route('forms.create') }}" class="create-form-button">Create New Form</a>
        </div>

        <h2>List of Forms</h2>

        <!-- Check if there are any forms -->
        @if($forms->isEmpty())
            <p>No forms available.</p>
        @else
            <table border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($forms as $form)
                        <tr>
                            <td>{{ $form->id }}</td>
                            <td>{{ $form->name }}</td>
                            <td>{{ $form->description }}</td>
                            <td>{{ $form->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('forms.show', $form->id) }}">View</a>
                                <a href="{{ route('forms.edit', $form->id) }}">Edit</a>
                                <a href="{{ route('forms.preview', $form->id) }}">Preview</a>
                                <a href="{{ route('forms.share', $form->id) }}">Share</a>
                                <form action="{{ route('forms.destroy', $form->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                                
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </main>
</body>
</html>

