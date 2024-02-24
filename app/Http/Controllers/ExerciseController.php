<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::all();

        return response()->json($exercises);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique|max:50'
        ]);

        $exercise = new Exercise();
        $exercise->name = $request->name;
        $exercise->save();

        return response()->json([
            'message' => 'Exercise added'
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique|max:50'
        ]);

        if (Exercise::where('id', $id)->exists()) {
            $exercise = Exercise::find($id);

            $exercise->name = $request->name;
            $exercise->save();

            return response()->json([
                'message' => 'Exercise updated',
            ], 200);
        }

        return response()->json([
            'message' => 'Exercise not found'
        ], 404);
    }

    public function show(string $id)
    {
        $exercise = Exercise::find($id);

        if (!empty($exercise)) {
            return response()->json($exercise);
        }

        return response()->json([
            'message' => 'Exercise not found'
        ], 404);
    }

    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        if (Exercise::where('id', $id)->exists()) {
            $exercise = Exercise::find($id);
            $exercise->delete();

            return response()->json([
                'message' => 'Exercise has been deleted!'
            ], 202);
        }

        return response()->json([
            'message' => 'exercise not found.'
        ], 404);
    }
}
