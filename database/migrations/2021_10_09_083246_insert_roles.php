<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertRoles extends Migration
{
    private $data = [
        ['code' => 'manager', 'name' => 'Менеджер'],
        ['code' => 'client', 'name' => 'Клиент'],
        ['code' => 'admin', 'name' => 'Админ']
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('roles')->insert($this->data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('roles')->whereIn('code', array_column($this->data, 'code'))->delete();
    }
}
