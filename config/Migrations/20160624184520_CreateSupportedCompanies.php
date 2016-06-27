<?php
use Migrations\AbstractMigration;

class CreateSupportedCompanies extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('supported_companies');
        $table->addColumn('power_pole_id', 'integer', [
                'null' => false,
            ]);
        $table->addForeignKey('power_pole_id',
            'power_poles', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION']);

        $table->addColumn('company', 'string', [
            'null' => false,
        ]);
        $table->addColumn('support_type', 'string', [
            'null' => false,
        ]);
        $table->addColumn('amount', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
