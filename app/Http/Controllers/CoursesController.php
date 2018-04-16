<?php

namespace App\Http\Controllers;

use App\Course;
use App\Question;
use Illuminate\Http\Request;

class CoursesController extends Controller
{

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required'
        ]);

        $course = Course::updateOrCreate([ 'id' => $request->id ], [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
            'category_id' => $request->category_id,
            'active' => $request->active
        ]);

        return response()->json($course->id, 200);
    }

    public function getAll()
    {
        $courses = Course::all();
        return response()->json($courses, 200);
    }

    public function get($id)
    {
        $course = Course::find($id);
        $blocks = $course->blocks;
        return response()->json(compact('course', 'blocks'), 200);
    }

    public function delete($id)
    {
        Course::destroy($id);
        return response()->json(null, 200);
    }

    public function getAddFormInfo()
    {
        $types = Question::Types;
        return response()->json(compact('types'), 200);
    }

}
