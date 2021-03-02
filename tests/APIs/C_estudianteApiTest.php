<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\C_estudiante;

class C_estudianteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_c_estudiante()
    {
        $cEstudiante = C_estudiante::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/c_estudiantes', $cEstudiante
        );

        $this->assertApiResponse($cEstudiante);
    }

    /**
     * @test
     */
    public function test_read_c_estudiante()
    {
        $cEstudiante = C_estudiante::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/c_estudiantes/'.$cEstudiante->id
        );

        $this->assertApiResponse($cEstudiante->toArray());
    }

    /**
     * @test
     */
    public function test_update_c_estudiante()
    {
        $cEstudiante = C_estudiante::factory()->create();
        $editedC_estudiante = C_estudiante::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/c_estudiantes/'.$cEstudiante->id,
            $editedC_estudiante
        );

        $this->assertApiResponse($editedC_estudiante);
    }

    /**
     * @test
     */
    public function test_delete_c_estudiante()
    {
        $cEstudiante = C_estudiante::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/c_estudiantes/'.$cEstudiante->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/c_estudiantes/'.$cEstudiante->id
        );

        $this->response->assertStatus(404);
    }
}
