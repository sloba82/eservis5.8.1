<?php

namespace App\Repository;

interface CRUDInterface
{

    /**
     *  @param Array
     * save / create entety
     * nesded parameter to create entety
     *
     */
    public function save($params);

    /**
     * @return Array
     *  alle entety values form DB
     */
    public function getAll();

    /**
     * @param $id of requestet entety
     * @return reqested entety
     */
    public function getById($id);

    /**
     * @param $params Array needet to upadate
     * @param $id entety to update
     *
     */
    public function update($params, $id);

    /**
     * @param $id of entety to delete
     *
     */
    public function delete($id);
}

