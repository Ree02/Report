<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    // テーブルを生成する処理の記述
    public function up()
    {
        // reportsテーブルの生成
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('subject_id')->constrained('subjects');  // 外部キーを設定する
            $table->string('title', 20);
            $table->string('detail', 100)->nullable(); // NULLを許可
            $table->date('due_date');
            $table->integer('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    // テーブルを削除するときの処理を記述
    public function down()
    {
        // テーブルがあれば削除
        Schema::dropIfExists('reports');
    }
}
