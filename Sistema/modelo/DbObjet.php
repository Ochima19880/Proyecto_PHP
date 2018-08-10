<?php

interface DbObjet {
    public function GetAll();
    public function GetById($param);
    public function Insert($param);
    public function Update($id,$param);
    public function Delete($param);
}
