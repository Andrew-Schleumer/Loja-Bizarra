<?php

class Conexao
{
    private $dsn = 'sqlite:banco/bizarra.sqlite';
    protected $pdo;
    
    public function conectar()
    {
        $this->pdo = new PDO($this->dsn);
    }
}