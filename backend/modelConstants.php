<?php
enum account_type
{
	case Customer;
	case Realtor;
	case Admin;
}

//primarily for login responses
enum response_code: int
{
	case Failed = 0; //generally used for undefined errors as a default catchall
	case Success = 100;
	case UserNotFound = 400;
	case IncorrectPassword = 500;
}

const SQL_SERVERNAME = 'localhost:3306';
const SQL_USERNAME = 'root';
const SQL_PASSWORD = '';
const SQL_DATABASE = 'realestatesite';

const USERNAME_MIN = "3";
const USERNAME_MAX = "32";

const PASSWORD_MIN = "4";
const PASSWORD_MAX = "24";
