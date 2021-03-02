<?php namespace Tests\Repositories;

use App\Models\C_estado;
use App\Repositories\C_estadoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class C_estadoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var C_estadoRepository
     */
    protected $cEstadoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cEstadoRepo = \App::make(C_estadoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_c_estado()
    {
        $cEstado = C_estado::factory()->make()->toArray();

        $createdC_estado = $this->cEstadoRepo->create($cEstado);

        $createdC_estado = $createdC_estado->toArray();
        $this->assertArrayHasKey('id', $createdC_estado);
        $this->assertNotNull($createdC_estado['id'], 'Created C_estado must have id specified');
        $this->assertNotNull(C_estado::find($createdC_estado['id']), 'C_estado with given id must be in DB');
        $this->assertModelData($cEstado, $createdC_estado);
    }

    /**
     * @test read
     */
    public function test_read_c_estado()
    {
        $cEstado = C_estado::factory()->create();

        $dbC_estado = $this->cEstadoRepo->find($cEstado->id);

        $dbC_estado = $dbC_estado->toArray();
        $this->assertModelData($cEstado->toArray(), $dbC_estado);
    }

    /**
     * @test update
     */
    public function test_update_c_estado()
    {
        $cEstado = C_estado::factory()->create();
        $fakeC_estado = C_estado::factory()->make()->toArray();

        $updatedC_estado = $this->cEstadoRepo->update($fakeC_estado, $cEstado->id);

        $this->assertModelData($fakeC_estado, $updatedC_estado->toArray());
        $dbC_estado = $this->cEstadoRepo->find($cEstado->id);
        $this->assertModelData($fakeC_estado, $dbC_estado->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_c_estado()
    {
        $cEstado = C_estado::factory()->create();

        $resp = $this->cEstadoRepo->delete($cEstado->id);

        $this->assertTrue($resp);
        $this->assertNull(C_estado::find($cEstado->id), 'C_estado should not exist in DB');
    }
}
