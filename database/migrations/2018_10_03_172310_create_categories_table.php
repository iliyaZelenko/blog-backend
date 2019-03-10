<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('categories', function(Blueprint $table) {
            // These columns are needed for Baum's Nested Set implementation to work.
            // Column names may be changed, but they *must* all exist and be modified
            // in the model.
            // Take a look at the model scaffold comments for details.
            // We add indexes on parent_id, lft, rgt columns by default.
            $table->increments('id');
            $table->integer('parent_id')->nullable()->index();
            $table->integer('lft')->nullable()->index();
            $table->integer('rgt')->nullable()->index();
            $table->integer('depth')->nullable();

            // Add needed columns here (f.ex: name, slug, path, etc.)
            $table->text('name');
            $table->string('name_slug');
            $table->string('path');
//            $table->unsignedInteger('scope_id');
            $table->text('description')->nullable();
            $table->integer('posts_count')->default(0);
            $table->integer('all_posts_count')->default(0);
            $table->integer('children_count')->default(0);
            $table->integer('all_children_count')->default(0);
//            $table->string('img')->nullable();

//            $table->foreign('scope_id')
//                ->references('id')
//                ->on('scopes')
//                ->onDelete('cascade');


            $table->timestamps();
        });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
    public function down()
    {
        Schema::drop('categories');
    }

}
