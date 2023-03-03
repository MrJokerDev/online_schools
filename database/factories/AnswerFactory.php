<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Questions;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */

class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $questionIDs = DB::table('questions')->pluck('id');
        return [
            'answer' => fake()->title(),
            'questions_id' => fake()->randomElement($questionIDs)
        ];
    }
}