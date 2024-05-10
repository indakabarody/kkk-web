<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentFeatureTest extends TestCase
{
    /**
     * Test for showing students.
     *
     * @return void
     */
    public function test_can_list_students(): void
    {
        Student::factory()->create();

        $response = $this->getJson('/api/students');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                '*' => ['id', 'nim', 'name', 'email', 'created_at', 'updated_at']
            ]
        ]);
    }

    /**
     * Test for showing student detail.
     *
     * @return void
     */
    public function test_can_show_student_details(): void
    {
        $student = Student::factory()->create();

        $response = $this->getJson('/api/students/' . $student->id);

        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                'id' => $student->id,
                'nim' => $student->nim,
                'name' => $student->name,
                'email' => $student->email,
            ]
        ]);
    }

    /**
     * Test for storing new student.
     *
     * @return void
     */
    public function test_can_create_student(): void
    {
        $student = Student::factory()->make();

        $response = $this->postJson('/api/students', $student->toArray());

        $response->assertStatus(201);

        $this->assertDatabaseHas('students', [
            'nim' => $student->nim,
            'name' => $student->name,
            'email' => $student->email,
        ]);
    }

    /**
     * Test for updating student data.
     *
     * @return void
     */
    public function test_can_update_student(): void
    {
        $student = Student::factory()->create();

        $updatedData = [
            'nim' => $student->nim,
            'name' => 'Jane Doe',
            'email' => 'jane.doe@example.com',
        ];

        $response = $this->putJson("/api/students/{$student->id}", $updatedData);

        $response->assertStatus(201);

        $this->assertDatabaseHas('students', $updatedData);

        $student->delete();
    }

    /**
     * Test for deleting student.
     *
     * @return void
     */
    public function test_can_delete_student(): void
    {
        $student = Student::factory()->create();

        $response = $this->deleteJson('/api/students/' . $student->id);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('students', ['id' => $student->id]);
    }
}
