<?php

class VirtualhomeDownloadCode extends CmfiveMigration
{
    public function up()
    {
        // UP
        $column = parent::Column();
        $column->setName('id')
                ->setType('biginteger')
                ->setIdentity(true);
         if (!$this->hasTable("DownloadCode_model")) { //it can be helpful to check that the table name is not used
              $this->table("DownloadCode_model", [ // table names should be appended with 'ModuleName_'
                 "id" => false,
                "primary_key" => "id"
            ])->addColumn($column) // add the id column
             ->addIdColumn('user_id') // this is the architects user id
             ->addStringColumn('name')
             ->addStringColumn('client_name')
             ->addIdColumn('attachment_id')
             ->addCmfiveParameters() // this function adds some standard columns used in cmfive. dt_created, dt_modified, creator_id, modifier_id, and is_deleted.
             ->create();
              }

    }

    public function down()
    {
        $this->hasTable('DownloadCode_model') ? $this->dropTable('DownloadCode_model') : null;
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
