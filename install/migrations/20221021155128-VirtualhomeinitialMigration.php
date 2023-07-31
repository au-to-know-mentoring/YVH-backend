<?php

class VirtualhomeinitialMigration extends CmfiveMigration
{
    
        public function up()
        {
            // UP
            $column = parent::column();
            $column->setName('id')
                   ->setType('biginteger')
                   ->setIdentity(true);
    
            if (!$this->hasTable("virtualhome_model")) {
                $this->table("virtualhome_model", [
                    "id" => false,
                    "primary_key" => "id"
                ])->addColumn($column)
                  ->addColumn('user_id', 'biginteger')
                  ->addColumn('name', 'string')
                  ->addColumn('client_name', 'string')
                  ->addColumn('attachment_id', 'biginteger')
                  ->addColumn('dt_created', 'biginteger')
                  ->addTimestamps()
                  ->create();
            }
            
        }

    
        public function down()
        {
            // DOWN
            $this->hasTable('virtualhome_model') ? $this->dropTable('virtualhome_model') : null;
        }

    public function preText()
    {
        return null;
    }

    public function postText()
    {
        return null;
    }

    public function description()
    {
        return null;
    }
}
