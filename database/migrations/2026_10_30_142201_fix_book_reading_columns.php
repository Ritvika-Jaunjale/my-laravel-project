
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            if (!Schema::hasColumn('books', 'is_bookmarked')) {
                $table->boolean('is_bookmarked')->default(false);
            }

            if (!Schema::hasColumn('books', 'status')) {
                $table->string('status')->default('to_read');
            }
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            if (Schema::hasColumn('books', 'is_bookmarked')) {
                $table->dropColumn('is_bookmarked');
            }

            if (Schema::hasColumn('books', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
