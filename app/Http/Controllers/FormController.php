<?php

namespace App\Http\Controllers;
use App\Models\Form;
use App\Models\FormField;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::with('fields')->get();
        return view('admin.index', compact('forms'));
    }

    public function create()
    {
        return view('forms.create');
    }

    public function store(Request $request)
    {
        $form = Form::create($request->only('name', 'description'));

    // Loop through each dynamic field and save it
    foreach ($request->fields as $fieldData) {
        $form->fields()->create([
            'label' => $fieldData['label'],
            'is_required' => isset($fieldData['is_required']),
            'field_type' => $fieldData['field_type'],
            'field_options' => $fieldData['field_options'] ?? null,
        ]);
    }

    return redirect()->route('dashboard')->with('success', 'Form created successfully.');
    }

    public function edit(Form $form)
    {
        return view('admin.edit', compact('form'));
    }

    public function update(Request $request, Form $form)
    {
        $form->update($request->only('name', 'description'));

        $form->fields()->delete();

        foreach ($request->fields as $fieldData) {
            $form->fields()->create([
                'label' => $fieldData['label'],
                'is_required' => $fieldData['is_required'],
                'field_type' => $fieldData['field_type'],
                'field_options' => $fieldData['field_options'] ?? null,
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'Form updated successfully.');
    }

    public function destroy(Form $form)
    {
        $form->delete();
        return redirect()->route('dashboard')->with('success', 'Form deleted successfully.');
    }

    public function show($id)
    {
        // Find the form by ID and load its fields (assuming a relationship exists)
        $form = Form::with('fields')->findOrFail($id);

        // Return the view with form data
        return view('admin.show', compact('form'));
    }

    public function preview(Form $form)
    {
        return view('admin.preview', compact('form'));
    }

    public function share(Form $form)
    {
        return view('admin.share', compact('form'));
    }
}
