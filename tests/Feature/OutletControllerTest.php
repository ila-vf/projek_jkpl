<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Outlet;

class OutletControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Functional Suitability - Completeness
     */
    public function test_can_list_outlets()
    {
        Outlet::factory()->count(5)->create();
        $response = $this->get('/outlet');

        $response->assertStatus(200);
        $response->assertViewHas('data');
    }

    /**
     * Test Functional Suitability - Correctness
     */
    public function test_can_store_outlet()
    {
        $response = $this->post('/outlet', [
            'nama' => 'Outlet A',
            'alamat' => 'Alamat A',
            'hotline' => '123456789',
            'email' => 'outlet@example.com'
        ]);

        $response->assertRedirect('/outlet');
        $this->assertDatabaseHas('outlets', [
            'nama' => 'Outlet A',
            'alamat' => 'Alamat A',
        ]);
    }

    /**
     * Test Functional Suitability - Appropriateness
     */
    public function test_can_update_outlet()
    {
        $outlet = Outlet::factory()->create();

        $response = $this->put("/outlet/{$outlet->id}", [
            'nama' => 'Updated Outlet',
            'alamat' => 'Updated Address',
            'hotline' => '987654321',
            'email' => 'updated@example.com'
        ]);

        $response->assertRedirect('/outlet');
        $this->assertDatabaseHas('outlets', [
            'id' => $outlet->id,
            'nama' => 'Updated Outlet',
        ]);
    }

    /**
     * Test Performance Efficiency - Time Behaviour
     */
    public function test_index_page_performance()
    {
        $startTime = microtime(true);

        $this->get('/outlet');

        $endTime = microtime(true);
        $executionTime = $endTime - $startTime;

        $this->assertLessThan(2, $executionTime, 'Index page should load within 2 seconds.');
    }

    /**
     * Test Maintainability - Modifiability
     */
    public function test_controller_code_is_modifiable()
    {
        $controllerPath = app_path('Http/Controllers/OutletController.php');
        $this->assertFileExists($controllerPath, 'OutletController should exist.');
        $this->assertTrue(is_writable($controllerPath), 'OutletController should be writable.');
    }

    /**
     * Test Maintainability - Testability
     */
    public function test_routes_are_testable()
    {
        $response = $this->get('/outlet');
        $response->assertStatus(200);

        $response = $this->get('/outlet/create');
        $response->assertStatus(200);
    }

    /**
     * Test Capacity - Large Data Handling
     */
    public function test_can_handle_large_data()
    {
        Outlet::factory()->count(1000)->create();

        $response = $this->get('/outlet');

        $response->assertStatus(200);
        $this->assertDatabaseCount('outlets', 1000);
    }
}
