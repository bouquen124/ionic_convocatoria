<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\C_tipo;

class C_tipoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_c_tipo()
    {
        $cTipo = C_tipo::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/c_tipos', $cTipo
        );

        $this->assertApiResponse($cTipo);
    }

    /**
     * @test
     */
    public function test_read_c_tipo()
    {
        $cTipo = C_tipo::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/c_tipos/'.$cTipo->id
        );

        $this->assertApiResponse($cTipo->toArray());
    }

    /**
     * @test
     */
    public function test_update_c_tipo()
    {
        $cTipo = C_tipo::factory()->create();
        $editedC_tipo = C_tipo::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/c_tipos/'.$cTipo->id,
            $editedC_tipo
        );

        $this->assertApiResponse($editedC_tipo);
    }

    /**
     * @test
     */
    public function test_delete_c_tipo()
    {
        $cTipo = C_tipo::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/c_tipos/'.$cTipo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/c_tipos/'.$cTipo->id
        );

        $this->response->assertStatus(404);
    }
}
