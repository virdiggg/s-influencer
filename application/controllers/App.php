<?php defined('BASEPATH') or exit('No direct script access allowed');

use Virdiggg\SeederCi3\MY_AppController;
use Virdiggg\SeederCi3\Config\MigrationConfig;
use PhpOffice\PhpSpreadsheet\IOFactory;

class App extends MY_AppController
{
    /**
     * Hooks for migrate() function.
     * If you want to run a callback after migrating a table,
     * ex.: create a log file after migration or run grant privileges query for a role.
     * 
     * @return bool $this
     */
    private $migrateCalled = false;
    public function __construct()
    {
        /**
         * You can pass argument here
         * @param string $migrationType  Type of migration, sequential or timestamp. Default to 'sequential'.
         * @param array  $dateTime       List of additional table rows with datetime data type.
         *                               Default to "['created_at', 'updated_at', 'approved_at', 'deleted_at']".
         * @param string $dbConn         Name of database connection. Default to 'default'.
         * @param string $migrationPath  Path of migration file. Default to 'ROOT/application/migrations'.
         * @param array  $constructors   List of additional function to be called in constructor.
         * */
        $config = new MigrationConfig();
        $config->migrationType = 'timestamp';
        $config->constructors = [
            'controller' => [
                '$this->authenticated->checkAuth();',
            ],
        ];

        parent::__construct($config);
    }

    public function migrate()
    {
        parent::migrate();
        $this->migrateCalled = true;
    }

    // If you don't wish to have rollback function
    public function rollback() {
        return;
    }

    public function xlsx() {
        die;
        $data[] = [
            'id', 'no_doc', 'no_inv',
        ];
        $data[] = [
            '1', 'DOC/2024/02', 'INV/2024/02',
        ];
        $data[] = [
            '2', 'DOC/2024/02', 'INV/2024/02',
        ];
        $data[] = [
            'id', 'header_id', 'product_code', 'product_name',
        ];
        $data[] = [
            '1', '1', 'CODE1','PRODUCT 1',
        ];
        $data[] = [
            '2', '1', 'CODE2','PRODUCT 2',
        ];
        $data[] = [
            '3', '2', 'CODE1','PRODUCT 1',
        ];
        $data[] = [
            '4', '1', 'CODE3','PRODUCT 3',
        ];
        $this->load->library('PhpXlsxGenerator');
        $xlsx = $this->phpxlsxgenerator->fromArray($data);
        return $xlsx->downloadAs('output_name.xlsx');
    }

    public function __destruct()
    {
        if ($this->migrateCalled) {
            // $this->db->query("GRANT SELECT, INSERT, UPDATE, DELETE ON ALL TABLES IN SCHEMA public TO myrole");
            // $this->db->query("GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA public TO myrole");
            // $this->load->library('Logger');
            // $this->logger->setLogPath('queries');
            // $this->logger->write_log('error', 'User run migration.');
        }
    }
}