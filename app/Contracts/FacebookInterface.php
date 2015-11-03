<?php

namespace App\Contracts;

interface FacebookInterface
{
	public function getLoginUrl();
	public function loginOrRegister();
}