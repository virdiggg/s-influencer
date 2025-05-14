<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Migration_Create_ms_categories_lrhw extends CI_Migration {
    /**
     * Array table fields.
     * 
     * @param array $fields
     */
    private $fields;

    /**
     * Primary key.
     * 
     * @param array $primary
     */
    private $primary;

    /**
     * Table name.
     * 
     * @param string $name
     */
    private $name;

    public function __construct() {
        parent::__construct();
        $this->name = 'ms_categories';
        $this->primary = 'id';
        $this->fields = [
            $this->primary => [
                'type' => 'BIGINT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE,
            ],
            'created_by' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => TRUE,
            ],
            'updated_by' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => TRUE,
            ],
        ];

        // Handle keys of $this->fields.
        // Convert special characters to underscore.
        $this->handleFields();
    }

    /**
     * Migration.
     * 
     * @return void
     */
    public function up() {
        $this->dbforge->add_field($this->fields);
        $this->dbforge->add_key($this->primary, TRUE);
        $this->dbforge->create_table($this->name);
        // Uncomment if you want to create index for this table.
        // Recommended if this table doesn't have UPDATE and DELETE operations. PostgreSQL only.
        // $this->db->query('CREATE INDEX CONCURRENTLY ON "'.$this->name.'" ("id", "name")');
    }

    /**
     * Rollback migration.
     * 
     * @return void
     */
    public function down() {
        $this->dbforge->drop_table($this->name, TRUE);
    }

    /**
     * Preparing array keys.
     * 
     * @return array $this
     */
    public function handleFields() {
        $this->name = strip_tags(trim(preg_replace('/\xc2\xa0/', '', $this->name)));
        $this->primary = strip_tags(trim(preg_replace('/\xc2\xa0/', '', $this->primary)));
        $fields = $this->fields;
        $res = [];
        foreach ($fields as $key => $f) {
            $res[str_replace("'", "", preg_replace('/[^a-zA-Z0-9\']/', '_', trim($key)))] = $f;
        }
        $this->fields = $res;
    }

}
