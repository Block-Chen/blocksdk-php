<?php
namespace BlockSDK;

class ContractDB extends Base
{
    public function genTable($request)
    {
        return $this->request("POST", "/contractDB/tables/generation",$request);
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

    public function selected($request)
    {
        return $this->request("POST", "/contractDB/tables/{$request['table_id']}/select",$request);
    }
}