<?php
use JeroenZwart\CsvSeeder\CsvSeeder;

class DataTableSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeds/liste-one-key.csv';
        $this->mapping = ['one_key_id', 'region', 'city', 'specialty'];
        $this->tablename = 'one_key';
        $this->delimiter = ',';
        $this->timestamps = false;
        $this->encode = false;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recommended when importing larger CSVs
        DB::disableQueryLog();
        parent::run();
    }
}
