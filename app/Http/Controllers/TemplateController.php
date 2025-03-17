<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function preview($path)
    {
        // Convert the template path to a valid view name
        $templateView = 'templates.' . str_replace('/', '.', $path);

        // Check if the view exists
        if (!View::exists($templateView)) {
            return response('<p class="text-center text-danger">Template introuvable.</p>', 404);
        }

        // Render and return the template
        return view($templateView)->render();
    }

    public function index()
    {
        $templates = Template::all();
        return view('TemplateCrud.index', compact('templates'));
    }

    public function create()
    {
        return view('TemplateCrud.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',

        ]);

        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');

        Template::create([
            'name' => $request->name,
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('templateCrud.index')->with('success', 'Template ajouté avec succès.');
    }

    public function edit(Template $template)
    {
        return view('TemplateCrud.edit', compact('template'));
    }

    public function update(Request $request, Template $template)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $template->thumbnail = $thumbnailPath;
        }


        $template->name = $request->name;
        $template->save();

        return redirect()->route('templateCrud.index')->with('success', 'Template mis à jour.');
    }

    public function destroy(Template $template)
    {
        $template->delete();
        return redirect()->route('templateCrud.index')->with('success', 'Template supprimé.');
    }
}
