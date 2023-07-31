<?php

class VirtualhomeDownloadCode extends CmfiveMigration
{
    public function up()
    {
        // UP
        $column = parent::column();
        $column->setName('id')
               ->setType('biginteger')
               ->setIdentity(true);
              
        if (!$this->hasTable("virtualhome_download_code")) {
            $this->table("virtualhome_download_code", [
                "id" => false,
                "primary_key" => "id"
            ])->addColumn($column)
              ->addColumn('user_id', 'biginteger')
              ->addColumn('name', 'string')
              ->addColumn('client_name', 'string')
              ->addColumn('attachment_id', 'biginteger')
              ->addColumn('code', 'string')
              ->addColumn('dt_generated', 'datetime')
              ->addTimestamps()
              ->create();
        }
       // $this->hasTable("virtualhome_download_code") && !$this->table("virtualhome_download_code")->hasColumn("code");

        //if ($this->hasTable("virtualhome_download_code") && !$this->table("virtualhome_download_code")->hasColumn("code")) {
       //     $this->table("virtualhome_download_code")->addColumn("code", "string", ["limit" => 255, "null" => true])->save();
       // }

      
    }

    public function down()
    {
        // DOWN
        $this->hasTable('virtualhome_download_code') ? $this->dropTable('virtualhome_download_code') : null;
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
