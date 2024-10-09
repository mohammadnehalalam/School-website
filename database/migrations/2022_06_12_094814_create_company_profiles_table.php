<?php
use App\Models\CompanyProfile;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('phone', 20);
            $table->string('email');
            $table->string('address');
            $table->text('about')->nullable();
            $table->text('s_description')->nullable();
            $table->string('facebook')->nullable();
            $table->text('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('logo')->nullable();
            $table->string('about_image')->nullable();
            $table->string('bg_image')->nullable();
            $table->timestamps();
        });
        // Create a default one

        // $company = new CompanyProfile();
        // $company->name = 'Default name';
        // $company->email = 'test@gmail.com';
        // $company->phone = '0170000000*';
        // $company->address = 'Default address';
        // $company->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_profiles');
    }
}
