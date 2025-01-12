<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\SideProject;
use App\Models\User;
use Tests\TestCase;

/**
 * @group Side Projects
 */
class SideProjectControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());
    }

    /**
     * View all side projects
     *
     * This endpoint's response was gotten via a "response call"—
     * Scribe called our API in a test environment to get a sample response.
     */
    public function test_side_projects_index()
    {
        $response = $this->get(route('side_projects.index', [
            'sort' => 'name',
            'tags' => ['done','approved'],
        ]));

        $response->assertOk();
    }

    /**
     * Start a new side project
     *
     * _Even though we both know you'll never finish it._
     *
     * This endpoint's body parameters were automatically generated by Scribe
     * from the controller's code. Check out the source! </aside>
     *
     * @authenticated
     */
    public function test_side_projects_store()
    {
        $data = SideProject::factory()->make()->toArray();

        $response = $this->post(route('side_projects.store'), $data);

        $response->assertCreated();
    }

    /**
     * View a side project
     *
     * This endpoint's response uses a Fractal transformer, so we tell Scribe that using an annotation,
     * and it figures out how to generate a sample. The 404 sample is gotten from a "response file".
     *
     * <aside class="success">Also, pretty cool: this endpoint's (and many others') URL parameters were figured out entirely by Scribe!</aside>
     *
     * @transformer  App\Http\Transformers\SideProjectTransformer
     * @transformerModel App\Models\SideProject with=owner
     */
    public function test_side_projects_show()
    {
        $user = SideProject::factory()->create();

        $response = $this->get(route('side_projects.show', $user));

        $response->assertOk();
    }

    /**
     * Update a side project
     *
     */
    public function test_side_projects_update()
    {
        $user = SideProject::factory()->create();
        $data = SideProject::factory()->make()->toArray();

        $response = $this->put(route('side_projects.update', $user), $data);

        $response->assertOk();
    }

    /**
     * Delete a side project
     *
     */
    public function test_side_projects_destroy()
    {
        $user = SideProject::factory()->create();

        $response = $this->put(route('side_projects.destroy', $user));

        $response->assertOk();
    }

    /**
     * Finish a side project
     *
     * Hmmm.🤔
     */
    public function test_side_projects_finish()
    {
        $this->assertTrue(true);
    }
}
