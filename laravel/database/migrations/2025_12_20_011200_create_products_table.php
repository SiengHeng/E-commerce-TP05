

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create(table: 'products', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name');
            $table->bigInteger(column: 'category_id')->unsigned();
            $table->double(column: 'pricing');
            $table->text(column: 'description')->nullable();
            $table->jsonb(column: 'images')->nullable();
            $table->timestamps();

            $table->foreign(columns: 'category_id')
                  ->references(columns: 'id')
                  ->on(table: 'categories')
                  ->onDelete('cascade'); // optional but recommended
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
