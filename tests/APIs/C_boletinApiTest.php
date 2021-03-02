<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\C_boletin;

class C_boletinApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_c_boletin()
    {
        $cBoletin = C_boletin::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/c_boletins', $cBoletin
        );

        $this->assertApiResponse($cBoletin);
    }

    /**
     * @test
     */
    public function test_read_c_boletin()
    {
        $cBoletin = C_boletin::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/c_boletins/'.$cBoletin->id
        );

        $this->assertApiResponse($cBoletin->toArray());
    }

    /**
     * @test
     */
    public function test_update_c_boletin()
    {
        $cBoletin = C_boletin::factory()->create();
        $editedC_boletin = C_boletin::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/c_boletins/'.$cBoletin->id,
            $editedC_boletin
        );

        $this->assertApiResponse($editedC_boletin);
    }

    /**
     * @test
     */
    public function test_delete_c_boletin()
    {
        $cBoletin = C_boletin::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/c_boletins/'.$cBoletin->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/c_boletins/'.$cBoletin->id
        );

        $this->response->assertStatus(404);
    }
}
