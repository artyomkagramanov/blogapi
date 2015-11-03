<?php

namespace App\Contracts;

interface LinkedInInterface
{
	public function getLoginUrl();
	public function loginOrRegister();
}