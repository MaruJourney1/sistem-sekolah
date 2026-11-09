<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends Factory<Subject>
 */
class SubjectFactory extends Factory
{
    protected $model = Subject::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $Subjects= ['Akuntansi Dasar','Pemrograman Web Dasar','Pemrograman Web Lanjutan'];
        return [
            'name' => fake()->unique()->randomElement($Subjects)
        ];
    }
}
