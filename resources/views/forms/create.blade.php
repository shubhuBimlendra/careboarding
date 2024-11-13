<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Form</title>
</head>
<body>
    <h1>Create New Form</h1>
    <form action="{{ route('forms.store') }}" method="POST">
        @csrf
        <label for="name">Form Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <div id="fields">
            <!-- JavaScript will dynamically add form fields here -->
        </div>

        <button type="button" onclick="addField()">Add Field</button><br><br>

        <button type="submit">Create Form</button>
    </form>

    <script>
        // Counter to track field index
        let fieldIndex = 0;

        // Function to add a new form field section
        function addField() {
            const fieldsContainer = document.getElementById('fields');

            // Create a wrapper div for each field
            const fieldWrapper = document.createElement('div');
            fieldWrapper.classList.add('field-group');
            fieldWrapper.style.border = '1px solid #ccc';
            fieldWrapper.style.padding = '10px';
            fieldWrapper.style.marginBottom = '10px';

            // Label input
            fieldWrapper.innerHTML += `
                <label>Field Label:</label>
                <input type="text" name="fields[${fieldIndex}][label]" required><br><br>
            `;

            // Is Required checkbox
            fieldWrapper.innerHTML += `
                <label>Is Required:</label>
                <input type="checkbox" name="fields[${fieldIndex}][is_required]" value="1"><br><br>
            `;

            // Field Type selection
            fieldWrapper.innerHTML += `
                <label>Field Type:</label>
                <select name="fields[${fieldIndex}][field_type]" onchange="toggleFieldOptions(this, ${fieldIndex})" required>
                    <option value="text">Text</option>
                    <option value="textarea">Textarea</option>
                    <option value="radio">Radio</option>
                    <option value="checkbox">Checkbox</option>
                    <option value="dropdown">Dropdown</option>
                    <option value="image">Image</option>
                </select><br><br>
            `;

            // Options container for radio, checkbox, and dropdown
            fieldWrapper.innerHTML += `
                <div id="options-container-${fieldIndex}" style="display: none;">
                    <label>Field Options (comma-separated):</label>
                    <input type="text" name="fields[${fieldIndex}][field_options]" placeholder="Option1, Option2"><br><br>
                </div>
            `;

            // Append the field wrapper to the fields container
            fieldsContainer.appendChild(fieldWrapper);
            fieldIndex++;
        }

        // Function to toggle field options input based on selected field type
        function toggleFieldOptions(selectElement, index) {
            const optionsContainer = document.getElementById(`options-container-${index}`);
            const selectedType = selectElement.value;

            // Show options input only for radio, checkbox, and dropdown types
            if (selectedType === 'radio' || selectedType === 'checkbox' || selectedType === 'dropdown') {
                optionsContainer.style.display = 'block';
            } else {
                optionsContainer.style.display = 'none';
            }
        }
    </script>
</body>
</html>
