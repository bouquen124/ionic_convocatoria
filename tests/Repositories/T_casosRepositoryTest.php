<?php namespace Tests\Repositories;

use App\Models\T_casos;
use App\Repositories\T_casosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class T_casosRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var T_casosRepository
     */
    protected $tCasosRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tCasosRepo = \App::make(T_casosRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_t_casos()
    {
        $tCasos = T_casos::factory()->make()->toArray();

        $createdT_casos = $this->tCasosRepo->create($tCasos);

        $createdT_casos = $createdT_casos->toArray();
        $this->assertArrayHasKey('id', $createdT_casos);
        $this->assertNotNull($createdT_casos['id'], 'Created T_casos must have id specified');
        $this->assertNotNull(T_casos::find($createdT_casos['id']), 'T_casos with given id must be in DB');
        $this->assertModelData($tCasos, $createdT_casos);
    }

    /**
     * @test read
     */
    public function test_read_t_casos()
    {
        $tCasos = T_casos::factory()->create();

        $dbT_casos = $this->tCasosRepo->find($tCasos->id);

        $dbT_casos = $dbT_casos->toArray();
        $this->assertModelData($tCasos->toArray(), $dbT_casos);
    }

    /**
     * @test update
     */
    public function test_update_t_casos()
    {
        $tCasos = T_casos::factory()->create();
        $fakeT_casos = T_casos::factory()->make()->toArray();

        $updatedT_casos = $this->tCasosRepo->update($fakeT_casos, $tCasos->id);

        $this->assertModelData($fakeT_casos, $updatedT_casos->toArray());
        $dbT_casos = $this->tCasosRepo->find($tCasos->id);
        $this->assertModelData($fakeT_casos, $dbT_casos->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_t_casos()
    {
        $tCasos = T_casos::factory()->create();

        $resp = $this->tCasosRepo->delete($tCasos->id);

        $this->assertTrue($resp);
        $this->assertNull(T_casos::find($tCasos->id), 'T_casos should not exist in DB');
    }
}
