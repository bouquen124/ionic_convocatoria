<?php namespace Tests\Repositories;

use App\Models\C_boletin;
use App\Repositories\C_boletinRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class C_boletinRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var C_boletinRepository
     */
    protected $cBoletinRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cBoletinRepo = \App::make(C_boletinRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_c_boletin()
    {
        $cBoletin = C_boletin::factory()->make()->toArray();

        $createdC_boletin = $this->cBoletinRepo->create($cBoletin);

        $createdC_boletin = $createdC_boletin->toArray();
        $this->assertArrayHasKey('id', $createdC_boletin);
        $this->assertNotNull($createdC_boletin['id'], 'Created C_boletin must have id specified');
        $this->assertNotNull(C_boletin::find($createdC_boletin['id']), 'C_boletin with given id must be in DB');
        $this->assertModelData($cBoletin, $createdC_boletin);
    }

    /**
     * @test read
     */
    public function test_read_c_boletin()
    {
        $cBoletin = C_boletin::factory()->create();

        $dbC_boletin = $this->cBoletinRepo->find($cBoletin->id);

        $dbC_boletin = $dbC_boletin->toArray();
        $this->assertModelData($cBoletin->toArray(), $dbC_boletin);
    }

    /**
     * @test update
     */
    public function test_update_c_boletin()
    {
        $cBoletin = C_boletin::factory()->create();
        $fakeC_boletin = C_boletin::factory()->make()->toArray();

        $updatedC_boletin = $this->cBoletinRepo->update($fakeC_boletin, $cBoletin->id);

        $this->assertModelData($fakeC_boletin, $updatedC_boletin->toArray());
        $dbC_boletin = $this->cBoletinRepo->find($cBoletin->id);
        $this->assertModelData($fakeC_boletin, $dbC_boletin->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_c_boletin()
    {
        $cBoletin = C_boletin::factory()->create();

        $resp = $this->cBoletinRepo->delete($cBoletin->id);

        $this->assertTrue($resp);
        $this->assertNull(C_boletin::find($cBoletin->id), 'C_boletin should not exist in DB');
    }
}
