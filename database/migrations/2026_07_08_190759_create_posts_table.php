<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *  id()crea una chiave primaria ad aumento automatico.
     *  string('title')memorizza il titolo del post come colonna VARCHAR.
     *  string('slug')->unique()memorizza una versione URL-friendly del titolo. Il unique()vincolo assicura che non due post condividano la stessa lumaca.
     *  text('content')memorizza il corpo post, che può essere più lungo di quanto un VARCHAR consente.
     *  enum('status', ['draft', 'publish'])->default('draft')limita lo stato a due possibili valori e predefinisce nuovi post a "bozza".
     *  timestamps()aggiunge created_ate updated_atcolonne che Laravel gestisce automaticamente.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->enum('status', ['draft', 'publish'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
