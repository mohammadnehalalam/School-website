<?php
use App\Models\Whatwe;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatwesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatwes', function (Blueprint $table) {
            $table->id();
            $table->string('title1');
            $table->text('description1');
            $table->string('title2');
            $table->text('description2');
            $table->timestamps();
        });

        // Create a default one
        
        // $whatwe = new Whatwe();
        // $whatwe->title1 = 'Pellentesque ut risus a odio posuere aliquet Pellentesque sapien erat .'; 
        // $whatwe->description1 = 'test@gmail.com'; 
        // $whatwe->title2 = 'Pellentesque ut risus a odio posuere aliquet Pellentesque sapien erat .'; 
        // $whatwe->description2 = 'Default address'; 
        // $whatwe->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whatwes');
    }
}
