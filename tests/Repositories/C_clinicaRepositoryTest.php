<?php namespace Tests\Repositories;

use App\Models\C_clinica;
use App\Repositories\C_clinicaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class C_clinicaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var C_clinicaRepository
     */
    protected $cClinicaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cClinicaRepo = \App::make(C_clinicaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_c_clinica()
    {
        $cClinica = C_clinica::factory()->make()->toArray();

        $createdC_clinica = $this->cClinicaRepo->create($cClinica);

        $createdC_clinica = $createdC_clinica->toArray();
        $this->assertArrayHasKey('id', $createdC_clinica);
        $this->assertNotNull($createdC_clinica['id'], 'Created C_clinica must have id specified');
        $this->assertNotNull(C_clinica::find($createdC_clinica['id']), 'C_clinica with given id must be in DB');
        $this->assertModelData($cClinica, $createdC_clinica);
    }

    /**
     * @test read
     */
    public function test_read_c_clinica()
    {
        $cClinica = C_clinica::factory()->create();

        $dbC_clinica = $this->cClinicaRepo->find($cClinica->id);

        $dbC_clinica = $dbC_clinica->toArray();
        $this->assertModelData($cClinica->toArray(), $dbC_clinica);
    }

    /**
     * @test update
     */
    public function test_update_c_clinica()
    {
        $cClinica = C_clinica::factory()->create();
        $fakeC_clinica = C_clinica::factory()->make()->toArray();

        $updatedC_clinica = $this->cClinicaRepo->update($fakeC_clinica, $cClinica->id);

        $this->assertModelData($fakeC_clinica, $updatedC_clinica->toArray());
        $dbC_clinica = $this->cClinicaRepo->find($cClinica->id);
        $this->assertModelData($fakeC_clinica, $dbC_clinica->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_c_clinica()
    {
        $cClinica = C_clinica::factory()->create();

        $resp = $this->cClinicaRepo->delete($cClinica->id);

        $this->assertTrue($resp);
        $this->assertNull(C_clinica::find($cClinica->id), 'C_clinica should not exist in DB');
    }
}
