<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\T_usuario;

class T_usuarioApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_t_usuario()
    {
        $tUsuario = T_usuario::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/t_usuarios', $tUsuario
        );

        $this->assertApiResponse($tUsuario);
    }

    /**
     * @test
     */
    public function test_read_t_usuario()
    {
        $tUsuario = T_usuario::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/t_usuarios/'.$tUsuario->id
        );

        $this->assertApiResponse($tUsuario->toArray());
    }

    /**
     * @test
     */
    public function test_update_t_usuario()
    {
        $tUsuario = T_usuario::factory()->create();
        $editedT_usuario = T_usuario::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/t_usuarios/'.$tUsuario->id,
            $editedT_usuario
        );

        $this->assertApiResponse($editedT_usuario);
    }

    /**
     * @test
     */
    public function test_delete_t_usuario()
    {
        $tUsuario = T_usuario::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/t_usuarios/'.$tUsuario->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/t_usuarios/'.$tUsuario->id
        );

        $this->response->assertStatus(404);
    }
}
