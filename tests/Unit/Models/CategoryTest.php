<?php

namespace App\Models;

use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function test_save_slug_automatically_created()
    {
        (new Category(['name' => 'New Category']))->save();

        $c = Category::where('slug', 'new-category')->get()->first();
        $this->assertEquals('New Category', $c->name);
    }

    public function test_save_child_category()
    {
        $parent = factory(Category::class)->create(['name' => 'parent cat']);
        $child = factory(Category::class)->create([
            'name' => 'child cat',
            'parent_id' => $parent->id,
        ]);

        $this->assertEquals('parent-cat/child-cat', $child->slug);
    }

    public function test_convertToSlug()
    {
        $string = ' S$ck--Ass  Man ';
        $expected = 'sck-ass-man';

        $this->assertEquals($expected, (new Category)->convertToSlug($string));
    }
}
