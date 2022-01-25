<?php
namespace BlockSDK;

class ContractDB extends Base
{
    public function genDatabase($request)
    {
        return $this->request("POST", "/contractDB/generation",$request);
    }

    public function deleteDatabase($request)
    {
        return $this->request("POST", "/contractDB/{$request['databaseName']}/delete",$request);
    }

    public function statusDatabase($request)
    {
        return $this->request("GET", "/contractDB/{$request['databaseName']}/status",$request);
    }

    public function genTable($request)
    {
        return $this->request("POST", "/contractDB/tables/generation",$request);
    }

    public function deleteTable($request)
    {
        return $this->request("POST", "/contractDB/tables/{$request['table_id']}/delete",$request);
    }

    public function runTable($request)
    {
        return $this->request("POST", "/contractDB/tables/{$request['table_id']}/run");
    }

    public function stopTable($request)
    {
        return $this->request("POST", "/contractDB/tables/{$request['table_id']}/stop");
    }

    public function genIndex($request)
    {
        return $this->request("POST", "/contractDB/tables/{$request['table_id']}/index/generation",$request);
    }

    public function genTrigger($request)
    {
        return $this->request("POST", "/contractDB/tables/{$request['table_id']}/trigger/generation",$request);
    }

    public function deleteTrigger($request)
    {
        return $this->request("POST", "/contractDB/tables/{$request['table_id']}/trigger/delete",$request);
    }

    public function selected($request)
    {
        return $this->request("POST", "/contractDB/tables/{$request['table_id']}/select",$request);
    }
}