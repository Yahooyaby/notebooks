<?php

namespace Tests\Feature;

use App\Models\Notebook;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;


class ApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_notebooks_index(): void
    {
        $response = $this->get('/api/v1/notebooks');

        $response->assertStatus(200);

    }

    public function test_notebooks_show(): void
    {
        $notebook = Notebook::factory()->create([
            'id' => '20',
        ]);

        $response = $this->get('/api/v1/notebooks/20');

        $response->assertOk();

        $response->assertJsonPath('data.full_name',$notebook->full_name);
    }

    public function test_notebooks_store()
    {
        $response = $this->post('/api/v1/notebooks',[
            'full_name' => 'Kirill Ivanov',
            'company' => 'Saturn',
            'phone_number' => '+79852310012',
            'email' => 'kiriv@mail.com',
            'date_of_birth' => '1995-9-28',
            'photo_path' =>  UploadedFile::fake()->image('avatar.jpg'),
        ]);

        $response->assertJsonPath('data.full_name','Kirill Ivanov');

        $this->assertDatabaseCount('notebooks',4);

        $this->assertDatabaseHas('notebooks',[
            'full_name' => 'Kirill Ivanov'
        ]);
    }

    public function test_notebooks_delete()
    {
        $notebook = Notebook::factory()->create([
            'id' => '100',
        ]);

        $this->assertDatabaseHas('notebooks', [
            'id' => 100
        ]);

        $this->delete("/api/v1/notebooks/$notebook->id");

        $this->assertDatabaseMissing('notebooks', [
        'id' => 100
        ]);
    }

    public function test_notebooks_update()
    {
        $notebook = Notebook::factory()->create([
            'id' => '100',
        ]);



        $notebook->update([
            'full_name' => 'Zhora Krizhovnikov']);

        $this->assertDatabaseHas('notebooks',[
            'full_name' => 'Zhora Krizhovnikov'
        ]);

    }

}
