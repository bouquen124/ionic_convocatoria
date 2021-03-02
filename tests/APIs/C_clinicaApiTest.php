<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\C_clinica;

class C_clinicaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_c_clinica()
    {
        $cClinica = C_clinica::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/c_clinicas', $cClinica
        );

        $this->assertApiResponse($cClinica);
    }

    /**
     * @test
     */
    public function test_read_c_clinica()
    {
        $cClinica = C_clinica::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/c_clinicas/'.$cClinica->id
        );

        $this->assertApiResponse($cClinica->toArray());
    }

    /**
     * @test
     */
    public function test_update_c_clinica()
    {
        $cClinica = C_clinica::factory()->create();
        $editedC_clinica = C_clinica::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/c_clinicas/'.$cClinica->id,
            $editedC_clinica
        );

        $this->assertApiResponse($editedC_clinica);
    }

    /**
     * @test
     */
    public function test_delete_c_clinica()
    {
        $cClinica = C_clinica::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/c_clinicas/'.$cClinica->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/c_clinicas/'.$cClinica->id
        );

        $this->response->assertStatus(404);
    }
}
