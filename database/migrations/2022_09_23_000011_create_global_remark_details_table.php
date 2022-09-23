<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @var string
     */
    private $table = 'global_remark_details';

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
                $table->unsignedBigInteger('global_remark_id')->nullable();
                $table->string('subject')->nullable();
                $table->text('content')->nullable();
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('global_remark_id')
                    ->references('id')
                    ->on('global_remarks')
                    ->onDelete('cascade');
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
