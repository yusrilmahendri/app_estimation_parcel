<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeFactoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:factory-auto {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new factory automatically';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Filesystem $filesystem)
    {
        $name = $this->argument('name');
        $path = base_path("database/factories/{$name}.php");

        // Check if the factory already exists
        if ($filesystem->exists($path)) {
            $this->error("Factory {$name} already exists!");
            return;
        }

        // Generate the factory file
        $filesystem->put($path, $this->generateFactoryStub($name));

        $this->info("Factory {$name} created successfully.");
    }

    /**
     * Generate the factory stub.
     *
     * @param  string  $name
     * @return string
     */
    protected function generateFactoryStub($name)
    {
        $stub = "<?php

/** @var \Illuminate\Database\Eloquent\Factory \$factory */

use App\Models\\{$name};
use Faker\Generator as Faker;

\$factory->define({$name}::class, function (Faker \$faker) {
    return [
        // Define your model's attributes here
    ];
});
";

        return $stub;
    }
}
