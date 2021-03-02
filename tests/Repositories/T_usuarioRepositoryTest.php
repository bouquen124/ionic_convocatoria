<?php namespace Tests\Repositories;

use App\Models\T_usuario;
use App\Repositories\T_usuarioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class T_usuarioRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var T_usuarioRepository
     */
    protected $tUsuarioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tUsuarioRepo = \App::make(T_usuarioRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_t_usuario()
    {
        $tUsuario = T_usuario::factory()->make()->toArray();

        $createdT_usuario = $this->tUsuarioRepo->create($tUsuario);

        $createdT_usuario = $createdT_usuario->toArray();
        $this->assertArrayHasKey('id', $createdT_usuario);
        $this->assertNotNull($createdT_usuario['id'], 'Created T_usuario must have id specified');
        $this->assertNotNull(T_usuario::find($createdT_usuario['id']), 'T_usuario with given id must be in DB');
        $this->assertModelData($tUsuario, $createdT_usuario);
    }

    /**
     * @test read
     */
    public function test_read_t_usuario()
    {
        $tUsuario = T_usuario::factory()->create();

        $dbT_usuario = $this->tUsuarioRepo->find($tUsuario->id);

        $dbT_usuario = $dbT_usuario->toArray();
        $this->assertModelData($tUsuario->toArray(), $dbT_usuario);
    }

    /**
     * @test update
     */
    public function test_update_t_usuario()
    {
        $tUsuario = T_usuario::factory()->create();
        $fakeT_usuario = T_usuario::factory()->make()->toArray();

        $updatedT_usuario = $this->tUsuarioRepo->update($fakeT_usuario, $tUsuario->id);

        $this->assertModelData($fakeT_usuario, $updatedT_usuario->toArray());
        $dbT_usuario = $this->tUsuarioRepo->find($tUsuario->id);
        $this->assertModelData($fakeT_usuario, $dbT_usuario->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_t_usuario()
    {
        $tUsuario = T_usuario::factory()->create();

        $resp = $this->tUsuarioRepo->delete($tUsuario->id);

        $this->assertTrue($resp);
        $this->assertNull(T_usuario::find($tUsuario->id), 'T_usuario should not exist in DB');
    }
}
