<?php

use App\File;
use App\FileType;
use Illuminate\Database\Seeder;

class FileTableSeeder extends Seeder
{

    protected $file;
    protected $file_type;

    public function __construct(File $file, FileType $file_type)
    {
        $this->file = $file;;
        $this->file_type = $file_type;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file->import();
        $this->file_type->import();
    }
}
