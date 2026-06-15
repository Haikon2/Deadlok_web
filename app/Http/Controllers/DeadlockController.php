<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DeadlockController extends Controller
{
    /**
     * Show the home page
     */
    public function home(): View
    {
        return view('deadlock.home');
    }

    /**
     * Show the info page with a specific category
     */
    public function info($category = 'heroes'): View
    {
        $validCategories = ['heroes', 'lore', 'gameplay', 'items'];
        
        if (!in_array($category, $validCategories)) {
            $category = 'heroes';
        }

        return view('deadlock.info', [
            'currentCategory' => $category,
            'categories' => $validCategories,
        ]);
    }

    /**
     * Show the news page
     */
    public function news(): View
    {
        return view('deadlock.news');
    }
}
