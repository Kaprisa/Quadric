<?php

use App\Block;
use App\Category;
use App\Course;
use App\Lesson;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = ['Математика', 'Программирование', 'Экономика'];

        foreach ($categories as $c) {
            $in_c = Category::create([
                'name' => $c
            ]);
            for ($i = 0 ; $i < 5 ; $i ++) {
                $course = Course::Create([
                    'name' => $faker->name,
                    'description' => $faker->text,
                    'image' => $faker->imageUrl(640, 480, 'cats'),
                    'category_id' => $in_c->id,
                    'active' => true,
                    'user_id' => 1
                ]);
                for ($k = 0 ; $k < 5 ; $k ++) {
                    $block = Block::Create([
                        'course_id' => $course->id,
                        'name' => $faker->name,
                        'active' => true,
                        'sort' => $k
                    ]);
                    for ($j = 0 ; $j < 5 ; $j ++) {
                        $lesson = Lesson::Create([
                            'block_id' => $block->id,
                            'active' => true,
                            'name' => $faker->name,
                            'resourses' => json_encode(['http:://hello.ru']),
                            'sort' => $j,
                            'text1' => $faker->text(5000),
                            'text2' => $faker->text(1000),
                            'video' => 'https://youtu.be/taicWTD3cEA'
                        ]);

                        for ($h = 0 ; $h < 10 ; $h ++) {
                            $answers = [];
                            for ($o = 0 ; $o < $faker->numberBetween(3, 7); $o ++) {
                                $answers[] = [
                                    'text' => $faker->text(70),
                                    'correct' => $faker->boolean
                                ];
                            }
                            $lesson->questions()->create([
                                'text' => $faker->text,
                                'type' => 'test',
                                'answer' => json_encode($answers),
                                'points' => $faker->numberBetween(0, 5),
                                'sort' => $h,
                                'active' => true,
                                'lesson_id' => $lesson->id
                            ]);
                        }
                    }
                }

            }
        }
    }
}
