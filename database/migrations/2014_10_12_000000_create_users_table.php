<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone')->nullable()->unique()->comment('电话');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('');
            $table->string('weixin_openid')->unique()->nullable()->comment('微信openid');
            $table->string('weixin_unionid')->unique()->nullable()->comment('微信unionid');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('introduction')->nullable()->comment('个人简介');
            $table->integer('notification_count')->unsigned()->default(0)->comment('未读消息');
            $table->timestamp('last_actived_at')->nullable()->comment('最后登录时间');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
