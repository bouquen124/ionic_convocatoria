<?php namespace Tests\Repositories;

use App\Models\C_profesional;
use App\Repositories\C_profesionalRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class C_profesionalRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var C_profesionalRepository
     */
    protected $cProfesionalRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cProfesionalRepo = \App::make(C_profesionalRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_c_profesional()
    {
        $cProfesional = C_profesional::factory()->make()->toArray();

        $createdC_profesional = $this->cProfesionalRepo->create($cProfesional);

        $createdC_profesional = $createdC_profesional->toArray();
        $this->assertArrayHasKey('id', $createdC_profesional);
        $this->assertNotNull($createdC_profesional['id'], 'Created C_profesional must have id specified');
        $this->assertNotNull(C_profesional::find($createdC_profesional['id']), 'C_profesional with given id must be in DB');
        $this->assertModelData($cProfesional, $createdC_profesional);
    }

    /**
     * @test read
     */
    public function test_read_c_profesional()
    {
        $cProfesional = C_profesional::factory()->create();

        $dbC_profesional = $this->cProfesionalRepo->find($cProfesional->id);

        $dbC_profesional = $dbC_profesional->toArray();
        $this->assertModelData($cProfesional->toArray(), $dbC_profesional);
    }

    /**
     * @test update
     */
    public function test_update_c_profesional()
    {
        $cProfesional = C_profesional::factory()->create();
        $fakeC_profesional = C_profesional::factory()->make()->toArray();

        $updatedC_profesional = $this->cProfesionalRepo->update($fakeC_profesional, $cProfesional->id);

        $this->assertModelData($fakeC_profesional, $updatedC_profesional->toArray());
        $dbC_profesional = $this->cProfesionalRepo->find($cProfesional->id);
        $this->assertModelData($fakeC_profesional, $dbC_profesional->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_c_profesional()
    {
        $cProfesional = C_profesional::factory()->create();

        $resp = $this->cProfesionalRepo->delete($cProfesional->id);

        $this->assertTrue($resp);
        $this->assertNull(C_profesional::find($cProfesional->id), 'C_profesional should not exist in DB');
    }
}
