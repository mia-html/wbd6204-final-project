<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

    class RecipeController extends Controller
{
    // DISPLAY ALL RECIPES
    public function index() {
        return view('recipes.index', [
            'recipes' => Recipe::filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // SINGLE RECIPE
    public function show(Recipe $recipe) {
        return view('recipes.show', [
            'recipe' => $recipe
        ]);
    }

    // CREATE FORM
    public function create() {
        return view('recipes.create');
    }

    // STORE DATA
        public function store(Request $request) {
            $formFields = $request->validate([
                'title' => 'required',
                'owner' => 'required',
                'duration' => 'required',
                'email' => ['required', 'email'],
                'tags' => 'required',
                'description' => 'required'
            ]);

            if($request->hasFile('dish')) {
                $formFields['dish'] =$request->file('dish')->store('photos', 'public');
            }

            $formFields['user_id'] = auth()->id();

            Recipe::create($formFields);

            return redirect('/')->with('message', 'Recipe posted successfully');
        }

        // EDIT POST
        public function edit(Recipe $recipe) {
            return view('recipes.edit', ['recipe' => $recipe]);
        }

        // UPDATE POST
        public function update(Request $request, Recipe $recipe) {
            if($recipe->user_id != auth()->id()) {
                abort(403, 'Access denied');
            }
            $formFields = $request->validate([
                'title' => 'required',
                'owner' => 'required',
                'duration' => 'required',
                'email' => ['required', 'email'],
                'tags' => 'required',
                'description' => 'required'
            ]);

            if($request->hasFile('dish')) {
                $formFields['dish'] =$request->file('dish')->store('photos', 'public');
            }

            $recipe->update($formFields);

            return redirect('/')->with('message', 'Post updated successfully');
        }
        public function delete(Recipe $recipe) {
            if($recipe->user_id != auth()->id()) {
                abort(403, 'Access denied');
            }
            $recipe->delete();
            return redirect('/')->with('message', 'Post deleted successfully');
        }

        // MANAGE POSTS
        public function manage() {
            return view('recipes.manage', ['recipes' => auth()->user()->recipes()->get()]);
        }
    }
