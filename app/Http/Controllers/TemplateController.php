<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

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
}
