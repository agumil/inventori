<?php
class Lib_env
{
    public function main()
    {
        $dotenv = Dotenv\Dotenv::createImmutable(FCPATH);
        $dotenv->load();
    }
}
