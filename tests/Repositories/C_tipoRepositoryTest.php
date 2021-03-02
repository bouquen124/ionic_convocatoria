<?php namespace Tests\Repositories;

use App\Models\C_tipo;
use App\Repositories\C_tipoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class C_tipoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var C_tipoRepository
     */
    protected $cTipoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cTipoRepo = \App::make(C_tipoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_c_tipo()
    {
        $cTipo = C_tipo::factory()->make()->toArray();

        $createdC_tipo = $this->cTipoRepo->create($cTipo);

        $createdC_tipo = $createdC_tipo->toArray();
        $this->assertArrayHasKey('id', $createdC_tipo);
        $this->assertNotNull($createdC_tipo['id'], 'Created C_tipo must have id specified');
        $this->assertNotNull(C_tipo::find($createdC_tipo['id']), 'C_tipo with given id must be in DB');
        $this->assertModelData($cTipo, $createdC_tipo);
    }

    /**
     * @test read
     */
    public function test_read_c_tipo()
    {
        $cTipo = C_tipo::factory()->create();

        $dbC_tipo = $this->cTipoRepo->find($cTipo->id);

        $dbC_tipo = $dbC_tipo->toArray();
        $this->assertModelData($cTipo->toArray(), $dbC_tipo);
    }

    /**
     * @test update
     */
    public function test_update_c_tipo()
    {
        $cTipo = C_tipo::factory()->create();
        $fakeC_tipo = C_tipo::factory()->make()->toArray();

        $updatedC_tipo = $this->cTipoRepo->update($fakeC_tipo, $cTipo->id);

        $this->assertModelData($fakeC_tipo, $updatedC_tipo->toArray());
        $dbC_tipo = $this->cTipoRepo->find($cTipo->id);
        $this->assertModelData($fakeC_tipo, $dbC_tipo->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_c_tipo()
    {
        $cTipo = C_tipo::factory()->create();

        $resp = $this->cTipoRepo->delete($cTipo->id);

        $this->assertTrue($resp);
        $this->assertNull(C_tipo::find($cTipo->id), 'C_tipo should not exist in DB');
    }
}
