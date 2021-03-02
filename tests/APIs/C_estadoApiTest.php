<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\C_estado;

class C_estadoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_c_estado()
    {
        $cEstado = C_estado::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/c_estados', $cEstado
        );

        $this->assertApiResponse($cEstado);
    }

    /**
     * @test
     */
    public function test_read_c_estado()
    {
        $cEstado = C_estado::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/c_estados/'.$cEstado->id
        );

        $this->assertApiResponse($cEstado->toArray());
    }

    /**
     * @test
     */
    public function test_update_c_estado()
    {
        $cEstado = C_estado::factory()->create();
        $editedC_estado = C_estado::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/c_estados/'.$cEstado->id,
            $editedC_estado
        );

        $this->assertApiResponse($editedC_estado);
    }

    /**
     * @test
     */
    public function test_delete_c_estado()
    {
        $cEstado = C_estado::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/c_estados/'.$cEstado->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/c_estados/'.$cEstado->id
        );

        $this->response->assertStatus(404);
    }
}
