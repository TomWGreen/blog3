<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BlogTest extends DuskTestCase
{
    /**
     * A Dusk test.
     *
     * @return void
     */
    public function test_blog_posts_visible()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->waitForText('Log in')
                    ->assertDontSee('There are no posts');
        });
    }

    /**
     * A Dusk test.
     *
     * @return void
     */
    public function test_dashboard_visible()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/dashboard')
                    ->waitForText('Dashboard')
                    ->assertSee('Create Post');
        });
    }

    /**
     * A Dusk test.
     *
     * @return void
     */
    public function test_post_creation()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/posts/create')
                    ->waitForText('Create Post')
                    ->type('#title', 'Test title')
                    ->type('#content','Test content')
                    ->click('button[type="submit"]')
                    ->waitForText('Create Post')
                    ->assertSee('Test title');
        });
    }

    /**
     * A Dusk test.
     *
     * @return void
     */
    public function test_post_edit()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/posts/1/edit')
                    ->waitForText('SAVE')
                    ->assertSee('SAVE');
        });
    }

    /**
     * A Dusk test.
     *
     * @return void
     */
    public function test_server_validation()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/posts/create')
                    ->waitForText('Create Post')
                    ->click('button[type="submit"]')
                    ->waitForText('Create Post')
                    ->assertSee('The title field is required.');
        });
    }

}
