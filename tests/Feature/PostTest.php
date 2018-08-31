<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory as Faker;

class PostTest extends TestCase
{

    public function test_user_can_see_all_posts()
    {
        $this->get('admin/posts')->assertStatus(200)->assertSeeText('Posts');
    }

    public function test_user_can_visit_add_post(){
        $this->get('admin/posts/create')->assertStatus(200)->assertSeeText('Create Posts');
    }

    public function test_if_user_can_add_new_post(){
        $data = factory(Post::class)->create();
        $this->post('admin/posts' , $data->toArray())->assertRedirect('admin/posts');
        $this->get('admin/posts')->assertSeeText($data->title);
    }
    
    public function test_if_user_can_visit_edit_post(){
        $post = factory(Post::class)->create();
        $this->get('admin/posts/'.$post->id.'/edit')->assertStatus(200)->assertSeeText($post->title);
    }

    public function test_check_if_user_can_update(){

        $post = factory(Post::class)->create();

        $faker = Faker::create();

        $data = [
            'title' => $faker->sentence,
            'body' => $faker->paragraph,
        ];

        $this->put('admin/posts/'.$post->id.'/update' , $data)
            ->assertRedirect('admin/posts/'.$post->id.'/edit');

        $this->get('admin/posts/'.$post->id.'/edit')
            ->assertStatus(200)
            ->assertSeeText($data['title']);

    }

    public function test_if_user_can_delete_post(){

        $post = factory(Post::class)->create();

        $this->get('admin/posts/'.$post->id.'/delete')->assertRedirect('admin/posts');

        $this->get('admin/posts')->assertDontSeeText($post->title);

    }

}
