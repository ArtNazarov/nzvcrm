<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            
            $table->date('dplan'); // запланировано на дату
            $table->date('dstart'); // поставлено 
            $table->string('days'); // дней на исполнение
            $table->string('description'); // описание
            $table->text('report'); // отчет
            $table->string('manager_id'); // кто назначен
            $table->string('client_id'); // кто клиент
            $table->string('task_type'); // тип задачи
            $table->string('status'); // состояние задачи
            $table->integer('price'); // сумма

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
