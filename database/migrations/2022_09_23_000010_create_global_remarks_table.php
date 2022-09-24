<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @var string
     */
    private $table = 'global_remarks';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            Schema::create($this->table, function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->string('key')->nullable();
                $table->string('subject')->nullable();
                $table->text('content')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        } catch (\Exception $e) {
            report($e);
            $this->down();
            dd($e->getMessage());
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
};
