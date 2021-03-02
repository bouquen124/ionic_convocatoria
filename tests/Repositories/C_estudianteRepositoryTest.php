<?php namespace Tests\Repositories;

use App\Models\C_estudiante;
use App\Repositories\C_estudianteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class C_estudianteRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var C_estudianteRepository
     */
    protected $cEstudianteRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cEstudianteRepo = \App::make(C_estudianteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_c_estudiante()
    {
        $cEstudiante = C_estudiante::factory()->make()->toArray();

        $createdC_estudiante = $this->cEstudianteRepo->create($cEstudiante);

        $createdC_estudiante = $createdC_estudiante->toArray();
        $this->assertArrayHasKey('id', $createdC_estudiante);
        $this->assertNotNull($createdC_estudiante['id'], 'Created C_estudiante must have id specified');
        $this->assertNotNull(C_estudiante::find($createdC_estudiante['id']), 'C_estudiante with given id must be in DB');
        $this->assertModelData($cEstudiante, $createdC_estudiante);
    }

    /**
     * @test read
     */
    public function test_read_c_estudiante()
    {
        $cEstudiante = C_estudiante::factory()->create();

        $dbC_estudiante = $this->cEstudianteRepo->find($cEstudiante->id);

        $dbC_estudiante = $dbC_estudiante->toArray();
        $this->assertModelData($cEstudiante->toArray(), $dbC_estudiante);
    }

    /**
     * @test update
     */
    public function test_update_c_estudiante()
    {
        $cEstudiante = C_estudiante::factory()->create();
        $fakeC_estudiante = C_estudiante::factory()->make()->toArray();

        $updatedC_estudiante = $this->cEstudianteRepo->update($fakeC_estudiante, $cEstudiante->id);

        $this->assertModelData($fakeC_estudiante, $updatedC_estudiante->toArray());
        $dbC_estudiante = $this->cEstudianteRepo->find($cEstudiante->id);
        $this->assertModelData($fakeC_estudiante, $dbC_estudiante->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_c_estudiante()
    {
        $cEstudiante = C_estudiante::factory()->create();

        $resp = $this->cEstudianteRepo->delete($cEstudiante->id);

        $this->assertTrue($resp);
        $this->assertNull(C_estudiante::find($cEstudiante->id), 'C_estudiante should not exist in DB');
    }
}
