<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\T_casos;

class T_casosApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_t_casos()
    {
        $tCasos = T_casos::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/t_casos', $tCasos
        );

        $this->assertApiResponse($tCasos);
    }

    /**
     * @test
     */
    public function test_read_t_casos()
    {
        $tCasos = T_casos::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/t_casos/'.$tCasos->id
        );

        $this->assertApiResponse($tCasos->toArray());
    }

    /**
     * @test
     */
    public function test_update_t_casos()
    {
        $tCasos = T_casos::factory()->create();
        $editedT_casos = T_casos::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/t_casos/'.$tCasos->id,
            $editedT_casos
        );

        $this->assertApiResponse($editedT_casos);
    }

    /**
     * @test
     */
    public function test_delete_t_casos()
    {
        $tCasos = T_casos::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/t_casos/'.$tCasos->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/t_casos/'.$tCasos->id
        );

        $this->response->assertStatus(404);
    }
}
