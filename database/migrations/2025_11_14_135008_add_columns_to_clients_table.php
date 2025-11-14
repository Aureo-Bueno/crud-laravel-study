<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::table('clients', function (Blueprint $table) {
      $table->renameColumn('nome', 'name');
      $table->renameColumn('endereco', 'address');
      $table->renameColumn('observacao', 'observation');

      $table->string('email')->unique()->nullable();
      $table->string('password')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('clients', function (Blueprint $table) {
      $table->renameColumn('name', 'nome');
      $table->renameColumn('address', 'endereco');
      $table->renameColumn('observation', 'observacao');

      $table->dropColumn(['email', 'password']);
    });
  }
};
