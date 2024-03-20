<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Traits\AuditColumnsTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

return new class extends Migration
{
    use AuditColumnsTrait, SoftDeletes;
    public function up(): void
    {
        Schema::create('hostings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('name');
            $table->string('admin_url');
            $table->string('username')->nullable();
            $table->string('email');
            $table->string('password');
            $table->date('purchase_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->date('renew_date')->nullable();
            $table->longText('note')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes(); 
            $this->addAuditColumns($table);

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('hostings');
    }
};
