<?php

namespace App\Http\Controllers;

use App\Models\AnonymousStory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        $stories = AnonymousStory::query()
            ->latest()
            ->take(9)
            ->get(['id', 'story', 'created_at']);

        return view('index', [
            'stories' => $stories,
        ]);
    }

    public function storeAnonymousStory(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'story' => ['required', 'string', 'min:1', 'max:10000'],
            'anonConfirm' => ['accepted'],
        ]);

        AnonymousStory::create([
            'story' => $validated['story'],
        ]);

        return redirect()->to(route('home', absolute: false).'#solidaritas')
            ->with('story_submitted', true);
    }
}
