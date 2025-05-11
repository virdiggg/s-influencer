<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Migration_Create_permission_to_roles_aKvN extends CI_Migration {
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
        $this->name = 'permission_to_roles';
        $this->primary = 'id';
        $this->fields = [
            $this->primary => [
                'type' => 'BIGINT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'role_id' => [
                'type' => 'BIGINT',
                'unsigned' => TRUE,
            ],
            'permission_id' => [
                'type' => 'BIGINT',
                'unsigned' => TRUE,
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
        ];
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
    }

    /**
     * Rollback migration.
     * 
     * @return void
     */
    public function down() {
        $this->dbforge->drop_table($this->name, TRUE);
    }
}
