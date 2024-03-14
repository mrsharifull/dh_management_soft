<?php

namespace App\Http\Traits;

use Illuminate\Database\Schema\Blueprint;

trait AuditColumnsTrait{

    public function addAuditColumns(Blueprint $table): void
    {
        $table->unsignedBigInteger('created_by')->nullable();
        $table->unsignedBigInteger('updated_by')->nullable();
        $table->unsignedBigInteger('deleted_by')->nullable();

        $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
    }
    public function dropAuditColumns(Blueprint $table): void
    {

        $table->dropForeign('created_by');
        $table->dropForeign('updated_by');
        $table->dropForeign('deleted_by');
    }
}
