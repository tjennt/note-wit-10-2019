<?php

Route::get('/', function () {
    return redirect('home/login');
});

Route::group(['prefix' => 'home'], function () {
    //Account
    Route::get('signup', 'user_controller@get_signup');
    Route::post('signup', 'user_controller@post_signup');
    Route::get('login', 'user_controller@get_login');
    Route::post('login', 'user_controller@post_login');
    Route::get('forgotinfo', 'user_controller@get_fotgotinfo');
    Route::post('forgotinfo', 'user_controller@post_fotgotinfo');
    Route::get('change-pass','user_controller@get_change');
    Route::post('change-pass', 'user_controller@post_change');

    //Info account
    Route::get('info/{username}', 'user_controller@info_user');
    Route::post('info/{username}', 'user_controller@follow');
    Route::get('info/{username}/fetch_data/', 'user_controller@fetch_data');

    //Log out account
    Route::get('logout', 'user_controller@logout');
    Route::get('edit-info', 'user_controller@info');
    Route::post('edit-info', 'user_controller@update_info');

    //Route 404
    //Route::get('404', 'note_controller@site404');

    //Route note
    Route::get('redirect-note' ,'note_controller@get_redirect_note');
    Route::get('note', 'note_controller@get_note');
    Route::get('note/fetch_data', 'note_controller@fetch_data');
    
    Route::get('note-bin', 'notebin_controller@get_notebin');
    Route::get('note-bin/fetch_data', 'notebin_controller@fetch_data');
    Route::get('detail/{id_note}','note_controller@get_detail');

    //Route create and edit note
    Route::get('create-note', 'note_controller@create_note');
    Route::post('create-note', 'note_controller@create_post_note');
    Route::get('edit-note/{id_note}', 'note_controller@edit_note');
    Route::post('edit-note/{id_note}', 'note_controller@edit_post_note');
    Route::get('delete-note/{id_note}', 'note_controller@delete_note');

    //Route NOTE BIN Restore note-bin in note
    Route::get('restore-note/{id_note}', 'notebin_controller@restore_note');
    Route::get('delete-note-bin/{id_note}', 'notebin_controller@delete_notebin');

    //Route chat-box
    Route::get('chat-box', 'chatbox_controller@get_chatbox');
    Route::get('get-chat-box', 'chatbox_controller@post_chatbox');
    Route::view('chat-content','chat-box.chat_content',
                ['data'=> App\chatbox::orderByDesc('id')->paginate(5)
    ]);
    Route::get('chat-content/fetch_data', 'chatbox_controller@fetch_data');
    Route::get('delete-chat-box/{$id_chat}', 'chatbox_controller@delete_chat');
    
    //Route Buy product and sell product
    Route::get('store', 'type_product_controller@get_store');
    Route::get('store/{url_name}', 'type_product_controller@get_detail');
    Route::get('store/fetch_data/{url_name}', 'type_product_controller@fetch_data');
    Route::post('store/buy-product', 'type_product_controller@buy_product');

    //Route Rank 
    Route::get('rank', 'rank_controller@get_rank');
    //Game
    Route::get('game', 'game_controller@get_redirect');
    Route::group(['prefix' => 'game'], function () {
        Route::get('doanso', 'game_controller@get_doanso');
        Route::post('doanso', 'game_controller@post_doanso');
        Route::get('doanso/history', 'game_controller@get_history');
        Route::get('doanso/fetch_data', 'game_controller@fetch_data');
    });

    // Route News Follow
    Route::get('news', function(){
        return view('news.home');
    });
    
});

//Route Admin managa website
Route::group(['prefix' => 'admin'], function () {
    Route::get('give-cash', 'admin_controller@get_cash');
    Route::post('give-cash', 'admin_controller@post_cash');
});


// Create database and insert some table
Route::group(['prefix' => 'insert'], function () {
    Route::get('data_user', function(){
        $faker = \Faker\Factory::create();
        for($i = 0 ; $i <500 ; $i++){
            $t = new App\User();
            $t->username = $faker->username;
            $t->password = bcrypt('Az1234');
            $t->email = $faker->email;
            $t->name = $faker->name;
            $t->cash = 1000;
            $t->phone = $faker->phoneNumber;
            $t->image = 'user.jpg';
            $t->level = '0';
            $t->save();
        }
    });
    // Route::get('data_follow', function(){
    //     for($i = 23694 ; $i <=70797 ; $i++){
    //         $t = new App\follow();
    //         $t->id_user = 2;
    //         $t->id_user_follow = $i;
    //         $t->save();
    //     }
        
    // });
});
// Route::group(['prefix' => 'data'], function () {
//     route::get('user', function(){
//         Schema::create('user', function($table){
//             $table->increments('id');
//             $table->string('username');
//             $table->string('password');
//             $table->string('email');
//             $table->string('phone')->nullable();
//             $table->string('image')->nullable();
//             $table->string('level');
//             $table->timestamps();
//         });
//     });
//     route::get('note', function(){
//         Schema::create('note', function($table){
//             $table->increments('id');
//             $table->string('title');
//             $table->string('content')->nullable();
//             $table->timestamp('time');
//             $table->integer('id_user')->unsigned();
//             $table->integer('like');
//             $table->timestamps();
//             $table->foreign('id_user')->references('id')->on('user')->onDelete('cascade');
//         });
//     });
//     route::get('notebin', function(){
//         Schema::create('note_bin', function($table){
//             $table->increments('id');
//             $table->string('title');
//             $table->string('content')->nullable();
//             $table->timestamp('time');
//             $table->integer('id_user_bin')->unsigned();
//             $table->timestamps();
//             $table->foreign('id_user_bin')->references('id')->on('user')->onDelete('cascade');
//         });
//     });
//     route::get('chatbox', function(){
//         Schema::create('chatbox', function($table){
//             $table->increments('id');
//             $table->string('content');
//             $table->integer('id_user_chat')->unsigned();
//             $table->timestamps();
//             $table->foreign('id_user_chat')->references('id')->on('user')->onDelete('cascade');
//         });
//     });
//     route::get('type_product', function(){
//         Schema::create('type_product', function($table){
//             $table->increments('id');
//             $table->string('name');
//             $table->string('url_name');
//             $table->timestamps();
//         });
//     });
//     route::get('product', function(){
//         Schema::create('product', function($table){
//             $table->increments('id');
//             $table->string('name');
//             $table->string('content');
//             $table->integer('price');
//             $table->integer('sale_price');
//             $table->integer('image');
//             $table->integer('views');
//             $table->integer('id_type')->unsigned();
//             $table->timestamps();
//             $table->foreign('id_type')->references('id')->on('type_product')->onDelete('cascade');
//         });
//     });
//     route::get('assets', function(){
//         Schema::create('assets', function($table){
//             $table->increments('id');
//             $table->integer('id_product')->unsigned();
//             $table->integer('id_user')->unsigned();
//             $table->timestamps();
//             $table->foreign('id_product')->references('id')->on('product')->onDelete('cascade');
//             $table->foreign('id_user')->references('id')->on('user')->onDelete('cascade');
//         });
//     });
//     route::get('log_game', function(){
//         Schema::create('log_game', function($table){
//             $table->increments('id');
//             $table->integer('name_game');
//             $table->integer('id_user')->unsigned();
//             $table->integer('status');
//             $table->integer('cash');
//             $table->timestamps();
//             $table->foreign('id_user')->references('id')->on('user')->onDelete('cascade');
//         });
//     });
//     route::get('follow', function(){
//         Schema::create('follow', function($table){
//             $table->increments('id');
//             $table->integer('id_user')->unsigned();
//             $table->integer('id_user_follow')->unsigned();
//             $table->timestamps();
//             $table->foreign('id_user')->references('id')->on('user')->onDelete('cascade');
//             $table->foreign('id_user_follow')->references('id')->on('user')->onDelete('cascade');
//         });
//     });
// });