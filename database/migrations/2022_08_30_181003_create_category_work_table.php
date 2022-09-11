// <?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreateCategoryWorkTable extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up()
//     {
//         Schema::create('category_work', function (Blueprint $table) {
//             $table->integer('category_id')->unsigned();    //students,subjectsテーブルのidが
//             $table->integer('work_id')->unsigned();    //bigIncrementであった場合はbigIntegerにする
//             $table->primary(['category_id', 'work_id']);  
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('category_work');
//     }
// }
