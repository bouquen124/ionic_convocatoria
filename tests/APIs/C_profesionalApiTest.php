<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\C_profesional;

class C_profesionalApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_c_profesional()
    {
        $cProfesional = C_profesional::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/c_profesionals', $cProfesional
        );

        $this->assertApiResponse($cProfesional);
    }

    /**
     * @test
     */
    public function test_read_c_profesional()
    {
        $cProfesional = C_profesional::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/c_profesionals/'.$cProfesional->id
        );

        $this->assertApiResponse($cProfesional->toArray());
    }

    /**
     * @test
     */
    public function test_update_c_profesional()
    {
        $cProfesional = C_profesional::factory()->create();
        $editedC_profesional = C_profesional::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/c_profesionals/'.$cProfesional->id,
            $editedC_profesional
        );

        $this->assertApiResponse($editedC_profesional);
    }

    /**
     * @test
     */
    public function test_delete_c_profesional()
    {
        $cProfesional = C_profesional::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/c_profesionals/'.$cProfesional->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/c_profesionals/'.$cProfesional->id
        );

        $this->response->assertStatus(404);
    }
}
