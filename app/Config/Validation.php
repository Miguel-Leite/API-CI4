<?php

namespace Config;

use App\Models\Validator\Validator;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
		Validator::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $usersRules = [
		'name' => 'required|min_length[3]|max_length[75]',
        'lastName' => 'required|min_length[3]|max_length[75]',
        'bi' => 'required|is_bi_valid',
        'phone' => 'required|is_phone_valid',
        'email' => 'valid_email',
        'password' => 'required|min_length[6]|max_length[12]'
	];
}
