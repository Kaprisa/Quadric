<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Question;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    public function save(Request $request, $id)
    {
        $lesson = Lesson::updateOrCreate([ 'id' => $request->id ], [
            'block_id' => $id,
            'active' => $request->active,
            'name' => $request->name,
            'resourses' => json_encode($request->resourses),
            'sort' => Lesson::count() + 1, //Todo исправить!!!
            'text' => $request->text,
            'video' => $request->video
        ]);

        $lesson->questions()->delete();
        foreach ($request->questions as $index => $q) {
            $arr = [
                'text' => $q['text'],
                'type' => array_has($q, 'type') ? $q['type'] : 'test',
                'answer' => $q['type'] === 'Задача' ? $q['answer'] : json_encode($q['answers']),
                'points' => $q['points'],
                'sort' => $index + 1,
                'active' => $q['active'],
                'lesson_id' => $lesson->id
            ];
            if (array_has($q, 'controller')) $arr = array_merge($arr, ['controller' => $q['controller']]);
            if (array_has($q, 'comment')) $arr = array_merge($arr, ['comment' => $q['comment']]);
            Question::create($arr);
        }

        return response()->json($lesson->id, 200);
    }

    public function delete($id)
    {
        Lesson::destroy($id);
        return response()->json(null, 200);
    }

    public function get($id)
    {
        $lesson = Lesson::find($id);
        return response()->json($lesson, 200);
    }
}
