<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    DB::statement('CREATE EXTENSION IF NOT EXISTS "pgcrypto";');

    Schema::table('clients', function (Blueprint $table) {
      $table->uuid('new_id')->nullable();
    });

    DB::statement('UPDATE clients SET new_id = gen_random_uuid();');

    DB::statement('ALTER TABLE clients DROP CONSTRAINT IF EXISTS clients_pkey;');

    Schema::table('clients', function (Blueprint $table) {
      $table->dropColumn('id');
    });

    DB::statement('ALTER TABLE clients RENAME COLUMN new_id TO id;');
    DB::statement('ALTER TABLE clients ALTER COLUMN id SET NOT NULL;');

    DB::statement("ALTER TABLE clients ADD PRIMARY KEY (id);");
    DB::statement("ALTER TABLE clients ALTER COLUMN id SET DEFAULT gen_random_uuid();");
  }

  public function down(): void
  {
    throw new \RuntimeException('Down migration not supported.');
  }
};
